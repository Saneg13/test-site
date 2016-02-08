<?php
/**
 * Created by PhpStorm.
 * User: Saneg13
 * Date: 02.02.2016
 * Time: 11:16
 */
class Social extends CPortlet
{
    //sets title in widget
    public $title = 'Social';

    //adds social buttons script in widget
    protected function renderContent()
    {
        ?>

        <script type="text/javascript">(function() {
                if (window.pluso)if (typeof window.pluso.start == "function") return;
                if (window.ifpluso==undefined) { window.ifpluso = 1;
                    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                    var h=d[g]('body')[0];
                    h.appendChild(s);
                }})();</script>

       <?php echo '<div class="pluso" data-background="transparent" data-options="small,square,multiline,horizontal,counter,theme=03"
     data-services="google,facebook,twitter,linkedin,vkontakte,odnoklassniki,moimir,email"></div>';
    }
}