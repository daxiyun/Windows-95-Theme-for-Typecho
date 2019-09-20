<?php
/**
 * 支持 代码高亮、图片放大浏览、无刷新加载 InstantClick
 * 查看更新及主题详情请点击上面的作者链接
 * 
 * @package Windows 95 Theme for Typecho
 * @author 云滨
 * @version 103
 * @link https://github.com/vitoland/Windows-95-Theme-for-Typecho
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div id="main">
    <div class="top_title">
        <h1><span class="icon-computer"></span><?php $this->options->title() ?></h1>
    </div>
    <?php $this->need('nav.php'); ?>
	<div id="disk" class="tag_list">
		<ul id="tag-list">
			<li><span class="icon-disk"></span>(C:)
        		<ul>
        		    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                    <?php while ($category->next()): ?>
                    <li><a href="<?php $category->permalink(); ?>"><span class="icon-folder"></span><?php $category->name(); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </li>
		</ul>
		
		<ul id="tag-list">
		    <li><span class="icon-folder"></span>最新评论
    		    <ul>
                    <?php $this->widget('Widget_Comments_Recent', 'pageSize=10')->to($comments); ?>
                    <?php while($comments->next()): ?>
                        <li><a href="<?php $comments->permalink(); ?>" title="<?php $comments->dateWord() ?> 在 <?php $comments->title() ?> 留言"><?php $comments->gravatar() ?> <?php $comments->excerpt(20, '...'); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </li>
        </ul>
        
        <!--友情链接-->
        <?php if ($this->options->links) { ?>
		<ul id="tag-list">
		    <li><span class="icon-folder"></span>友情链接
    		    <ul class="links" data-no-instant>
    		        <?php
                    	$array = explode(PHP_EOL,$this->options->links);
                        foreach (explode(PHP_EOL,$this->options->links) as $value) {
                            $link = trim($value);
                            $link = explode("<=>",$link);
                    ?>
                    <li><a href="<?php echo $link[1] ?>" target="_blank" title="<?php echo $link[0] ?>"><span class="icon-internet"></span><?php echo $link[0] ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
        <?php } ?>
    </div>
    <div class="post_list">
        <ul>
            <?php while($this->next()): ?>
            <li><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><span class="icon-file-big"></span><?php $this->title() ?></a></li>
            <?php endwhile; ?>
        </ul>
        <?php $this->pageNav('上一页', '下一页') ?>
    </div> 
    <div class="post_total">
        <div class="foot">
            <?php _e('<a href="http://www.typecho.org" target="_blank">Typecho</a>'); ?>
            &copy;<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
            <?php if ($this->options->beian) { ?>
            <a href="http://beian.miit.gov.cn/" target="_blank"><?php $this->options->beian() ?></a>
            <?php } if ($this->options->gongan) { ?>
            <a href="http://beian.miit.gov.cn/" target="_blank"><span class="icon-gongan"></span><?php $this->options->gongan() ?></a>
            <?php } ?>
            全站共有 <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?><?php $stat->publishedPostsNum() ?> 篇文章 
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>



