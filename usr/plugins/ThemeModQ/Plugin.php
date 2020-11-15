<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 主题-modQ
 * 
 * @package ThemeModQ
 * @author ceshon
 * @version 0.0.1(test)
 * @link https://ifdo.ml
 */
class ThemeModQ_Plugin implements Typecho_Plugin_Interface
{
	/**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
	public static function activate(){
        // 路由
        self::initPage();
        $flresult = self::initTable();
        Helper::addAction('friend', 'ThemeModQ_Action');

		Helper::removePanel(1, 'ThemeModQ/friendlink.php');
        Helper::addPanel(1, 'ThemeModQ/friendlink.php', '友链', '友链管理', 'administrator');
		

        Typecho_Plugin::factory('Widget_Archive')->___charactersNum = array('ThemeModQ_Plugin', 'charactersNum');
		Typecho_Plugin::factory('admin/menu.php')->navBar = array('ThemeModQ_Plugin', 'render');
		Typecho_Plugin::factory('Widget_Archive')->footer = array('ThemeModQ_Plugin','icp');
		// Typecho_Plugin::factory('usr/themes/theme-modQ/sidebar.php')->lives = array('ThemeModQ_Plugin','lives');
		Typecho_Plugin::factory('Widget_Archive')->___lives = array('ThemeModQ_Plugin', 'lives');
		// Typecho_Plugin::factory('usr/themes/theme-modQ/header.php')
		Typecho_Plugin::factory('Widget_Archive')->___social = array('ThemeModQ_Plugin','social');
		Typecho_Plugin::factory('Widget_Archive')->___headimg = array('ThemeModQ_Plugin','headimg');
		Typecho_Plugin::factory('Widget_Archive')->___custom = array('ThemeModQ_Plugin','custom');//访问记录
		return '主题插件开启，请配合主题';
    }
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){
        Helper::removeAction('friend');
    	Helper::removeRoute('jsonp');
        Helper::removeAction('json');
    	 Helper::removePanel(1, 'ThemeModQ/friendlink.php');
    	 return '插件关闭';
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){
    	 /** 分类名称 */
    	$lives= new Typecho_Widget_Helper_Form_Element_Text('lives',NULL,date('Y-m-d'), _t('博客安装时间'),_t('请输入博客安装的时间：Y-m-d'));
        $form->addInput($lives);
        $headimg = new Typecho_Widget_Helper_Form_Element_Text('headimg',NULL,NULL, _t('主页头像'),_t('输入网站主页头像链接'));
        $form->addInput($headimg);
        $icpNum = new Typecho_Widget_Helper_Form_Element_Text('icpNum',NULL,NULL, _t('备案号'),_t('输入网站的备案号'));
        $form->addInput($icpNum);
        $social_qq= new Typecho_Widget_Helper_Form_Element_Text('social_qq',NULL,NULL, _t('QQ'),_t('添加QQ二维码'));
        $form->addInput($social_qq);
        $social_github= new Typecho_Widget_Helper_Form_Element_Text('social_github',NULL,NULL, _t('GitHub'),_t('GitHub二维码'));
        $form->addInput($social_github);
        $social_weibo= new Typecho_Widget_Helper_Form_Element_Text('social_weibo',NULL,NULL, _t('微博'),_t('微博二维码'));
        $form->addInput($social_weibo);
        $customs= new Typecho_Widget_Helper_Form_Element_Text('customs',NULL,NULL, _t('访客统计'),_t('输入第三方访客代码即可'));
        $form->addInput($customs);


    }
    
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    
    public static function custom(){
    	$db = Typecho_Db::get();
    	
    	$customs=Typecho_Widget::widget('Widget_Options')->plugin('ThemeModQ')->customs;
    	echo htmlspecialchars($customs);

    }
    public static function render(){
    	echo '<a href="'
    		.htmlspecialchars('./options-plugin.php?config=ThemeModQ')
    		.'"<button>'
    		."ThemeModQ"
    		.'</button></a>';
    	echo '<span class="message success">'
            . htmlspecialchars(Typecho_Widget::widget('Widget_Options')->plugin('ThemeModQ')->icpNum)
            . '</span>';
    }
    public static function icp(){}
    public static function social(){
    	echo '<script>'
    		."function weibo(weibo){bubble.innerHTML='"
			.'<img src="https://nk.uwp.ac.cn/qr/?text='
			.Typecho_Widget::widget('Widget_Options')->plugin('ThemeModQ')->social_weibo
			.'" style="width:100px;height:100px;">'
			."'}</script>";
		echo '<script>'
    		."function qq(qq){bubble.innerHTML='"
			.'<img src="https://nk.uwp.ac.cn/qr/?text='
			.Typecho_Widget::widget('Widget_Options')->plugin('ThemeModQ')->social_qq
			.'" style="width:100px;height:100px;">'
			."'}</script>";
		echo '<script>'
    		."function github(github){bubble.innerHTML='"
			.'<img src="https://nk.uwp.ac.cn/qr/?text='
			.Typecho_Widget::widget('Widget_Options')->plugin('ThemeModQ')->social_github
			.'" style="width:100px;height:100px;">'
			."'}</script>";
    }
    public static function lives(){
    	$builtTime=date_create(htmlspecialchars(Typecho_Widget::widget('Widget_Options')->plugin('ThemeModQ')->lives));
    	$nowTime=date_create(date('Y-m-d'));
    	$diff= date_diff($builtTime,$nowTime);
    	echo $diff->format("%a days");
    }
    public static function charactersNum($archive)
	{
	    return mb_strlen($archive->text, 'UTF-8');
	}
	public static function headimg(){
		echo htmlspecialchars(Typecho_Widget::widget('Widget_Options')->plugin('ThemeModQ')->headimg);
	}
     /**
     * 创建友链数据表
     *
     * @access public
     * @return void
     */
    public static function initTable()
    {
        $db = Typecho_Db::get();
        $script = file_get_contents(__TYPECHO_ROOT_DIR__ .
            __TYPECHO_PLUGIN_DIR__ . '/ThemeModQ/sql/friendlink.sql');
        $script = str_replace('typecho_', $db->getPrefix(), $script);

        try {
            $script = trim($script);
            if ($script) {
                $db->query($script, Typecho_Db::WRITE);
            }
            return _t('稿件数据表已创建, 插件启用成功, 请配置');
        } catch (Typecho_Db_Exception $e) {
            $code = $e->getCode();
            if (1050 == $code) {
                try {
                    $db->query($db->select()->from('table.friendlink'));
                    return _t('检测到数据表已存在, 插件启用成功, 请配置');
                } catch (Typecho_Db_Exception $e) {
                    $code = $e->getCode();
                    throw new Typecho_Plugin_Exception('数据表检测失败, 插件无法启用: ' . $code);
                }
            }
            throw new Typecho_Plugin_Exception('数据表建立失败, 插件无法启用: ' . $code);
        }
    }

     /**
     * 创建投稿页面
     *
     * @access public
     * @return void
     */
    public static function initPage()
    {
        $db = Typecho_Db::get();
        $exist = $db->fetchRow($db->select()->from('table.contents')
            ->where('slug = ? AND type = ?', 'friendlink', 'page'));
            if (empty($exist)) {
            $options = Helper::options();

            $db->query($db->insert('table.contents')->rows(array(
                'title'         =>  '友链',
                'slug'          =>  'friendlink',
                'created'       =>  $options->gmtTime,
                'modified'      =>  $options->gmtTime,
                'text'          =>  '<!--markdown-->',
                'order'         =>  5,
                'authorId'      =>  1,
                'template'      =>  'friendlink.php',
                'type'          =>  'page',
                'status'        =>  'publish',
                'password'      =>  NULL,
                'commentsNum'   =>  0,
                'allowComment'  =>  '0',
                'allowPing'     =>  '0',
                'allowFeed'     =>  '0',
                'parent'        =>  0
            )));
        } else {
            $db->query($db->update('table.contents')->rows(array(
                'title'         =>  '友链',
                'slug'          =>  'friendlink',
                'order'         =>  5,
                'template'      =>  'friendlink.php',
                'type'          =>  'page',
                'status'        =>  'publish',
                'password'      =>  NULL,
                'parent'        =>  0
            ))->where('slug = ? AND type = ?', 'friendlink', 'page'));
        }
      
    }

}


	
