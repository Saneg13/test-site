<?php
$this->breadcrumbs=array(
	$model->title,
);
$this->pageTitle=$model->title;
?>
<?php //echo $this->post_image($model->id, substr($model->create_time, 0, 4), $model->title, $model->image, '250','small_img left');?>

<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?>

<div id="comments">
	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo $model->commentCount>1 ? $model->commentCount . ' комментариев' : 'Один комментарий'; ?>
		</h3>

		<?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>

	<h3>Оставить комментарий</h3>

	<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/comment/_form',array(
			'model'=>$comment,
		)); ?>
	<?php endif; ?>

</div><!-- comments -->
