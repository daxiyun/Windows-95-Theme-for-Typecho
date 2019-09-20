<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    
    <?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum(_t('暂无评论'), '', _t('共有 %d 条评论')); ?></h3>
    <?php $comments->listComments(); ?>
    <?php $comments->pageNav('上一页', '下一页'); ?>
    <?php endif; ?>
    
    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    </div>
    <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
        <?php if($this->user->hasLogin()): ?>
    	<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
        <?php else: ?>
    	<p>
    		<input type="text" name="author" id="author" class="text" placeholder="昵称" value="<?php $this->remember('author'); ?>" required />
    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		<input type="email" name="mail" id="mail" class="text" placeholder="邮箱" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    	</p>
        <?php endif; ?>
        <p>
            <textarea rows="5" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
        </p>
    	<p>
            <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
        </p>
    </form>
    <?php else: ?>
    <h3><?php _e('一年又一年，物是人已非。'); ?></h3>
    <?php endif; ?>
</div>
