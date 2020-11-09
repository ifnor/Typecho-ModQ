<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer id="footer" class="post-content" role="contentinfo">
	<div>
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('本主题由<a href="//ifdo.cool">即简</a>制作维护'); ?>.
    </div>
    <div>
    	<span id="beian">
			<a href="http://www.beian.miit.gov.cn">备案:<?php echo htmlspecialchars(Typecho_Widget::widget('Widget_Options')->plugin('ThemeModQ')->icpNum);?></a>
		</span>
	</div>
    
		
	
</footer><!-- end #footer -->
<?php $this->footer(); ?>
</body>
</html>
