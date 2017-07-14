<?php
// *-------------------------------------*
// | Author: Harris <mmnnbn@126.com>     |
// | Blog:   http://www.carrycode.cn     |
// *-------------------------------------*

namespace plugins\adminbg;
use cmf\lib\Plugin;

class AdminbgPlugin extends Plugin
{
    public $info = [
        'name'        => 'Adminbg',
        'title'       => '后台登录背景自定义',
        'description' => '安装前请到public/themes/admin_simpleboot3/admin/login.html添加写入权限',
        'status'      => 1,
        'author'      => 'carrycode.cn',
        'version'     => '1.0',
    ];

    public $hasAdmin = 0;//插件是否有后台管理界面
    private $login_path=ROOT_PATH ."public/themes/admin_simpleboot3/admin/login.html";
    // 插件安装
    public function install()
    {
        $str=file_get_contents($this->login_path);
        str_replace('<hook name="footer_start">','',$str);
        $str.='<hook name="footer_start">';
		if(@file_put_contents($this->login_path,$str)){
			return true;
		}else{
			$st="请到 ".ROOT_PATH ."public/themes/admin_simpleboot3/admin/login.html 添加写入权限";
			return false;
		}
    }

    // 插件卸载
    public function uninstall()
    {
        $str=file_get_contents($this->login_path);
        str_replace('<hook name="footer_start">','',$str);
        @file_put_contents($this->login_path,$str);
        return true;//卸载成功返回true，失败false
    }

    //实现的footer_start钩子方法
    public function footerStart($param)
    {
        $config = $this->getConfig();
        $this->assign($config);
        echo $this->fetch('login');
    }

}