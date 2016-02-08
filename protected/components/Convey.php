<?php
/**
 * Created by PhpStorm.
 * User: Saneg13
 * Date: 01.02.2016
 * Time: 18:18
 */
class Convey extends CPortlet
{
    //sets title in widget
    public $title='Convey';

    //adds convey script in widget
    protected function renderContent()
    {
        echo '<span class="conveythis notranslate" translate="no"><a href="http://translation-services-usa.com/interpreting_phone.php"
                                                       title="phone interpreting"
                                                       class="conveythis-image conveythis-drop translate2">phone interpreting</a></span>
            <script src="http://s1.conveythis.com/e4/javascript/e.js?conveythis_src=ru&conveythis_id="></script>';
    }
}