<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main">
    <div class="post_title">
        <h1><span class="icon-mycomputer"></span><?php $this->title() ?></h1>
        <a href="<?php $this->options->siteUrl(); ?>"><span class="btn-close"></span></a>
    </div>
    <?php $this->need('nav.php'); ?>
    <div class="post_content">
        <center><h1><?php $this->title(); ?></h1></center>
        <?php
            $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
            $replacement = '<a href="javascript:picBig(\'$1\')" class="post_img"><img src="$1"></a>';
            $content = preg_replace($pattern, $replacement, $this->content);
            echo $content;
        ?>
        <div id="bigBox" onclick="picClose()"><img id="bigImg"></div> 
        <?php Digg_Plugin::output(); ?>
		<?php $this->need('comments.php'); ?>
    </div>
    <div class="post_total">
        <div class="foot"><?php $this->date(); ?>&nbsp;标签&nbsp;<?php $this->tags('', true, '&nbsp;') ?></div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
