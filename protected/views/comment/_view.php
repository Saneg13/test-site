<?php
$deleteJS = <<<DEL
$('.container').on('click','.time a.delete',function() {
	var th=$(this),
		container=th.closest('div.comment'),
		id=container.attr('id').slice(1);
	if(confirm('Are you sure you want to delete comment #'+id+'?')) {
		$.ajax({
			url:th.attr('href'),
			type:'POST'
		}).done(function(){container.slideUp()});
	}
	return false;
});
DEL;
Yii::app()->getClientScript()->registerScript('delete', $deleteJS);
?>
<div class="comment" id="c<?php echo $data->id; ?>">

	<?php echo CHtml::link("#{$data->id}", $data->url, array(
		'class'=>'cid',
		'title'=>'Постоянная ссылка для этого комментария',
	)); ?>

	<div class="author">
		<?php echo $data->authorLink; ?> ответил(а) на
		<?php echo CHtml::link(CHtml::encode($data->post->title), $data->post->url); ?>
	</div>

	<div class="time">
		<?php if($data->status==Comment::STATUS_PENDING): ?>
			<span class="pending">Pending approval</span> |
			<?php echo CHtml::linkButton('Одобрить', array(
				'submit'=>array('comment/approve','id'=>$data->id),
			)); ?> |
		<?php endif; ?>
		<?php echo CHtml::link('Обновить',array('comment/update','id'=>$data->id)); ?> |
		<?php echo CHtml::link('Удалить',array('comment/delete','id'=>$data->id),array('class'=>'delete')); ?> |
		<?php echo date('F j, Y \a\t h:i a',$data->create_time); ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($data->content)); ?>
	</div>

</div><!-- comment -->