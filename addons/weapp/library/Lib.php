<?php
/**
 * User: YY
 * Date: 2019/3/16 0016 Time: 下午 19:51
 */

namespace addons\weapp\library;

use ZipArchive;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Exception;
use app\common\library\Email;

class Lib
{

    static public function _zip($name = "weapp")
    {

        $file = RUNTIME_PATH . "temp" . DS . $name . '_miniapps' . '.zip';  //保存路径
        $dir = ADDON_PATH . $name . DS . "wechatapp";
        if (class_exists('ZipArchive')) {
            $zip = new ZipArchive;
            $zip->open($file, ZipArchive::CREATE);
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
            );
            foreach ($files as $fileinfo) {
                $filePath = $fileinfo->getPathName();
                if (pathinfo($filePath, PATHINFO_EXTENSION) != "tpl") {
                    $localName = str_replace($dir, '', $filePath);
                    if ($fileinfo->isFile()) {
                        $zip->addFile($filePath, $localName);
                    } elseif ($fileinfo->isDir()) {
                        $zip->addEmptyDir($localName);
                    }
                }
            }
            $zip->close();
            return file_exists($file) ? $file : false;
        }
        throw new Exception("不支持ZipArchive");
    }

    static public function down($file)
    {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header('Content-disposition: attachment; filename=' . basename($file));
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        header('Content-Length: ' . filesize($file));
        @readfile($file);
    }

    static protected function getHost()
    {
        $url = preg_replace("/\/(\w+)\.php$/i", '', request()->root());
        $http_type = $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
        return $http_type . $_SERVER['HTTP_HOST'] . $url;
    }


    /**
     * 修改程序相关参数
     * @return bool
     */
    static public function setConf()
    {
        try {
            $conf = get_addon_config("weapp");
            $file_path = ROOT_PATH . "addons/weapp/wechatapp";
            $file = file_get_contents($file_path . "/project.config.tpl");
            $json = json_decode($file, true);
            $json['appid'] = $conf['appid'];
            file_put_contents($file_path . "/project.config.json", json_encode($json, JSON_UNESCAPED_UNICODE));  //重新写入
            $api_url = $conf['api_url'];
            $request = file_get_contents($file_path . "/utils/request.tpl");
            if (strstr($request, '__API_URL__') && isset($api_url)) {
                $str = str_replace("__API_URL__", $conf['api_url'], $request);
                file_put_contents($file_path . "/utils/request.js", $str);  //重新写入
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static public function install_init()
    {
        try {
            $config = get_addon_config("weapp");
            if ($config) {
                set_addon_config("weapp", ['api_url' => self::getHost() . "/addons/weapp/api."], true);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * 通知管理员
     */
    static public function email($name, $phone, $text)
    {
        $info = get_addon_config("weapp");
        try {
            if (isset($info['email']) && !empty($info['email'])) {
                $email = new Email;
                $result = $email
                    ->to($info['email'])
                    ->subject("小程序用户：{$name}提交的信息")
                    ->message('<div style="min-height:350px; padding: 50px;"><p><h3>' . $name . '</h3></p><p>手机号：<a href="tel:' . $phone . '">' . $phone . '</a></p> <p>咨询内容：' . $text . '</p></div>')
                    ->send();
                if ($result) {
                    return true;
                } else {
                    throw new Exception($email->getError());
                }
            }
        } catch (Exception $e) {
            return false;
        }
        return false;
    }

}