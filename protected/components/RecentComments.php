<?php

Yii::import('zii.widgets.CPortlet');

class RecentComments extends CPortlet
{
	public $title='Свежие комментарии';
    //sets the maximum number of comments in widget
	public $maxComments=10;

	public function getRecentComments()
	{
		return Comment::model()->findRecentComments($this->maxComments);
	}

	protected function renderContent()
	{
		$this->render('recentComments');
	}
}