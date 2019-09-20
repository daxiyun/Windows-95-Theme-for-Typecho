<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main">
    <div class="top_title">
        <h1><span class="icon-computer"></span><?php $this->title() ?></h1>
        <a href="<?php $this->options->siteUrl(); ?>"><span class="icon-close"></span></a>
    </div>
    <?php $this->need('nav.php'); ?>
    <div class="post_content">
        <center><h1><?php $this->title(); ?></h1></center>
        <?php
            $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
            $replacement = '<img src="$1" onclick="picBig(this.src)" class="post_img">';
            $content = preg_replace($pattern, $replacement, $this->content);
            echo $content;
        ?>
	<?php $this->need('comments.php'); ?>
    </div>
    <div class="post_total">
        <div class="foot">
            创建时间：<?php $this->date() ?>&nbsp;
            <?php if ($this->modified !== $this->created) { ?>
            修改时间：<?php echo date('Y-m-d H:i:s', $this->modified) ?>&nbsp;
            <?php } if ($this->tags) { ?>
            标签：<?php $this->tags('', true, '&nbsp;') ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
