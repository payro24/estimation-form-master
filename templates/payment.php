<?php
if ( ! defined( "ABSPATH" ) ) {
	exit;
}

$site_url = get_home_url();
$payro24_payment = "<div style=\'display: flex;justify-content: center\'><div class=\'bank_paymnt\' title=\'payro24\' style=\'margin: 5px 5px;cursor: pointer;ppadding: 5px; background: #eee; border-radius: 5px; border: 4px solid #ddd; width: 150px; position: relative; padding: 15px 0;\'><img width=\'150\' style=\'margin: auto;\' src=\'$site_url/wp-content/plugins/payro24-wp-estimation-form/assets/logo.svg\'><h3 style=\'font-size: 13px; margin: 5px 0;\'>درگاه پیرو</h3></div></div>";
$style = file_get_contents( payro24_WPEFC_PLUGIN_PATH . 'templates/result_style.html');
?>

<script>
    jQuery(document).ready(function ($) {
        let baseUrl = '<?php echo $site_url ?>';
        let paymentRedirect;
        let paymentLoader = function() {
            if($('#lfb_bootstraped').length){
                let email = $('#lfb_bootstraped input[name=email]').val();
                let curentPrice = $('.progress-bar-price span').text().match(/\d+/);

                if($('#finalText').css('display') != 'none' && curentPrice != 0 && email != ''){
                    paymentRedirect = 1;
                    doPayment();
                }
            }
            setTimeout(function () {
                if(!paymentRedirect)
                    paymentLoader();
            },500)
        }
        paymentLoader();

        function doPayment() {
            let email = $('#lfb_bootstraped input[name=email]').val();
            $('body').prepend('<?php echo $style?><div id=\"wpefgmsg\"><div> <div class=\"wpefgmsgclose\" onClick=\"wpefgmsgclose();\">X</div> <h1 style=\"margin: -20px 0 0 0;\"> پرداخت امن با پیرو</h1><p style=\"color: #777; margin-bottom: 10px;\">درگاه پرداخت کلیه کارت های عضو شبکه شتاب</p> <?php echo $payro24_payment ?> <a style=\"background: #03A9F4; color: #fff; border-radius: 5px; width: 80%; display: block; margin: 0 auto; margin-top: 21px; line-height: 35px; margin-bottom: -10px; font-size: 14px;\" href=\"'+baseUrl+'/?wpef_payro24=pay&email='+email+'\">پرداخت</a></div></div>');
            setTimeout(function() {
                $('.bank_paymnt').click(function() {
                    $('.bank_paymnt').css({'border': '4px solid #ccc'});
                    $(this).css({'border': '4px solid #03A9F4'});
                    $('#wpefgmsg a').attr('href',baseUrl+'/?wpef_payro24=pay&email='+email+'&payment='+$(this).attr('title'));
                });

                $('.wpefgmsgclose').click(function() {
                    $('#wpefgmsg').fadeOut(500);
                })
            },50)
        }
    })
</script>";