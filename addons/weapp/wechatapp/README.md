## **企业官网小程序**

## 使用方法

配置成功后

复制小程序安装包到微信开发工具或者直接在开发工具导入小程序项目地址

小程序项目地址在 项目根目录/addons/weapp/wechatapp

注意系统会自动配置小程序的参数

如系统不支持文件读写可能导致自动写入失败  请手动配置


配置一

**修改appid**
appid  参数在  项目根目录/addons/weapp/wechatapp/project.config.tpl 下的JSON数组的
替换 "APPID" 为你的小程序的appid 

替换成功后重新复制project.config.tpl文件  命名为 project.config.json  放在当前目录

配置二

**修改接口地址**

api  接口地址在 项目根目录/addons/weapp/wechatapp/utils/request.tpl 下的js 文件

替换 "__API_URL__" 为你的小程序的接口地址 ex: https://www.ex.com/addons/weapp/api. （注意小程序发布版必须是HTTPS可以访问的接口地址）

替换成功后重新复制request.tpl文件  命名为 request.js   放在当前目录

## **问题反馈**

请不要随意修改 .tpl  模板文件 防止自动写入失败。

意见或者建议请邮箱到 731633799@qq.com

## **版权信息**

DOUBLE Y 版权所有
