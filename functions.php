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
    
	$nversion = "102";
	echo '<p id="version"></p><script>fetch("https://raw.githubusercontent.com/vitoland/win95-Theme-for-Typecho/master/version.txt").then(function(response){return response.json();}).then(function(data){if ('.$nversion.' < data) {document.getElementById("version").innerHTML = \'你正在使用 <span style="color:blue;">'.$nversion.'</span> 版，最新版本为 <span style="color:red;">\'+data+\'</span><a href="https://github.com/vitoland/Windows-95-Theme-for-Typecho" target="_blank"><button type="submit" class="btn btn-warn" style="margin-left:10px;">前往更新</button></a></p>\';}})</script>';
    
    $nav = new Typecho_Widget_Helper_Form_Element_Textarea('nav', NULL, $config["nav"], _t('导航链接'), '');
    $form->addInput($nav);
    
    $links = new Typecho_Widget_Helper_Form_Element_Textarea('links', NULL, $config["links"], _t('友情链接'), _t('<p>导航链接和友情链接的格式一致，一行一条，中间用 <=> 分开。<br>云滨<=>https://www.liyunbin.com/</p>'));
    $form->addInput($links);
	
    $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, $config["beian"], _t('工信部备案号'), '');
    $form->addInput($beian);

    $gongan = new Typecho_Widget_Helper_Form_Element_Text('gongan', NULL, $config["gongan"], _t('公安部备案号'), '');
    $form->addInput($gongan);
    
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, $config["tongji"], _t('统计代码'), _t('统计代码位于 head 区域最下方，你可以添加一些其它 JS 脚本扩展功能。'));
    $form->addInput($tongji);
}