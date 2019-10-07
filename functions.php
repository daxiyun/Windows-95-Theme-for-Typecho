<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $db = Typecho_Db::get();
    $query= $db->select('value')->from('table.options')->where('name = ?', 'theme:'.Helper::options()->theme);
    $result = $db->fetchAll($query)[0]["value"];
    $array = unserialize($result);
    $check = false;
    foreach($array as $k=>$val) {
        if ($val) {
            $check = true;
        }
    }
    if ($check == false) {
        if (is_file(__DIR__."/config.txt")) {
            $config = unserialize(file_get_contents(__DIR__."/config.txt"));
        }
    } else {
        file_put_contents(__DIR__."/config.txt", $result);
    }
    
    $nav = new Typecho_Widget_Helper_Form_Element_Textarea('nav', NULL, $config["nav"], _t('导航链接'), '');
    $form->addInput($nav);
    
    $links = new Typecho_Widget_Helper_Form_Element_Textarea('links', NULL, $config["links"], _t('友情链接'), _t('<p>导航链接和友情链接的格式一致，一行一条，中间用 <=> 分开。<br>云滨<=>https://www.liyunbin.com/</p>'));
    $form->addInput($links);
    
    $highlight = new Typecho_Widget_Helper_Form_Element_Radio('highlight', array('true' => '开启', 'false' => '关闭'),  'true', _t('自带代码高亮，米色的底色，其实黑色更费眼。'), '');
    $form->addInput($highlight);
    
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, $config["tongji"], _t('统计代码'), _t('上面的代码会在页面最底部加载，你可以添加一些其它 JS 脚本扩展功能。<br>需要使用 &lt;script&gt;&lt;/script&gt; 标签。'));
    $form->addInput($tongji);
	
    $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, $config["beian"], _t('工信部备案号'), '');
    $form->addInput($beian);

    $gongan = new Typecho_Widget_Helper_Form_Element_Text('gongan', NULL, $config["gongan"], _t('公安部备案号'), '');
    $form->addInput($gongan);
}
