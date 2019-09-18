<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="content">
    <div class="post_title" style="background:#00007f">
        <img src="<?php $this->options->themeUrl(); ?>img/mycomputer.png">
        <h1>404</h1>
        <a href="<?php $this->options->siteUrl(); ?>"><div class="btn"><img src="<?php $this->options->themeUrl(); ?>img/close.ico"></div></a>
    </div>
    <div class="post_content">
        <br><center>你迷路了 :(</center><br>
    </div>
</div>

<?php $this->need('footer.php'); ?>

