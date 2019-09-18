<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->footer(); ?>

<script>
<?php if ($this->options->highlight === 'true') { ?>
hljs.initHighlightingOnLoad();
hljs.initLineNumbersOnLoad();
<?php } ?>
function picBig(img) {
    document.documentElement.style.overflowY = 'hidden';
    document.getElementsByClassName("post_content")[0].style.overflowY = 'hidden';
    document.getElementById('bigImg').src=img;
    document.getElementById('bigBox').style.display = "block";
}
function picClose() {
    document.documentElement.style.overflowY = 'scroll';
    document.getElementsByClassName("post_content")[0].style.overflowY = 'scroll';
    document.getElementById('bigImg').src="";
    document.getElementById('bigBox').style.display = "none";
}
</script>
<?php $this->options->tongji() ?>
<?php if ($this->options->instantclick === 'true') { ?>
<script src="<?php $this->options->themeUrl('js/instantclick.min.js') ?>" data-no-instant></script>
<script data-no-instant>
InstantClick.on('change', function() {
    <?php if ($this->options->highlight === 'true') { ?>
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightBlock(block);
        hljs.lineNumbersBlock(block);
    });
    <?php } ?>
});
InstantClick.init('mousedown');
</script>
<?php } ?>
</body>
</html>
