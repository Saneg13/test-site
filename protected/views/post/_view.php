<div class="post">
	<div class="title"><h2>
		<?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
	</h2></div>
	<div class="author">
		опубликовано пользователем <?php echo $data->author->username . ' в ' . date('F j, Y',$data->create_time); ?>
	</div>
	<div class="content">
		<?php echo $this->post_image($data->id, substr($data->create_time, 0, 4), $data->title, $data->image, '300','small_img left');?>
		<?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
			echo $data->content;
			$this->endWidget();
		?>
	</div>
	<div class="nav">
		<b>Tags:</b>
		<?php echo implode(', ', $data->tagLinks); ?>
		<br/>
		<?php echo CHtml::link('Постоянная ссылка', $data->url); ?> |
		<?php echo CHtml::link("Комментариев ({$data->commentCount})",$data->url.'#comments'); ?> |
		Последнее обновление: <?php echo date('F j, Y',$data->update_time); ?>
	</div>
</div>
