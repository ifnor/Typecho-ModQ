<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<div class="rightbar .rightbar-col">
	<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">
		<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
	
			<div class="topline"></div>
			<div class=".rightbar-col">
				<!-- 联系方式 ——暂无 -->
				<section class="widget">
					<h3>最新文章</h3>
					<div class="lastpage">
						<!-- 最新文章 -->
							<?php $this->widget('Widget_Contents_Post_Recent')
			        	->parse('<li><a href="{permalink}"><button>{title}</button></a></li>'); ?>
					</div>
				</section>
			</div>
		<?php endif; ?>
			<div class="rightbar-col">
				<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
		   			<section class="widget">
						<h3>最近评论</h3>
						<div class="rightcomments-algin">
						<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
							<?php while($comments->next()): ?>
								<a href="<?php $comments->permalink(); ?>">
									<button id="rightcomment">
										<div class="rightcomment">
											<div id="comments-img">
												<?php $comments->gravatar($singleCommentOptions->avatarSize . 100, $singleCommentOptions->defaultAvatar); ?>
												<!-- <img src="https://q.qlogo.cn/g?b=qq&nk=1787990728&s=100"> -->
											</div>
											<div class="right-comments">
												<div>
													<?php $comments->author(false); ?>: 
												</div>
												<div id="commentsinfo">
													<span>
												  	<?php $comments->excerpt(14, '...'); ?>
												  	</span>
												</div>
											</div>
										</div>
									</button>
								</a>
							<?php endwhile; ?>	
						</div>	
					</section>
				<?php endif; ?>
			</div>
	    
	    	<div class="rightbar-col">
	    		<h3>博客信息</h3>
				<div class="aboutblog">
					<table>
						<tr>
							<td><img src="https://q.qlogo.cn/g?b=qq&nk=1787990728&s=100"></td>
							<td>文章数量</td>
							<td><p><?php echo Typecho_Widget::widget('Widget_Stat')->PublishedPostsNum;?></p></td>
						</tr>
						<tr>
							<td><img src="https://q.qlogo.cn/g?b=qq&nk=1787990728&s=100"></td>
							<td>评论数量</td>
							<td><p><?php echo Typecho_Widget::widget('Widget_Stat')->PublishedCommentsNum;?></p></td>
						</tr>
						<tr>
							<td><img src="https://q.qlogo.cn/g?b=qq&nk=1787990728&s=100"></td>
							<td>运行时间</td>
							<td><p><?php $this->lives(); ?></p></td>
						</tr>
					</table>
				</div>
	    	</div>
	    	<div class=".rightbar-col">
	    		<h3>平台</h3>
					<div class="mp">
						<img src="https://qqminiapp.cdn-go.cn/homepage/8600a52c/favicon.ico" onmouseover="qqmp(qqmp)" onmouseout="mOut(bubble)"/>
						<img src="https://res.wx.qq.com/wxopenres/htmledition/images/favicon324c17f2.ico" onmouseover="wxxmp(wxxmp)" onmouseout="mOut(bubble)"/>
						<img src="https://res.wx.qq.com/a/wx_fed/assets/res/NTI4MWU5.ico" onmouseover="wxmp(wxmp)" onmouseout="mOut(bubble)"/>
					</div>
	    	</div>
	    	<div class=".rightbar-col">
	    		<!-- <div class="mpimg"><p id="mpimg"></p><p>公众平台二维码</p></div> -->
	    		<span id="mpimg"></span>
	    		<!-- <p id="mpimg"></p> -->
	    		<!-- <div class="mpimg" id="mpimg"></div> -->
	    	</div>
	</div>
</div>

<div class="turnup">
	<div>
		<button onclick="turnup()">
			<img src="<?php $this->options->themeUrl('./img/turnup.png'); ?>">
		</button>
	</div>
</div>