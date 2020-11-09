<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<script type="text/javascript">
		//主页图片显示
		$(document).ready(function(){
			var preImg = $(".post-content img")[0].src;
			var headimg = $(".post-align img")[0].src;
			if (preImg==1) {
				preImg=$("img")[0].src;
			}
			$(".post-align img").attr('src',preImg);
			//console.log(preImg);
			//console.log(headimg);
		})
</script>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no"> -->
<div class="body">
	<div class="post">
		<div class="thembimg post-align headerimg">
			<img class="img" src="" alt="" title="首图图大小：宽680px  高230px" />
		</div>
		<article>
			<h1 class="post-title post-align" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
			<div class="post-comment-auther post-auther">
				<div><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></div>&nbsp;&nbsp;
				<div id="acl-time"><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></div>&nbsp;&nbsp;
				<div><?php _e('分类: '); ?><?php $this->category(','); ?></div>&nbsp;&nbsp;
				<div><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 评论', '%d 评论'); ?></a></div>
				<div><?php _e('文章字数: '); ?><?php $this->charactersNum(); ?></div>
			</div>
			<div class="post-content" itemprop="articleBody">
				<?php $this->content(); ?>
				<img class="img" src="https://ifdo.cool/bg.png" alt="" title="首图图大小：宽680px  高230px" hidden="1" />
			</div>
			<div style="text-align:center;">
				<div id="qrcodeContent" >
					<a href='<?php $this->permalink() ?>'><img src="https://nk.uwp.ac.cn/qr/index.php?text= <?php $this->permalink() ?>" alt="<?php $this->title() ?>二维码" width=150 height=150/></a>
				</div> 
				<div style="padding:10px;margin-top: -15px;">
					<span><strong> &nbsp;&nbsp;&nbsp;扫描二维码,在手机阅读！</strong></span>
				</div>
				<hr>
			</div>
			<p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
		</article>
	

	<div class="post-near">
		<div id="li-last">上一篇: <?php $this->thePrev('%s','没有了'); ?></div>
		<div id="li-next">下一篇: <?php $this->theNext('%s','没有了'); ?></div>
	</div>

	<?php $this->need('comments.php'); ?>




    </div>
	<?php $this->need('footer.php'); ?>
</div>


<?php $this->need('sidebar.php'); ?>
