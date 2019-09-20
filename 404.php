<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main">
    <div class="top_title">
        <h1><span class="icon-computer"></span>404</h1>
        <a href="<?php $this->options->siteUrl(); ?>"><span class="icon-close"></span></a>
    </div>
    <?php $this->need('nav.php'); ?>
    <div class="post_content">
        <br><center>你迷路了 :(</center><br>
    </div>
</div>

<?php $this->need('footer.php'); ?>

