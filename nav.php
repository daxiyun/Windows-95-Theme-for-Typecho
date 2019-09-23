<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

    <ul class="topbar">
        <li><a href="<?php $this->options->siteUrl(); ?>"><span class="icon-home"></span>主页</li>
        <!--独立页面导航-->
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
        <li><a href="<?php $pages->permalink(); ?>"><span class="icon-file"></span><?php $pages->title(); ?></a></li>
        <?php endwhile; ?>
        <!--导航链接-->
        <?php if ($this->options->nav) { ?>
    		        <?php
                    	$array = explode(PHP_EOL,$this->options->nav);
                        foreach ($array as $value) {
                            $nav = trim($value);
                            $nav = explode("<=>",$nav);
                    ?>
                    <li><a href="<?php echo $nav[1] ?>" target="_blank" title="<?php echo $nav[0] ?>"><span class="icon-file"></span><?php echo $nav[0] ?></a></li>
                    <?php } ?>
        <?php } ?>
    </ul>
    