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
    <script type="text/javascript">  
    (function () {
        window.TypechoComment = {
            dom : function (id) {
                return document.getElementById(id);
            },
            create : function (tag, attr) {
                var el = document.createElement(tag);
                for (var key in attr) {
                    el.setAttribute(key, attr[key]);
                }
                return el;
            },
            reply : function (cid, coid) {
                var comment = this.dom(cid), parent = comment.parentNode,
                    response = this.dom('<?php echo $this->respondId(); ?>'),
                    input = this.dom('comment-parent'),
                    form = 'form' == response.tagName ? response : response.getElementById('comment-form'),
                    textarea = response.getElementById('textarea');
                if (null == input) {
                    input = this.create('input', {
                        'type' : 'hidden',
                        'name' : 'parent',
                        'id'   : 'comment-parent'
                    });
                    form.appendChild(input);
                }
                input.setAttribute('value', coid);
                if (null == this.dom('comment-form-place-holder')) {
                    var holder = this.create('div', {
                        'id' : 'comment-form-place-holder'
                    });
                    response.parentNode.insertBefore(holder, response);
                }
                comment.appendChild(response);
                this.dom('cancel-comment-reply-link').style.display = '';
                if (null != textarea && 'text' == textarea.name) {
                    textarea.focus();
                }
                return false;
            },
            cancelReply : function () {
                var response = this.dom('<?php echo $this->respondId(); ?>'),
                holder = this.dom('comment-form-place-holder'),
                input = this.dom('comment-parent');
                if (null != input) {
                    input.parentNode.removeChild(input);
                }
                if (null == holder) {
                    return true;
                }
                this.dom('cancel-comment-reply-link').style.display = 'none';
                holder.parentNode.insertBefore(response, holder);
                return false;
            }
        };
    })();
    </script>
    <?php else: ?>
    <h3><?php _e('年代久远，就不要评论了啦。'); ?></h3>
    <?php endif; ?>
</div>
