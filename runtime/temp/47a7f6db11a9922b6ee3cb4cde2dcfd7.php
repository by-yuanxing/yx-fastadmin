<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:74:"D:\phpstudy\WWW\test\public/../application/index\view\cms\archives\my.html";i:1592474735;s:63:"D:\phpstudy\WWW\test\application\index\view\layout\default.html";i:1591338017;s:60:"D:\phpstudy\WWW\test\application\index\view\common\meta.html";i:1583049507;s:63:"D:\phpstudy\WWW\test\application\index\view\common\sidenav.html";i:1588039741;s:62:"D:\phpstudy\WWW\test\application\index\view\common\script.html";i:1583049507;}*/ ?>
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
                        <?php $__ohPWpfzjIi__ = \addons\cms\model\Channel::getChannelList(["id"=>"nav","type"=>"top","condition"=>"1=isnav"]); if(is_array($__ohPWpfzjIi__) || $__ohPWpfzjIi__ instanceof \think\Collection || $__ohPWpfzjIi__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__ohPWpfzjIi__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
                        <!--判断是否有子级或高亮当前栏目-->
                        <li class="<?php if($nav['has_child']): ?>dropdown<?php endif; if($nav->is_active): ?> active<?php endif; ?>">
                            <a href="<?php echo $nav['url']; ?>" <?php if($nav['has_child']): ?> data-toggle="dropdown" <?php endif; ?>><?php echo $nav['name']; if($nav['has_child']): ?> <b class="caret"></b><?php endif; ?></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php $__VcCJTWqtIK__ = \addons\cms\model\Channel::getChannelList(["id"=>"sub","type"=>"son","typeid"=>$nav['id'],"condition"=>"1=isnav"]); if(is_array($__VcCJTWqtIK__) || $__VcCJTWqtIK__ instanceof \think\Collection || $__VcCJTWqtIK__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__VcCJTWqtIK__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                                <li><a href="<?php echo $sub['url']; ?>"><?php echo $sub['name']; ?></a></li>
                                <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__VcCJTWqtIK__; ?>
                            </ul>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__ohPWpfzjIi__; ?>
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
    }

    .btn-post {
        position: absolute;
        right: 0;
        bottom: 10px;
    }

    .img-border {
        border-radius: 3px;
        box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.05);
    }

    .embed-responsive img {
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .channel-list li a {
        color: #2c3e50;
    }

    .channel-list li.active a, .channel-list li a:hover {
        color: #3c8dbc;
    }

    .channel-list li.active a {
        font-weight: bold;
    }

    .channel-list li a span {
        color: #999;
    }

    .label-channel {
        background: #c1e6ff;
        color: #2d96de;
        font-weight: normal;
    }
</style>
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
                        <div class="page-header panel-post">
                            <h2><?php echo $title; ?></h2>
                            <a href="<?php echo url('index/cms.archives/post'); ?><?php echo $model?'?model_id='.$model['id']:''; ?>" class="btn btn-info btn-post"><i class="fa fa-edit"></i> 发布<?php echo $model?$model['name']:'文章'; ?></a>
                        </div>
                        <ul class="breadcrumb channel-list" style="line-height: 25px;">
                            <li class="<?php if(!\think\Request::instance()->get('channel_id')): ?>active<?php endif; ?>"><a href="?">全部</a></li>
                            <?php if(is_array($channelList) || $channelList instanceof \think\Collection || $channelList instanceof \think\Paginator): if( count($channelList)==0 ) : echo "" ;else: foreach($channelList as $key=>$item): ?>
                            <li class="<?php echo \think\Request::instance()->get('channel_id')==$item['id']?'active':''; ?>"><a href="?channel_id=<?php echo $item['id']; ?>"><?php echo $item['name']; if($item['items']>0): ?><span class="hidden">(<?php echo $item['items']; ?>)</span><?php endif; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>

                        <?php if(is_array($archivesList) || $archivesList instanceof \think\Collection || $archivesList instanceof \think\Paginator): $i = 0; $__LIST__ = $archivesList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <a href="<?php echo $item['url']; ?>" class="img-thumb">
                                    <div class="embed-responsive embed-responsive-4by3 img-zoom">
                                        <img src="<?php echo $item['image']; ?>" class="embed-responsive-item" onerror="this.src='/assets/addons/cms/img/noimage.jpg';this.onerror=null;">
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-9">
                                <h4>
                                    <a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a>
                                </h4>
                                <p><a href="?channel_id=<?php echo $item['channel']['id']; ?>"><span class="label label-channel"><?php echo $item['channel']['name']; ?></span></a></p>
                                <p class="text-muted">发布时间：<?php echo datetime($item['createtime']); ?></p>
                                <div>
                                    <?php if($item['status'] == 'normal'): ?>
                                    <a class="btn btn-success" href="<?php echo $item['url']; ?>"><i class="fa fa-link"></i> 立即查看</a>
                                    <a class="btn btn-info" href="<?php echo url('index/cms.archives/post'); ?>?id=<?php echo $item['id']; ?>" data-toggle="tooltip" title="当前已经发布,如果修改将重新进入审核"><i class="fa fa-pencil"></i> 修改</a>
                                    <?php elseif($item['status'] == 'rejected'): ?>
                                    <a class="btn btn-danger" href="<?php echo url('index/cms.archives/post'); ?>?id=<?php echo $item['id']; ?>" data-toggle="tooltip" title="<?php echo $item['memo']; ?>"><i class="fa fa-pencil"></i> 被拒绝</a>
                                    <?php elseif($item['status'] == 'pulloff'): ?>
                                    <a class="btn btn-default" href="javascript:;" data-toggle="tooltip" title="<?php echo $item['memo']; ?>"><i class="fa fa-pencil"></i> 已下架</a>
                                    <?php elseif($item['status'] == 'hidden'): ?>
                                    <a class="btn btn-info" href="<?php echo url('index/cms.archives/post'); ?>?id=<?php echo $item['id']; ?>" data-toggle="tooltip" title="请耐心等待后台审核,审核前你可以继续修改"><i class="fa fa-pencil"></i> 正在审核</a>
                                    <?php endif; ?>
                                    <!--<a class="btn btn-danger btn-delete" href="javascript:" data-url="<?php echo url('index/cms.archives/delete'); ?>?id=<?php echo $item['id']; ?>"><i class="fa fa-times"></i> 删除</a>-->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php endforeach; endif; else: echo "" ;endif; if($archivesList->total()==0): ?>
                        未找到任何记录!
                        <?php endif; ?>
                        <div class="pager"><?php echo $archivesList->render(); ?></div>
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