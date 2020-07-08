<?php

namespace addons\third\library;

use fast\Http;
use think\Config;
use think\Session;

/**
 * QQ Date:2020.7.8
 */
class Qq
{
	//在访问PHP类中的成员变量或方法时，如果被引用的变量或者方法被声明成const（定义常量）或者static（声明静态）,那么就必须使用操作符::,反之如果被引用的变量或者方法没有被声明成const或者static,那么就必须使用操作符->。
	//另外，如果从类的内部访问const或者static变量或者方法,那么就必须使用自引用的self，反之如果从类的内部访问不为const或者static变量或者方法,那么就必须使用自引用的$this。
    const GET_AUTH_CODE_URL = "https://graph.qq.com/oauth2.0/authorize";
    const GET_ACCESS_TOKEN_URL = "https://graph.qq.com/oauth2.0/token";
    const GET_USERINFO_URL = "https://graph.qq.com/user/get_user_info";
    const GET_OPENID_URL = "https://graph.qq.com/oauth2.0/me";

    /**
     * 配置信息
     * @var array
     */
    private $config = [];

    public function __construct($options = [])
    {
        if ($config = Config::get('third.qq')) {
            $this->config = array_merge($this->config, $config);
        }
        $this->config = array_merge($this->config, is_array($options) ? $options : []);
    }

    /**
     * 登陆
     */
    public function login()
    {
        header("Location:" . $this->getAuthorizeUrl());
    }

    /**
     * 获取authorize_url
     */
    public function getAuthorizeUrl()
    {
        $state = md5(uniqid(rand(), true));
        Session::set('state', $state);
        $queryarr = array(
            "response_type" => "code",
            "client_id"     => $this->config['app_id'],
            "redirect_uri"  => $this->config['callback'],
            "scope"         => $this->config['scope'],
            "state"         => $state,
        );
        request()->isMobile() && $queryarr['display'] = 'mobile';
        $url = self::GET_AUTH_CODE_URL . '?' . http_build_query($queryarr);
        return $url;
    }

    /**
     * 获取用户信息
     * @param array $params
     * @return array
     */
    public function getUserInfo($params = [])
    {
        $params = $params ? $params : $_GET;
        if (isset($params['access_token']) || (isset($params['state']) && $params['state'] == Session::get('state') && isset($params['code']))) {
            //获取access_token
            $data = isset($params['code']) ? $this->getAccessToken($params['code']) : $params;
            $access_token = isset($data['access_token']) ? $data['access_token'] : '';
            $refresh_token = isset($data['refresh_token']) ? $data['refresh_token'] : '';
            $expires_in = isset($data['expires_in']) ? $data['expires_in'] : 0;
            if ($access_token) {
                $openid = $this->getOpenId($access_token);
                //获取用户信息
                $queryarr = [
                    "access_token"       => $access_token,
                    "oauth_consumer_key" => $this->config['app_id'],
                    "openid"             => $openid,
                ];
                $ret = Http::get(self::GET_USERINFO_URL, $queryarr);
                $userinfo = (array)json_decode($ret, true);
                if (!$userinfo || !isset($userinfo['ret']) || $userinfo['ret'] !== 0) {
                    return [];
                }
                $userinfo = $userinfo ? $userinfo : [];
                $userinfo['avatar'] = isset($userinfo['figureurl_qq_2']) ? $userinfo['figureurl_qq_2'] : '';
                $data = [
                    'access_token'  => $access_token,
                    'refresh_token' => $refresh_token,
                    'expires_in'    => $expires_in,
                    'openid'        => $openid,
                    'userinfo'      => $userinfo
                ];
                return $data;
            }
        }
        return [];
    }

    /**
     * 获取access_token
     * @param string $code
     * @return array
     */
    public function getAccessToken($code = '')
    {
        if (!$code) {
            return [];
        }
        $queryarr = array(
            "grant_type"    => "authorization_code",
            "client_id"     => $this->config['app_id'],
            "client_secret" => $this->config['app_secret'],
            "redirect_uri"  => $this->config['callback'],
            "code"          => $code,
        );
        $ret = Http::get(self::GET_ACCESS_TOKEN_URL, $queryarr);
        $params = [];
        parse_str($ret, $params);
        return $params ? $params : [];
    }

    /**
     * 获取open_id
     * @param string $access_token
     * @return string
     */
    private function getOpenId($access_token = '')
    {
        $response = Http::get(self::GET_OPENID_URL, ['access_token' => $access_token]);
        if (strpos($response, "callback") !== false) {
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response = substr($response, $lpos + 1, $rpos - $lpos - 1);
        }
        $user = (array)json_decode($response, true);
        return isset($user['openid']) ? $user['openid'] : '';
    }
}
