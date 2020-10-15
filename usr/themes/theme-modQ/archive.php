<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');?>
    <div class="body" id="main" role="main">
        <h3 class="archive-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h3>
        <?php if ($this->have()): ?>
    	<?php while($this->next()):?>
            <div class="article">
                <div class="acl-post">
                    <div class="acl-left">
                        <div class="acl-post-comment">
                            <div class="thembimg">
                                <img class="img" src="https://q.qlogo.cn/g?b=qq&nk=1787990728&s=100">
                            </div>
                            <div class="post-comment-auther">
                                    <div><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></div>&nbsp;&nbsp;
                                    <div id="acl-time"><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></div>&nbsp;&nbsp;
                                    <div><?php _e('分类: '); ?><?php $this->category(','); ?></div>&nbsp;&nbsp;
                                    <div><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="acl-right">
                        <div>
                            <h2 class="" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                        </div>
                        
                        <div class="post-content post-content-show" itemprop="articleBody">
                            <?php $this->content('- 阅读剩余部分 -'); ?>
                        </div>
                    </div>
                </div>
            </div>  
    <?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
        <?php $this->need('sidebar.php'); ?>
    <?php $this->need('footer.php'); ?>
    </div><!-- end #main -->

	
