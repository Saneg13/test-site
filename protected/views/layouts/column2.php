<?php $this->beginContent('/layouts/main'); ?>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css">
		<style type="text/css">
			div.sortable {
				background-color: lightgrey;
				padding: 2px;
			}
		</style>
		<script type="text/javascript">
			$(function() {
				$('#sidebar').sortable();
			});
		</script>
	</head>
<div class="container">
	<div class="span-18">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-6 last">
		<div id="sidebar">
<!--            sidebar title-->
		<h3>DRAGGABLE WIDGETS</h3>

			<?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu', array(
				'htmlOptions'=>array('class'=>'sortable'),
				)); ?>

			<?php $this->widget('TagCloud', array(
				'maxTags'=>Yii::app()->params['tagCloudCount'],
				'htmlOptions'=>array('class'=>'sortable'),
			)); ?>

			<?php
            //adds widgets
            //these widgets for guest only
			if(Yii::app()->user->isGuest)
			{
				$this->widget('Convey', array(
					'title'=>'Перевести',
					'htmlOptions'=>array('class'=>'sortable'),
				));
				$this->widget('Social', array(
					'title'=>'Соц. сети',
					'htmlOptions'=>array('class'=>'sortable'),
				));
				$this->widget('Skype', array(
					'htmlOptions'=>array('class'=>'sortable'),
				));
				$this->widget('Weather', array(
					'title'=>'Погода',
					'htmlOptions'=>array('class'=>'sortable'),
				));
			}?>

			<?php $this->widget('Calendar', array(
				'title'=>'Календарь',
				'htmlOptions'=>array('class'=>'sortable'),
				)); ?>

			<?php $this->widget('RecentComments', array(
				'maxComments'=>Yii::app()->params['recentCommentCount'],
				'htmlOptions'=>array('class'=>'sortable'),
			)); ?>

		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>