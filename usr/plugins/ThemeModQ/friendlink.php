<?php
error_reporting(E_ALL);
include 'header.php';
include 'menu.php';

date_default_timezone_set('PRC');

$stat = Typecho_Widget::widget('Widget_Stat');

$db = Typecho_Db::get();
$prefix = $db->getPrefix();
//计算分页
$pageSize = 30;
$currentPage = isset($_REQUEST['p']) ? ($_REQUEST['p'] + 0) : 1;

$users = $db->fetchAll($db->select()->from('table.friendlink')
    ->order('table.friendlink.createtime', Typecho_Db::SORT_DESC));

$pageCount = ceil( count($users)/$pageSize );

$userpage = $db->fetchAll($db->select()->from('table.friendlink')
    ->page($currentPage, $pageSize)
    ->order('table.friendlink.createtime', Typecho_Db::SORT_DESC));

//计算分组
$options = Helper::options();

$pages = $db->fetchAll($db->select()->from('table.contents')
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.created < ?', $options->gmtTime)
    ->where('table.contents.type = ?', 'page')
    ->order('table.contents.created', Typecho_Db::SORT_DESC));

$articles = $db->fetchAll($db->select()->from('table.contents')
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.created < ?', $options->gmtTime)
    ->where('table.contents.type = ?', 'post')
    ->order('table.contents.created', Typecho_Db::SORT_DESC));

$count = count($pages) + count($articles);

?>
<div class="main">
    <div class="body container">
        <?php include 'page-title.php'; ?>
        <div class="row typecho-page-main" role="main">
            <div class="col-mb-12 typecho-list">
                <div class="typecho-list-operate clearfix">
                    <form method="POST" action="<?php $options->adminUrl('extending.php?panel=ThemeModQ%2Ffriendlink.php'); ?>">
                        <div class="search" role="search">
                            <select name="p">
                                <?php for($i=1;$i<=$pageCount;$i++): ?>
                                    <option value="<?php echo $i; ?>"<?php if($i == $currentPage): ?> selected="true"<?php endif; ?>>第<?php echo $i; ?>页</option>
                                <?php endfor; ?>   
                            </select>
                            <button type="submit" class="btn btn-s"><?php _e('跳转'); ?></button>
                            <?php if(isset($request->uid)): ?>
                                <input type="hidden" value="<?php echo htmlspecialchars($request->get('uid')); ?>" name="uid" />
                            <?php endif; ?> 
                        </div>
                    </form>
                </div><!-- end .typecho-list-operate -->
                <div class="row typecho-page-main" role="main">
            <div class="typecho-list-operate clearfix">
                <form method="get">
                    <div class="operate">
                        <label><i class="sr-only">全选</i><input type="checkbox" class="typecho-table-select-all"></label>
                        <div class="btn-group btn-drop">
                            <button class="dropdown-toggle btn-s" type="button"><i class="sr-only">操作</i>选中项 <i class="i-caret-down"></i></button>
                            <ul class="dropdown-menu">
                                <!-- <li><a href="<?php $options->index('/action/friend?approved'); ?>">通过</a></li> -->
                                <li><a lang="你确认要删除这些友链吗?" href="<?php $options->index('/action/friend?delete'); ?>">删除</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
                <form method="post" name="manage_posts" class="operate-form">
                    <div class="typecho-table-wrap">
                        <table class="typecho-list-table">
                            <colgroup>
                                <col width="10%"/>
                                <col width="12.5%"/>
                                <col width="10%"/>
                                <col width="15%"/>
                                <col width="15%"/>
                                <col width="15%"/>
                            </colgroup>
                            <thead>
                            <tr>
                                <th> </th>
                                <th><?php _e('站名'); ?></th>
                                <th><?php _e('描述'); ?></th>
                                <th><?php _e('站图'); ?></th>
                                <th><?php _e('创建时间'); ?></th>
                                <th><?php _e('主页'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($userpage)): ?>
                                <?php foreach($userpage as $user): ?>
                                    <tr id="user-<?php echo $user['id']; ?>">
                                        <td><input type="checkbox" value="<?php echo $user['id']; ?>" name="id[]"></td>
                                        <td><a href="<?php echo $user['url']; ?>"><?php echo $user['name']; ?></a></td>
                                        <td><?php echo $user['description']; ?></td>                                    
                                        <td><?php echo sprintf("<img width=48 height=48 src='%s'>",$user['icourl']); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s', $user['createtime']); ?></td>
                                        <td><a href="<?php echo $user['url']; ?>"><?php echo $user['url']; ?></a></td>
                                    </tr>
                                <?php endforeach;?> 
                                <?php else: ?>
                            <tr>
                                <td colspan="6"><h6 class="typecho-list-table-title"><?php _e('没有任何友链'); ?></h6></td>
                            </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </form><!-- end .operate-form -->


            </div><!-- end .typecho-list -->
        </div><!-- end .typecho-page-main -->
    </div>
</div>



<?php
include 'copyright.php';
include 'common-js.php';
include 'table-js.php';
?>
<script>
$(function(){
    var show = $('.show-hide')
    var pre = $('.org-value')

    show.css('color', 'blue');
    show.css('cursor', 'cursor');
    $('.org-value pre').css('background-color', '#E3FFDA');

    pre.hide();

    show.on('click', function(){
        $(this).hide().parent().find('.org-value').show();
    });

    pre.on('click', function(){
        $(this).hide().parent().find('.show-hide').show();
    });
});
</script>
<?php
include 'footer.php';
?>
