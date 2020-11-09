<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
	
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <script src="https://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <script src="https://js.ifdo.cool/info.js"></script>
    <script src="<?php $this->options->themeUrl('style.js'); ?>"></script>
    <!-- 使用url函数转换相关路径 -->
    <!-- <link rel="stylesheet" href="<?php $this->options->themeUrl('normalize.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">-->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>"> 

   

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->

    <?php $this->header(); ?>
</head>
<body>
<header class="top">
	<div class="topimg">
		<a id="logo" href="<?php $this->options->siteUrl(); ?>">
            <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
        </a>
	</div><!-- 头图 -->
	<!-- <span class="search"></span> -->
	<form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
		<table class="search">
			<tr>
				<td><input type="text" id="s" name="s"  placeholder="请输入..."></td>
				<td><button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="35" y1="35" x2="16.65" y2="16.65"></line></svg></button></td>
			</tr>
		</table>
	</form>
	<div class="login">
		<table>
			<tr>
				<?php if($this->user->hasLogin()): ?>
					<td><a href="<?php $this->options->adminUrl(); ?>"><?php _e('后台'); ?> (<?php $this->user->screenName(); ?>)</a></td>
					<!-- <td>|</td>
					<td><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></td> -->
				<?php else: ?>
					<td><button><a href="<?php $this->options->adminUrl('login.php'); ?>" target="_blank">登陆</a></button></td>
					<td>|</td>
					<td><button><a href="<?php $this->options->adminUrl('register.php'); ?>" target="_blank">注册</a></button></td>
				<?php endif; ?>
			</tr>
		</table>
	</div>
</header>
<div class="crumbs_patch">
	<a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo;</li>
	<?php if ($this->is('index')): ?><!-- 页面为首页时 -->
	<?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
		<?php $this->category(); ?> &raquo; <?php $this->title() ?>
	<?php else: ?><!-- 页面为其他页时 -->
		<?php $this->archiveTitle(' &raquo; ','',''); ?>
	<?php endif; ?>
</div>
<div class="leftbar">
	<div id="topline"></div>
	<div class="lefthead">
		<img class="headimg" style="border-radius: 100px;" src="<?php $this->headimg();?>">
		<span><p style="font-size: 80%;"><?php $this->options->title() ?></p></span>
	</div>
	<article>
		<span class="siteinfo">
			<?php $this->options->description() ?>
		</span>
		<div class="info">
			<!-- 友链 -->
			<div><a href="<?php $this->options->siteUrl(); ?>"><button><p>主页</p></button></a></div>
			<div><a href="<?php $this->options->index('/friendlink.html'); ?>"><button><p>友链</p></button></a></div>
			<div><a href=""><button><p>日记</p></button></a></div>
			<div><a href=""><button><p>新闻</p></button></a></div>
			<div><a href="<?php $this->options->feedUrl(); ?>"><button><p><?php _e('文章 RSS'); ?></p></button></a></div>
			<div><a href="<?php $this->options->commentsFeedUrl(); ?>"><button><p><?php _e('评论 RSS'); ?></p></button></a></div>
		</div>
	</article>
	<div class="social">
		<span class="bubble" id="bubble"></span>
		<?php $this->social(); ?>
		<a href=""><img src="https://weibo.com/favicon.ico" onmouseover="weibo(weibo)" onmouseout="mOut(bubble)"></a>
		<a href=""><img src="https://github.com/favicon.ico" onmouseover="github(github)" onmouseout="mOut(bubble)"></a>
		<a href=""><img src="https://im.qq.com/favicon.ico" onmouseover="qq(qq)" onmouseout="mOut(bubble)"></a>
	</div>
</div>