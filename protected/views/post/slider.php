<?php
$this->pageTitle=Yii::app()->name . ' - Slider';
$this->breadcrumbs=array(
	'Slider',
);
//adds slider settings
$autoplay = true;
$bgincrement = 450;
?>
<header>
    <br/>
<!--    slider title-->
    <h1>Dynamic parallax slider with Yii</h1>

</header>
<div id="da-slider" class="da-slider">
    <?php foreach ($list as $value) {
        echo '<div class="da-slide">';
        echo '<h2>'.$value->title.'</h2>';
        echo '<p>'.$value->content.'</p>';
        echo CHtml::link('Read more', array('post/'.$value->id.'/'.$value->title), array('class' => 'da-link'));
        echo $this->post_image($value->id, substr($value->create_time, 0, 4), $value->title, $value->image, '300','da-img');
        echo CHtml::image(Yii::app()->request->baseUrl.$value->image,'',
            array(
                'width'=>'240px',
                //'height'=>'420px',
                'title'=>$value->title,
                'class'=>'da-img'
            ));
        echo '</div>';
    } ?>

    <nav class="da-arrows">
        <span class="da-arrows-prev"></span>
        <span class="da-arrows-next"></span>
    </nav>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/slider/jquery.cslider.js"></script>
<!--starts slider script-->
<script type="text/javascript">
    $(function() {

        $('#da-slider').cslider({
            autoplay	: '<?php echo $autoplay; ?>',
            bgincrement	: '<?php echo $bgincrement; ?>'
        });

    });
</script>
