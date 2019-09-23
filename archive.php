<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main">
    <div class="top_title">
        <h1><span class="icon-computer"></span><?php $this->options->title() ?></h1>
    </div>
    <?php $this->need('nav.php'); ?>
    <?php $this->need('sidebar.php'); ?>
    <div class="post_list">
        <ul>
            <?php while($this->next()): ?>
            <li><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><span class="icon-file-big"></span><?php $this->title() ?></a></li>
            <?php endwhile; ?>
        </ul>
        <?php $this->pageNav('上一页', '下一页') ?>
    </div>
    <div class="post_total">
        <div class="foot">&nbsp;</div>
    </div>
</div>
<?php $this->need('footer.php'); ?>
