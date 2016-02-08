<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Поля со звездочкой <span class="required">*</span> являются обязательными для заполнения.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo CHtml::activeTextArea($model,'content',array('rows'=>10, 'cols'=>70)); ?>
<!--		<p class="hint">You may use <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">Markdown syntax</a>.</p>-->
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php $this->widget('CAutoComplete', array(
			'model'=>$model,
			'attribute'=>'tags',
			'url'=>array('suggestTags'),
			'multiple'=>true,
			'htmlOptions'=>array('size'=>50),
		)); ?>
		<p class="hint">Пожалуйста, разделяйте запятыми различные теги.</p>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row pull-1 span-3 box">
		<?php echo $form->labelEx($model,'icon'); ?>
		<?php //  No_photo
		echo $this->post_image($model->id, substr($model->create_time, 0, 4), $model->title, $model->image, '200','small_img left');?>
		<br clear="all">
		<?php //
		/*if(isset($model->image) && file_exists(Yii::getPathOfAlias('webroot').'/images/uploads/'.$model->image))
		{
			echo $form->checkBox($model,'del_img');
			echo $form->labelEx($model,'del_img');
		}*/
		?>
		<br />
		<?php //
		echo CHtml::activeFileField($model, 'icon'); ?>
	</div>

	<div class="row buttons">

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->