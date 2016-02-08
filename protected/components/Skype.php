<?php
/**
 * Created by PhpStorm.
 * User: Saneg13
 * Date: 01.02.2016
 * Time: 18:18
 */
class Skype extends CPortlet
{
    //sets title in widget
    public $title='Skype';
    //adds skype script in widget
    protected function renderContent()
    {
        echo '<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
                <div id="SkypeButton_Call_saneg_lu_1">
                <script type="text/javascript">
                    Skype.ui({
                    "name": "dropdown",
                    "element": "SkypeButton_Call_saneg_lu_1",
                    "participants": ["saneg_lu"],
                    //"imageColor": "white"
                    "imageSize": 24,
                    });
                </script>
                </div>
        ';
    }
}


