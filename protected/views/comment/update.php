<?php
$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	'Обновить комментарий #'.$model->id,
);
?>

<h1>Обновить комментарий #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>