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
	
    $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, $config["beian"], _t('工信部备案号'), '');
    $form->addInput($beian);

    $gongan = new Typecho_Widget_Helper_Form_Element_Text('gongan', NULL, $config["gongan"], _t('公安部备案号'), '');
    $form->addInput($gongan);
    
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, $config["tongji"], _t('统计代码'), _t('上面的代码会在页面最底部加载，你可以添加一些其它 JS 脚本扩展功能。<br>需要使用 &lt;script&gt;&lt;/script&gt; 标签。'));
    $form->addInput($tongji);
    
    $instantclick = new Typecho_Widget_Helper_Form_Element_Radio('instantclick', array('true' => '开启', 'false' => '关闭'), "false", _t('开启 InstantClick 无刷新加载，你的博客没有音乐播放器的话不需要开启。'), '请注意：开启此功能后，必须关闭 设置 - 评论 中的 开启反垃圾保护 ，不关闭无法评论。<br>因为我的博客通常没啥人评论。。。所以我懒得修了，实在太麻烦。');
    $form->addInput($instantclick);
    
    $JSload = new Typecho_Widget_Helper_Form_Element_Textarea('JSload', NULL, $config["JSload"], _t('InstantClick 重载'), _t('开启 InstantClick 之后，如果某些插件的前台脚本位于 head 区域，可能会导致脚本失效。<br>请在这里填写相关重载函数，具体函数请咨询相关插件作者。<br>不需要 &lt;script&gt;&lt;/script&gt; 标签，直接填写执行函数即可。'));
    $form->addInput($JSload);
}
