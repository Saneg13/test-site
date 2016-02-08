<?php
/**
 * Created by PhpStorm.
 * User: Saneg13
 * Date: 01.02.2016
 * Time: 18:18
 */
class Weather extends CPortlet
{
    //sets title in widget
    public $title='Weather';

    protected function renderContent()
    {
        //alternative code widget of weather
        //echo '<a target="_blank" href="http://weather.redtram.com/ru/"><image src="http://weather.redtram.com/informers/ru/1/"/></a>';
?>
<!--        main code widget of weather-->
        <div style="height: 212px; position: relative;">
            <iframe onload="document.getElementById('pogodnik.com.img').style.display='none';"
                    src="http://ad.pltn.net/widget2.php" width="200" height="180" frameborder="0" allowtransparency="true"
                    scrolling="no"></iframe>
            <div id="ow-widget-footer"><a href="http://pogodnik.com" title="Pogodnik.com"
                                          style="position: absolute;top: 0px;left: 0px;"><img
                        src="http://pogodnik.com/images/prognoz-pogody-200x240.png"
                        style="position: absolute;top: 0px;left: 0px;" id="pogodnik.com.img"
                        alt="&#1057;&#1077;&#1088;&#1074;&#1080;&#1089; &#1087;&#1086;&#1075;&#1086;&#1076;&#1099; Pogodnik.com"></a>
                <a href="#" onclick="PopUpShow();return false;"><span>&#1055;&#1088;&#1086;&#1075;&#1085;&#1086;&#1079; &#1085;&#1072; 14 &#1076;&#1085;&#1077;&#1081;</span>
                </a></div>
            <script src="http://ad.pltn.net/assets/js/front.js"></script>
            <div class="ow-widget-b-popup" id="ow-widget-popup">
                <div class="ow-widget-b-popup-content"><a href="#" class="ow-widget-close"
                                                          onClick="PopUpHide();return false;"></a>

                    <div id="ow-widget-inner-popup-content-front"></div>
                </div>
            </div>
        </div>
<?php
    }
}
?>
<!--<iframe width="200" height="240" frameborder="0" scrolling="no" src="http://ad.pogodnik.com">Посмотреть прогноз погоды-->
<!--    на <a href="http://pogodnik.com/"><img src="http://pogodnik.com/images/prognoz-pogody-200x240.png"> </a></iframe>-->



