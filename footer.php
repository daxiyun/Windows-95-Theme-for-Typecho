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
<?php $this->options->tongji() ?>
</body>
</html>
