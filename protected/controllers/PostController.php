<?php

class PostController extends Controller
{
	public $layout='column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('index','slider','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}



	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$post=$this->loadModel();
		$comment=$this->newComment($post);

		$this->render('view',array(
			'model'=>$post,
			'comment'=>$comment,
		));
	}

	/**
	 * Creates a new model with image activeField.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Post;
		if(isset($_POST['Post']))
		{
			//$prefix = $model->id;
			$model->attributes=$_POST['Post'];
			$prefix = rand(0,99); // generate random number between 0-99
			$uploadedFile=CUploadedFile::getInstance($model,'icon');
			$sourcePath = Yii::app()->basePath.'/../images/uploads/'; //
			$fileName = "{$prefix}-{$uploadedFile}";
			$model->image = $fileName;

			if($model->save())
            {
                $uploadedFile->saveAs($sourcePath.$fileName);  // image will uploads to rootDirectory/images/uploads/
				$model->icon = $fileName;
                $this->redirect(array('admin'));
            }
				//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			$prefix = rand(0,99); // generate random number between 0-99

			$uploadedFile=CUploadedFile::getInstance($model,'icon');
			$sourcePath = Yii::app()->basePath.'/../images/uploads/';
			$fileName = "{$prefix}-{$uploadedFile}";
			$model->image = $fileName;

			if($model->save())
			{
                /*
                 * uncomment this field for the activate checkbox for remove image
                 * */
				/*if($model->del_img)
				{
					if(file_exists(Yii::getPathOfAlias('webroot').'/images/uploads/'.$model->image))
					{
						unlink(Yii::getPathOfAlias('webroot').'/images/uploads/'.$model->image);
					}
				}*/

				$uploadedFile->saveAs($sourcePath.$fileName);  // image will upload to rootDirectory/images/uploads/
				$model->icon = $fileName;
			}
				$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$model=$this->loadModel();
			// we only allow deletion via POST request

			unlink(Yii::getPathOfAlias('webroot').'/images/uploads/'.$model->image);
			$model->image = '';
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Неверный запрос. Пожалуйста, не повторяйте больше этот запрос.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria(array(
			'condition'=>'status='.Post::STATUS_PUBLISHED,
			'order'=>'update_time DESC',
			'with'=>'commentCount',
		));
		if(isset($_GET['tag']))
			$criteria->addSearchCondition('tags',$_GET['tag']);

		$dataProvider=new CActiveDataProvider('Post', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Post('search');
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionSlider()
    {
        $this->layout='column1';
        $infoList = Post::model()->findAll();

        $this->render('slider', array('list' => $infoList));
    }

	/**
	 * Suggests tags based on the current user input.
	 * This is called via AJAX when the user is entering the tags input.
	 */
	public function actionSuggestTags()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$tags=Tag::model()->suggestTags($keyword);
			if($tags!==array())
				echo implode("\n",$tags);
		}
	}

	/**
	 * @param $id
	 * @param $create_year
	 * @param $title
	 * @param $image
	 * @param string $width
	 * @param string $class
	 * @return mixed
	 */

	public function post_image($id, $create_year, $title, $image, $width='100', $class='post_img')
	{
        //sets default image, if image-file not exist in directory
		$def_image = 'no_image_available.png';
		if(isset($image) && file_exists(Yii::getPathOfAlias('webroot').'/images/uploads/'.$image))
			return CHtml::image(Yii::app()->getBaseUrl(true).'/images/uploads/'.$image, $title,
				array(
					'width'=>$width,
					'class'=>$class,
				));
		else
			return CHtml::image(Yii::app()->getBaseUrl(true).'/images/'.$def_image,'удалить изображение',
				array(
					'width'=>$width,
					'class'=>$class
				));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				if(Yii::app()->user->isGuest)
					$condition='status='.Post::STATUS_PUBLISHED.' OR status='.Post::STATUS_ARCHIVED;
				else
					$condition='';
				$this->_model=Post::model()->findByPk($_GET['id'], $condition);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Creates a new comment.
	 * This method attempts to create a new comment based on the user input.
	 * If the comment is successfully created, the browser will be redirected
	 * to show the created comment.
	 * @param Post the post that the new comment belongs to
	 * @return Comment the comment instance
	 */
	protected function newComment($post)
	{
		$comment=new Comment;
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($post->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Спасибо за Ваш комментарий. Ваш комментарий будет опубликован после процедуры одобрения =).');
				$this->refresh();
			}
		}
		return $comment;
	}
}
