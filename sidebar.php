<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

	<div id="disk" class="sidebar">
		<ul class="tag-list">
			<li><span class="icon-disk"></span>(C:)
        		<ul>
        		    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                    <?php while ($category->next()): ?>
                    <li><a href="<?php $category->permalink(); ?>"><span class="icon-folder"></span><?php $category->name(); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </li>
		</ul>
		<br>
		<ul class="tag-list">
		    <li><span class="icon-folder"></span>最新评论
    		    <ul>
                    <?php $this->widget('Widget_Comments_Recent', 'pageSize=10')->to($comments); ?>
                    <?php while($comments->next()): ?>
                        <li><a href="<?php $comments->permalink(); ?>" title="<?php $comments->dateWord() ?> 在 <?php $comments->title() ?> 留言"><?php $comments->gravatar() ?> <?php $comments->excerpt(20, '...'); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </li>
        </ul>
		<br>
        <!--友情链接-->
        <?php if ($this->options->links) { ?>
		<ul class="tag-list">
		    <li><span class="icon-folder"></span>友情链接
    		    <ul class="links" data-no-instant>
    		        <?php
                    	$array = explode(PHP_EOL,$this->options->links);
                        foreach (explode(PHP_EOL,$this->options->links) as $value) {
                            $link = trim($value);
                            $link = explode("<=>",$link);
                    ?>
                    <li><a href="<?php echo $link[1] ?>" target="_blank" title="<?php echo $link[0] ?>"><span class="icon-internet"></span><?php echo $link[0] ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
        <?php } ?>
    </div>
    