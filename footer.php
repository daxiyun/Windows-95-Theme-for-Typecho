<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<script>
if (document.body.clientWidth < 600) {
    document.getElementById("disk").style.display="none";//隐藏
}
window.onresize=function(){
    if (document.body.clientWidth < 600) {
        document.getElementById("disk").style.display="none";//隐藏
    } else {
        document.getElementById("disk").style.display="";//显示
    }
}
</script>
<?php $this->footer(); ?>
</body>
</html>
