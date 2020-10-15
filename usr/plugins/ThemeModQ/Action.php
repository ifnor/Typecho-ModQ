<?php

class ThemeModQ_Action extends Typecho_Widget implements Widget_Interface_Do
{
	/* 数据库对象 */
    private $_db;

    /* 获取配置 */
    private $_options;

    public function __construct($request, $response, $params = NULL)
    {
        parent::__construct($request, $response, $params);

        /* 获取数据库对象、配置及用户 */
        $this->_db = Typecho_Db::get();
        $this->_options = Typecho_Widget::widget('Widget_Options');
    }





     /**
     * 提交友链
     *
     * @access public
     * @return void
     */
    public function write()
    {
        
        $content['name'] = $this->request->filter('strip_tags', 'trim', 'xss')->name;
        $content['url'] = $this->request->filter('strip_tags', 'trim', 'xss')->url;
        $content['icourl'] = $this->request->filter('strip_tags', 'trim', 'xss')->icourl;
        $content['description'] = $this->request->filter('strip_tags', 'trim', 'xss')->description;
        $content['createtime'] = time();
        // $createtime = $this->request->filter('strip_tags', 'trim', 'xss')->createtime;
        // $name=$_POST['name'];
  //       $content['name'] = $_POST['name'];
		// $content['url'] = $_POST['url'];
		// $content['icourl'] = $_POST['icourl'];
		// $content['description'] = $_POST['description'];
        if ($content['icourl']=='') {
            $host = $content['url'];
            $content['icourl']=$host.'/favicon.ico';
        }
        if ($content['url']==''||$content['name']=='') {
            $this->response->goBack();
        }else{
            $realId = $this->_insert($content);

        $this->widget('Widget_Notice')->set($realId > 0 ? _t('提交友链成功') : _t('提交友链失败'),
            $realId > 0 ? 'success' : 'notice');
        $this->response->goBack();
        }
        
    }

	/**
     * 插入表友链
     *
     * @access private
     * @param array $content 内容数组
     * @return integer
     */
    private function _insert(array $content)
    {

        /** 构建插入结构 */
        $insertStruct = array(
            'name'         => $content['name'],
            'url'          => $content['url'],
            'createtime'       => $content['createtime'],
           	'icourl'          =>  $content['icourl'],
            'description'          =>   $content['description'],
            
        );

        $insertId = $this->_db->query($this->_db->insert('table.friendlink')->rows($insertStruct));

        return $insertId;
    }
    /**
     * 删除友链
     *
     * @access private
     * @param string $draft 友链id
     * @return void
     */
    private function _deleteDraft($id) {
        $this->_db->query($this->_db->delete('table.friendlink')
            ->where('id = ?', $id));
    }
    /**
     * 绑定动作
     *
     * @access public
     * @return void
     */
    public function action()
    {
        if (!$this->request->is('write')) {
            $this->widget('Widget_User')->pass('administrator');
            // $this->on($this->request->is('approved'))->approved();
            $this->on($this->request->is('delete'))->delete();
            // $this->on($this->request->is('preview'))->preview();
        }
        $this->on($this->request->is('write'))->write();
    }

}