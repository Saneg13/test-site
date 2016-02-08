<?php
/**
 * Created by PhpStorm.
 * User: Saneg13
 * Date: 01.02.2016
 * Time: 18:02
 */
class Calendar extends CPortlet
{
    //sets title in widget
    public $title='Calendar';

    protected function renderContent()
    {
        //adds calendar script in widget
        echo '<iframe
                src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=250&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=johnny13.lu%40gmail.com&amp;color=%2329527A&amp;ctz=Europe%2FKiev"
                style="border-width:0" width="200" height="250" frameborder="0" scrolling="no">
             </iframe>';
    }
}
