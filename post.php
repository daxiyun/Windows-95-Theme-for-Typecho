<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" class="content">
    <div class="post_title">
        <img src="<?php $this->options->themeUrl(); ?>img/file.png">
        <h1><?php $this->title() ?></h1>
        <a href="<?php $this->options->siteUrl(); ?>"><div class="btn"><img src="<?php $this->options->themeUrl(); ?>img/close.ico"></div></a>
    </div>
    <ul class="topbar">
        <li><a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->themeUrl(); ?>img/home.ico">首页</a></li>
        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
        <?php while ($category->next()): ?>
        <li>
            <a href="<?php $category->permalink(); ?>">
            <img src="<?php $this->options->themeUrl(); ?>img/folder.ico"><?php $category->name(); ?>
            </a>
        </li>
        <?php endwhile; ?>
    </ul>
    <div class="post_content">
        <center><h1><?php $this->title(); ?></h1></center>
        <?php $this->content(); ?>
        <?php Digg_Plugin::output(); ?>
		<?php $this->need('comments.php'); ?>
    </div>
    <div class="post_total">
        <div class="foot"><?php $this->date('Y-m-d H:i:s'); ?>&nbsp;标签&nbsp;<?php $this->tags('', true, '&nbsp;') ?></div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
