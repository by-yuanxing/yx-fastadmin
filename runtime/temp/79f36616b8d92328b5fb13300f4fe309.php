<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:76:"D:\phpstudy\WWW\test\public/../application/index\view\cms\archives\post.html";i:1592474735;s:63:"D:\phpstudy\WWW\test\application\index\view\layout\default.html";i:1591338017;s:60:"D:\phpstudy\WWW\test\application\index\view\common\meta.html";i:1583049507;s:63:"D:\phpstudy\WWW\test\application\index\view\common\sidenav.html";i:1588039741;s:62:"D:\phpstudy\WWW\test\application\index\view\common\script.html";i:1583049507;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?> – <?php echo $site['name']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<?php if(isset($keywords)): ?>
<meta name="keywords" content="<?php echo $keywords; ?>">
<?php endif; if(isset($description)): ?>
<meta name="description" content="<?php echo $description; ?>">
<?php endif; ?>

<link rel="shortcut icon" href="/assets/img/favicon.ico" />

<link href="/assets/css/frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config: <?php echo json_encode($config); ?>
    };
</script>
        <link href="/assets/css/user.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo url('/'); ?>"><?php echo $site['name']; ?></a>
                </div>
                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="nav navbar-nav" data-current="<?php echo (isset($__CHANNEL__['id']) && ($__CHANNEL__['id'] !== '')?$__CHANNEL__['id']:0); ?>">
                        <!--如果你需要自定义NAV,可使用channellist标签来完成,这里只设置了2级,如果显示无限级,请使用cms:nav标签-->
                        <?php $__9Wxf1y5KEU__ = \addons\cms\model\Channel::getChannelList(["id"=>"nav","type"=>"top","condition"=>"1=isnav"]); if(is_array($__9Wxf1y5KEU__) || $__9Wxf1y5KEU__ instanceof \think\Collection || $__9Wxf1y5KEU__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__9Wxf1y5KEU__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
                        <!--判断是否有子级或高亮当前栏目-->
                        <li class="<?php if($nav['has_child']): ?>dropdown<?php endif; if($nav->is_active): ?> active<?php endif; ?>">
                            <a href="<?php echo $nav['url']; ?>" <?php if($nav['has_child']): ?> data-toggle="dropdown" <?php endif; ?>><?php echo $nav['name']; if($nav['has_child']): ?> <b class="caret"></b><?php endif; ?></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php $__ybRpWD5d9Q__ = \addons\cms\model\Channel::getChannelList(["id"=>"sub","type"=>"son","typeid"=>$nav['id'],"condition"=>"1=isnav"]); if(is_array($__ybRpWD5d9Q__) || $__ybRpWD5d9Q__ instanceof \think\Collection || $__ybRpWD5d9Q__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__ybRpWD5d9Q__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                                <li><a href="<?php echo $sub['url']; ?>"><?php echo $sub['name']; ?></a></li>
                                <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__ybRpWD5d9Q__; ?>
                            </ul>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__9Wxf1y5KEU__; ?>
                        <!--如果需要无限级请使用cms:nav标签-->
                        
                    </ul>
                    <ul class="nav navbar-right hidden">
                        <ul class="nav navbar-nav">
                            <li><a href="javascript:;" class="addbookbark"><i class="fa fa-star"></i> 加入收藏</a></li>
                            <li><a href="javascript:;" class=""><i class="fa fa-phone"></i> 联系我们</a></li>
                        </ul>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <form class="form-inline navbar-form" action="<?php echo addon_url('cms/search/index'); ?>" method="post">
                                <?php echo token('__searchtoken__'); ?>
                                <div class="form-search hidden-sm hidden-md">
                                    <input class="form-control" name="q" data-suggestion-url="<?php echo addon_url('cms/search/suggestion'); ?>" type="text" id="searchinput" value="<?php echo htmlentities((\think\Request::instance()->request('q') ?: '')); ?>" placeholder="搜索">
                                </div>
                            </form>
                        </li>
                        <li class="dropdown">
                            <?php if($user): ?>
                            <a href="<?php echo url('index/user/index', '', false, \think\Config::get('url_domain_deploy')?'www':''); ?>" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 10px;height: 50px;">
                                <span class="avatar-img"><img src="<?php echo cdnurl($user['avatar']); ?>" style="width:30px;height:30px;border-radius:50%;" alt=""></span>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo url('index/user/index', '', false, \think\Config::get('url_domain_deploy')?'www':''); ?>" class="dropdown-toggle" data-toggle="dropdown">会员<span class="hidden-sm">中心</span> <b class="caret"></b></a>
                            <?php endif; ?>
                            <ul class="dropdown-menu">
                                <?php if($user): ?>
                                <li><a href="<?php echo url('index/user/index', '', false, \think\Config::get('url_domain_deploy')?'www':''); ?>"><i class="fa fa-user fa-fw"></i>会员中心</a></li>
                                <li><a href="<?php echo url('index/cms.archives/post', '', false, \think\Config::get('url_domain_deploy')?'www':''); ?>"><i class="fa fa-pencil fa-fw"></i>发布文章</a></li>
                                <li><a href="<?php echo addon_url('cms/user/index', [':id'=>$user['id']]); ?>"><i class="fa fa-user fa-fw"></i>我的个人主页</a></li>
                                <li><a href="<?php echo url('index/cms.archives/my', '', false, \think\Config::get('url_domain_deploy')?'www':''); ?>"><i class="fa fa-list fa-fw"></i>我发布的文章</a></li>
                                <li><a href="<?php echo url('index/cms.order/index', '', false, \think\Config::get('url_domain_deploy')?'www':''); ?>"><i class="fa fa-shopping-bag fa-fw"></i>我的消费订单</a></li>
                                <li><a href="<?php echo url('index/cms.comment/index', '', false, \think\Config::get('url_domain_deploy')?'www':''); ?>"><i class="fa fa-comments fa-fw"></i>我发表的评论</a></li>
                                <li><a href="<?php echo url('index/user/logout', '', false, \think\Config::get('url_domain_deploy')?'www':''); ?>"><i class="fa fa-sign-out fa-fw"></i>注销</a></li>
                                <?php else: ?>
                                <li><a href="<?php echo url('index/user/login', '', false, \think\Config::get('url_domain_deploy')?'www':''); ?>"><i class="fa fa-sign-in fa-fw"></i>登录</a></li>
                                <li><a href="<?php echo url('index/user/register', '', false, \think\Config::get('url_domain_deploy')?'www':''); ?>"><i class="fa fa-user-o fa-fw"></i>注册</a></li>
                                <?php endif; ?>
                    
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="content">
            <style>
    .panel-post {
        position: relative;
		color: #0000FF;
    }

    .btn-post {
        position: absolute;
        right: 0;
        bottom: 10px;
    }
    #post-form .panel-default {
        padding:0;
    }
</style>

<link rel="stylesheet" href="/assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css">
<div class="container mt-20">
    <div id="content-container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidenav">
    <?php echo hook('user_sidenav_before'); ?>
    <ul class="list-group">
        <li class="list-group-heading"><?php echo __('User center'); ?></li>
        <li class="list-group-item <?php echo $config['actionname']=='index'?'active':''; ?>"> <a href="<?php echo url('user/index'); ?>"><i class="fa fa-user-circle fa-fw"></i> <?php echo __('User center'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='profile'?'active':''; ?>"> <a href="<?php echo url('user/profile'); ?>"><i class="fa fa-user-o fa-fw"></i> <?php echo __('Profile'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='changepwd'?'active':''; ?>"> <a href="<?php echo url('user/changepwd'); ?>"><i class="fa fa-key fa-fw"></i> <?php echo __('Change password'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='logout'?'active':''; ?>"> <a href="<?php echo url('user/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> <?php echo __('Sign out'); ?></a> </li>
    </ul>
    <?php echo hook('user_sidenav_after'); ?>
</div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default panel-user">
                    <div class="panel-body">
                        <?php if($archives && $archives['status']=='normal'): ?>
                        <div class="alert alert-danger">
                            <b>温馨提示：</b>当前<?php echo $model?$model['name']:'文章'; ?>已经发布,如果修改将重新进入审核
                        </div>
                        <?php endif; ?>
                        <div class="page-header panel-post">
                            <h2><?php echo $archives?'修改':'发布'; ?><?php echo $model?$model['name']:'文章'; ?></h2>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <form id="post-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">
                                    <?php echo token(); ?>
                                    <div class="form-group">
                                        <label for="c-channel_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Channel_id'); ?>:</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <select id="c-channel_id" data-rule="required" class="form-control" data-live-search="true" name="row[channel_id]">
                                                <?php echo $channelOptions; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="c-title" class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <input id="c-title" data-rule="required" class="form-control" name="row[title]" type="text" value="<?php echo htmlentities((isset($archives['title']) && ($archives['title'] !== '')?$archives['title']:'')); ?>">
                                        </div>
                                    </div>
                                    <?php if(!$model || $model->iscontribute('image')): ?>
                                    <div class="form-group">
                                        <label for="c-image" class="control-label col-xs-12 col-sm-2"><?php echo __('Image'); ?>:</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <div class="input-group">
                                                <input id="c-image" class="form-control" size="50" name="row[image]" type="text" value="<?php echo htmlentities((isset($archives['image']) && ($archives['image'] !== '')?$archives['image']:'')); ?>">
                                                <div class="input-group-addon no-border no-padding">
                                                    <span><button type="button" id="plupload-image" class="btn btn-danger plupload" data-input-id="c-image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                                                    <span class="msg-box n-right" for="c-image"></span>
                                                </div>
                                            </div>
                                            <ul class="row list-inline plupload-preview" id="p-image"></ul>
                                        </div>
                                    </div>
                                    <?php endif; if(!$model || $model->iscontribute('images')): ?>
                                    <div class="form-group">
                                        <label for="c-images" class="control-label col-xs-12 col-sm-2"><?php echo __('Images'); ?>:</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <div class="input-group">
                                                <input id="c-images" class="form-control" size="50" name="row[images]" type="text" value="<?php echo htmlentities((isset($archives['images']) && ($archives['images'] !== '')?$archives['images']:'')); ?>">
                                                <div class="input-group-addon no-border no-padding">
                                                    <span><button type="button" id="plupload-images" class="btn btn-danger plupload" data-input-id="c-images" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="true" data-preview-id="p-images"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                                                    <span class="msg-box n-right" for="c-images"></span>
                                                </div>
                                            </div>
                                            <ul class="row list-inline plupload-preview" id="p-images"></ul>
                                        </div>
                                    </div>
                                    <?php endif; if(!$model || $model->iscontribute('tags')): ?>
                                    <div class="form-group">
                                        <label for="c-tags" class="control-label col-xs-12 col-sm-2"><?php echo __('Tags'); ?>:</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <input id="c-tags" data-rule="" class="form-control" placeholder="多个标签请使用半角逗号分隔" data-primary-key="name" data-multiple="true" name="row[tags]" type="text" value="<?php echo htmlentities((isset($archives['tags']) && ($archives['tags'] !== '')?$archives['tags']:'')); ?>">
                                        </div>
                                    </div>
                                    <?php endif; if(!$model || $model->iscontribute('content')): ?>
                                    <div class="form-group">
                                        <label for="c-content" class="control-label col-xs-12 col-sm-2"><?php echo __('Content'); ?>:</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <textarea id="c-content" data-rule="required" class="form-control editor" name="row[content]" rows="15"><?php echo htmlentities((isset($archives['content']) && ($archives['content'] !== '')?$archives['content']:'')); ?></textarea>
                                        </div>
                                    </div>
                                    <?php endif; if(!$model || $model->iscontribute('keywords')): ?>
                                    <div class="form-group">
                                        <label for="c-keywords" class="control-label col-xs-12 col-sm-2"><?php echo __('Keywords'); ?>:</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <input id="c-keywords" data-rule="" class="form-control" name="row[keywords]" type="text" value="<?php echo htmlentities((isset($archives['keywords']) && ($archives['keywords'] !== '')?$archives['keywords']:'')); ?>">
                                        </div>
                                    </div>
                                    <?php endif; if(!$model || $model->iscontribute('description')): ?>
                                    <div class="form-group">
                                        <label for="c-description" class="control-label col-xs-12 col-sm-2"><?php echo __('Description'); ?>:</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <textarea id="c-description" cols="60" rows="5" data-rule="" class="form-control" name="row[description]"><?php echo htmlentities((isset($archives['description']) && ($archives['description'] !== '')?$archives['description']:'')); ?></textarea>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div id="extend"></div>

                                    <div class="form-group normal-footer">
                                        <label class="control-label col-xs-12 col-sm-2"></label>
                                        <div class="col-xs-12 col-sm-8">
                                            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
                                            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </main>

        <footer class="footer" style="clear:both">
            <p class="copyright">Copyright&nbsp;©&nbsp;2017-2020 <?php echo $site['name']; ?> All Rights Reserved <a href="http://www.beian.miit.gov.cn" target="_blank"><?php echo htmlentities($site['beian']); ?></a></p>
        </footer>

        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>

    </body>

</html>