<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div id="bigBox" onclick="picClose()"><img id="bigImg"></div>

<?php $this->footer(); ?>

<script>
function ChangeDisk() {
    if (document.body.clientWidth < 500) {
        if (document.getElementById("disk")) {
            document.getElementById("disk").style.display="none";//隐藏
        }
    } else {
        if (document.getElementById("disk")) {
            document.getElementById("disk").style.display=null;//显示
        }
    }
}
window.onload=function(){ChangeDisk();}
window.onresize=function(){ChangeDisk();}

<?php if ($this->options->highlight === 'true') { ?>
hljs.initHighlightingOnLoad();
hljs.initLineNumbersOnLoad();
<?php } ?>

function picBig(img) {
    document.documentElement.style.overflowY = 'hidden';
    document.getElementById('bigImg').src=img;
    document.getElementById('bigBox').style.display = "block";
}
function picClose() {
    document.documentElement.style.overflowY = 'scroll';
    document.getElementById('bigImg').src="";
    document.getElementById('bigBox').style.display = "none";
}
</script>
<?php if ($this->options->instantclick === 'true') { ?>
<script src="<?php $this->options->themeUrl('js/instantclick.min.js') ?>" data-no-instant></script>
<script data-no-instant>
InstantClick.on('change', function() {
    <?php if ($this->options->highlight === 'true') { ?>
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightBlock(block);
        hljs.lineNumbersBlock(block);
    });
    <?php } $this->options->JSload()?>
});
InstantClick.init('mousedown');
</script>
<?php } $this->options->tongji() ?>
</body>
</html>
