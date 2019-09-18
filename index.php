<?php
/**
 * 查看更新及主题详情请点击上面的作者链接
 * 
 * @package Windows 95 Theme for Typecho
 * @author 云滨
 * @version 102
 * @link https://github.com/vitoland/win95-Theme-for-Typecho
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div id="main" class="wrapper">
    <div class="default_title">
        <img src="<?php $this->options->themeUrl(); ?>img/mycomputer.png">
        <h1>&nbsp;<?php $this->options->title() ?></h1>
    </div>
    <ul class="topbar">
        <li><a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->themeUrl(); ?>img/home.ico">首页</a></li>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
        <li><a href="<?php $pages->permalink(); ?>"><img src="<?php $this->options->themeUrl(); ?>img/file.png"><?php $pages->title(); ?></a></li>
        <?php endwhile; ?>
        <?php if ($this->options->nav) { ?>
    		        <?php
                    	$array = explode(PHP_EOL,$this->options->nav);
                        foreach (explode(PHP_EOL,$this->options->nav) as $value) {
                            $nav = trim($value);
                            $nav = explode("<=>",$nav);
                    ?>
                    <li><a href="<?php echo $nav[1] ?>" target="_blank" title="<?php echo $nav[0] ?>"><img src="<?php $this->options->themeUrl() ?>img/internet.ico"> <?php echo $nav[0] ?></a></li>
                    <?php } ?>
        <?php } ?>
    </ul>
	<div id="disk" class="tag_list">
		<ul id="tag-list">
			<li><img src="<?php $this->options->themeUrl(); ?>img/disk.png">(C:)
        		<ul>
        		    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                    <?php while ($category->next()): ?>
                    <li><a href="<?php $category->permalink(); ?>"><img src="<?php $this->options->themeUrl(); ?>img/folder.ico"><?php $category->name(); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </li>
		</ul>
		<br>
		<ul id="tag-list">
		    <li><img src="<?php $this->options->themeUrl(); ?>img/folder.ico"> 最新评论
    		    <ul>
                    <?php $this->widget('Widget_Comments_Recent', 'pageSize=10')->to($comments); ?>
                    <?php while($comments->next()): ?>
                        <li><a href="<?php $comments->permalink(); ?>" title="<?php $comments->dateWord() ?> 在 <?php $comments->title() ?> 留言"><?php $comments->gravatar() ?> <?php $comments->excerpt(20, '...'); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </li>
        </ul>
        <br>
        <?php if ($this->options->links) { ?>
		<ul id="tag-list">
		    <li><img src="<?php $this->options->themeUrl(); ?>img/folder.ico"> 友情链接
    		    <ul class="links">
    		        <?php
                    	$array = explode(PHP_EOL,$this->options->links);
                        foreach (explode(PHP_EOL,$this->options->links) as $value) {
                            $link = trim($value);
                            $link = explode("<=>",$link);
                    ?>
                    <li><a href="<?php echo $link[1] ?>" target="_blank" title="<?php echo $link[0] ?>"><img src="<?php $this->options->themeUrl() ?>img/internet.ico"> <?php echo $link[0] ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
        <?php } ?>
	</div>
    <div class="post_list">
        <ul>
            <?php while($this->next()): ?>
            <li><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><img src="<?php $this->options->themeUrl(); ?>img/file.ico" title="<?php $this->title() ?>"><?php $this->title() ?></a></li>
            <?php endwhile; ?>
        </ul>
        <?php $this->pageNav('上一页', '下一页') ?>
    </div> 
    <div class="post_total">
        <div class="foot">
            <?php _e('Powered by <a href="http://www.typecho.org" target="_blank">Typecho</a>'); ?> | 
            &copy;<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> | 
            <?php if ($this->options->beian) { ?>
            <a href="http://beian.miit.gov.cn/" target="_blank"><?php $this->options->beian() ?></a> | 
            <?php } if ($this->options->gongan) { ?>
            <a href="http://beian.miit.gov.cn/" target="_blank"><img src="<?php $this->options->themeUrl(); ?>img/gongan.png"><?php $this->options->gongan() ?></a> | 
            <?php } ?>
            全站共有 <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?><?php $stat->publishedPostsNum() ?> 篇文章
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>



