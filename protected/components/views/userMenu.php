<ul>
	<li><?php echo CHtml::link('Создать статью',array('post/create')); ?></li>
	<li><?php echo CHtml::link('Управление статьями',array('post/admin')); ?></li>
	<li><?php echo CHtml::link('Одобрить комментарии',array('comment/index')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
	<li><?php echo CHtml::link('Выйти',array('site/logout')); ?></li>
</ul>