<!doctype html><html lang="en-US">
<?php 
	session_start();

	include("connection1.php");

	if(isset($_SESSION['order']) && $_SESSION['order']!="")
	{
		echo $_SESSION['order'];
		unset($_SESSION['order']);
	}
	
?>

<!-- Mirrored from demos.casethemes.net/beautyzone/demo/shop/?sidebar-shop=left by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Jan 2019 08:18:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="profile" href="http://gmpg.org/xfn/11"> <script>document.documentElement.className = document.documentElement.className + ' yes-js js_active js'</script><title>Shop &#8211; Salon 360 ERP</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css" media="screen">#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td a.ui-state-active,#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td a.ui-state-active:hover,body #booked-profile-page input[type=submit].button-primary:hover,body .booked-list-view button.button:hover,body .booked-list-view input[type=submit].button-primary:hover,body table.booked-calendar input[type=submit].button-primary:hover,body .booked-modal input[type=submit].button-primary:hover,body table.booked-calendar th,body table.booked-calendar thead,body table.booked-calendar thead th,body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover,body #booked-profile-page .booked-profile-header,body #booked-profile-page .booked-tabs li.active a,body #booked-profile-page .booked-tabs li.active a:hover,body #booked-profile-page .appt-block .google-cal-button > a:hover,#ui-datepicker-div.booked_custom_date_picker .ui-datepicker-header{background:!important}body #booked-profile-page input[type=submit].button-primary:hover,body table.booked-calendar input[type=submit].button-primary:hover,body .booked-list-view button.button:hover,body .booked-list-view input[type=submit].button-primary:hover,body .booked-modal input[type=submit].button-primary:hover,body table.booked-calendar th,body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover,body #booked-profile-page .booked-profile-header,body #booked-profile-page .appt-block .google-cal-button > a:hover{border-color:!important}body table.booked-calendar tr.days,body table.booked-calendar tr.days th,body .booked-calendarSwitcher.calendar,body #booked-profile-page .booked-tabs,#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead,#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead th{background:!important}body table.booked-calendar tr.days th,body #booked-profile-page .booked-tabs{border-color:!important}#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td.ui-datepicker-today a,#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td.ui-datepicker-today a:hover,body #booked-profile-page input[type=submit].button-primary,body table.booked-calendar input[type=submit].button-primary,body .booked-list-view button.button,body .booked-list-view input[type=submit].button-primary,body .booked-list-view button.button,body .booked-list-view input[type=submit].button-primary,body .booked-modal input[type=submit].button-primary,body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button,body #booked-profile-page .booked-profile-appt-list .appt-block.approved .status-block,body #booked-profile-page .appt-block .google-cal-button > a,body .booked-modal p.booked-title-bar,body table.booked-calendar td:hover .date span,body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active,body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active:hover,.booked-ms-modal .booked-book-appt{background:}body #booked-profile-page input[type=submit].button-primary,body table.booked-calendar input[type=submit].button-primary,body .booked-list-view button.button,body .booked-list-view input[type=submit].button-primary,body .booked-list-view button.button,body .booked-list-view input[type=submit].button-primary,body .booked-modal input[type=submit].button-primary,body #booked-profile-page .appt-block .google-cal-button > a,body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button,body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active,body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active:hover{border-color:}body .booked-modal .bm-window p i.fa,body .booked-modal .bm-window a,body .booked-appt-list .booked-public-appointment-title,body .booked-modal .bm-window p.appointment-title,.booked-ms-modal.visible:hover .booked-book-appt{color:}.booked-appt-list .timeslot.has-title .booked-public-appointment-title{color:inherit}</style><style>.wishlist_table .add_to_cart,a.add_to_wishlist.button.alt{border-radius:16px;-moz-border-radius:16px;-webkit-border-radius:16px}</style><link rel='dns-prefetch' href='http://fonts.googleapis.com/' /><link rel='dns-prefetch' href='http://s.w.org/' /><link rel="alternate" type="application/rss+xml" title="BeautyZone &raquo; Feed" href="../feed/index.html" /><link rel="alternate" type="application/rss+xml" title="BeautyZone &raquo; Comments Feed" href="../comments/feed/index.html" /><link rel="alternate" type="application/rss+xml" title="BeautyZone &raquo; Products Feed" href="feed/index.html" /><script type="text/javascript">window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.9.9"}};!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);</script><style type="text/css">img.wp-smiley,img.emoji{display:inline !important;border:none !important;box-shadow:none !important;height:1em !important;width:1em !important;margin:0 .07em !important;vertical-align:-0.1em !important;background:none !important;padding:0 !important}</style><link rel='stylesheet' id='booked-icons-css' href='../wp-content/plugins/booked/assets/css/icons77e6.css?ver=2.2.1' type='text/css' media='all' /><link rel='stylesheet' id='booked-tooltipster-css' href='../wp-content/plugins/booked/assets/js/tooltipster/css/tooltipster9b70.css?ver=3.3.0' type='text/css' media='all' /><link rel='stylesheet' id='booked-tooltipster-theme-css' href='../wp-content/plugins/booked/assets/js/tooltipster/css/themes/tooltipster-light9b70.css?ver=3.3.0' type='text/css' media='all' /><link rel='stylesheet' id='booked-animations-css' href='../wp-content/plugins/booked/assets/css/animations77e6.css?ver=2.2.1' type='text/css' media='all' /><link rel='stylesheet' id='booked-styles-css' href='../wp-content/plugins/booked/assets/css/styles77e6.css?ver=2.2.1' type='text/css' media='all' /><link rel='stylesheet' id='booked-responsive-css' href='../wp-content/plugins/booked/assets/css/responsive77e6.css?ver=2.2.1' type='text/css' media='all' /><link rel='stylesheet' id='contact-form-7-css' href='../wp-content/plugins/contact-form-7/includes/css/styles1748.css?ver=5.0.5' type='text/css' media='all' /><link rel='stylesheet' id='cms-plugin-stylesheet-css' href='../wp-content/plugins/ctcore/assets/css/cms-styled87f.css?ver=4.9.9' type='text/css' media='all' /><link property="stylesheet" rel='stylesheet' id='owl-carousel-css' href='../wp-content/plugins/ctcore/assets/css/owl.carousel.mind87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='remodal-css' href='../wp-content/plugins/ctuser/acess/css/remodald87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='remodal-default-theme-css' href='../wp-content/plugins/ctuser/acess/css/remodal-default-themed87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='up.social.icons-css' href='../wp-content/plugins/ctuser/acess/css/socicond87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='rs-plugin-settings-css' href='../wp-content/plugins/revslider/public/assets/css/settings23da.css?ver=5.4.8' type='text/css' media='all' /><style id='rs-plugin-settings-inline-css' type='text/css'>#rs-demo-id{}</style><link rel='stylesheet' id='woocommerce-layout-css' href='../wp-content/plugins/woocommerce/assets/css/woocommerce-layout9d52.css?ver=3.5.1' type='text/css' media='all' /><link rel='stylesheet' id='woocommerce-smallscreen-css' href='../wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen9d52.css?ver=3.5.1' type='text/css' media='only screen and (max-width: 768px)' /><link rel='stylesheet' id='woocommerce-general-css' href='../wp-content/plugins/woocommerce/assets/css/woocommerce9d52.css?ver=3.5.1' type='text/css' media='all' /><style id='woocommerce-inline-inline-css' type='text/css'>.woocommerce form .form-row .required{visibility:visible}</style><link rel='stylesheet' id='booked-fea-styles-css' href='../wp-content/plugins/booked-frontend-agents/css/styles77e6.css?ver=2.2.1' type='text/css' media='all' /><link rel='stylesheet' id='yith-quick-view-css' href='../wp-content/plugins/yith-woocommerce-quick-view/assets/css/yith-quick-viewd87f.css?ver=4.9.9' type='text/css' media='all' /><style id='yith-quick-view-inline-css' type='text/css'>#yith-quick-view-modal .yith-wcqv-main{background:#ffffff}#yith-quick-view-close{color:#cdcdcd}#yith-quick-view-close:hover{color:#ff0000}</style><link rel='stylesheet' id='woocommerce_prettyPhoto_css-css' href='../wp-content/plugins/woocommerce/assets/css/prettyPhoto9d52.css?ver=3.5.1' type='text/css' media='all' /><link rel='stylesheet' id='jquery-selectBox-css' href='../wp-content/plugins/yith-woocommerce-wishlist/assets/css/jquery.selectBox7359.css?ver=1.2.0' type='text/css' media='all' /><link rel='stylesheet' id='yith-wcwl-main-css' href='../wp-content/plugins/yith-woocommerce-wishlist/assets/css/style5bf8.css?ver=2.2.5' type='text/css' media='all' /><link rel='stylesheet' id='yith-wcwl-font-awesome-css' href='../wp-content/plugins/yith-woocommerce-wishlist/assets/css/font-awesome.min1849.css?ver=4.7.0' type='text/css' media='all' /><link rel='stylesheet' id='woo-variation-swatches-css' href='../wp-content/plugins/woo-variation-swatches/assets/css/frontend.minfa41.css?ver=1.0.48' type='text/css' media='all' /><style id='woo-variation-swatches-inline-css' type='text/css'> .variable-item:not(.radio-variable-item){width:30px;height:30px}.woo-variation-swatches-style-squared .button-variable-item{min-width:30px}.button-variable-item span{font-size:16px}</style><link rel='stylesheet' id='woo-variation-swatches-theme-override-css' href='../wp-content/plugins/woo-variation-swatches/assets/css/wvs-theme-override.minfa41.css?ver=1.0.48' type='text/css' media='all' /><link rel='stylesheet' id='woo-variation-swatches-tooltip-css' href='../wp-content/plugins/woo-variation-swatches/assets/css/frontend-tooltip.minfa41.css?ver=1.0.48' type='text/css' media='all' /><link rel='stylesheet' id='bootstrap-css' href='../wp-content/themes/beautyzone/assets/css/bootstrap.mincce7.css?ver=4.0.0' type='text/css' media='all' /><link rel='stylesheet' id='font-awesome-css' href='../wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min24b2.css?ver=5.5.5' type='text/css' media='all' /><style id='font-awesome-inline-css' type='text/css'>[data-font="FontAwesome"]:before{font-family:'FontAwesome' !important;content:attr(data-icon) !important;speak:none !important;font-weight:normal !important;font-variant:normal !important;text-transform:none !important;line-height:1 !important;font-style:normal !important;-webkit-font-smoothing:antialiased !important;-moz-osx-font-smoothing:grayscale !important}</style><link rel='stylesheet' id='font-material-icon-css' href='../wp-content/themes/beautyzone/assets/css/material-design-iconic-font.min3601.css?ver=2.2.0' type='text/css' media='all' /><link rel='stylesheet' id='flaticon-css' href='../wp-content/themes/beautyzone/assets/css/flaticon8a54.css?ver=1.0.0' type='text/css' media='all' /><link rel='stylesheet' id='themify-icons-css' href='../wp-content/themes/beautyzone/assets/css/themify-icons8a54.css?ver=1.0.0' type='text/css' media='all' /><link rel='stylesheet' id='font-etline-icon-css' href='../wp-content/themes/beautyzone/assets/css/et-line8a54.css?ver=1.0.0' type='text/css' media='all' /><link rel='stylesheet' id='magnific-popup-css' href='../wp-content/themes/beautyzone/assets/css/magnific-popup8a54.css?ver=1.0.0' type='text/css' media='all' /><link rel='stylesheet' id='beautyzone-theme-css' href='../wp-content/themes/beautyzone/assets/css/theme20b9.css?ver=1.0.2' type='text/css' media='all' /><style id='beautyzone-theme-inline-css' type='text/css'>.single-post .content-area .entry-content p{text-align:justify}</style><link rel='stylesheet' id='beautyzone-menu-css' href='../wp-content/themes/beautyzone/assets/css/menu20b9.css?ver=1.0.2' type='text/css' media='all' /><link rel='stylesheet' id='beautyzone-style-css' href='../wp-content/themes/beautyzone/styled87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='beautyzone-google-fonts-css' href='https://fonts.googleapis.com/css?family=Lato%3A100%2C100i%2C300%2C300i%2C400%2C400i%2C700%2C700i%2C900%2C900i%7CMontserrat%3A400%2C500%2C700%7CPoppins%3A400%2C500%2C600%2C700%7CNunito%3A400%2C600%2C700%2C800&amp;subset=latin%2Clatin-ext&amp;ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='booked-wc-fe-styles-css' href='../wp-content/plugins/booked-woocommerce-payments/css/frontend-styled87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='newsletter-css' href='../wp-content/plugins/newsletter/stylefcc2.css?ver=5.7.9' type='text/css' media='all' /><script type='text/javascript' src='../wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script><script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script><script type='text/javascript' src='../wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min23da.js?ver=5.4.8'></script><script type='text/javascript' src='../wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min23da.js?ver=5.4.8'></script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script><script type='text/javascript'>
var wc_add_to_cart_params = {"ajax_url":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/beautyzone\/demo\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
</script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min9d52.js?ver=3.5.1'></script><script type='text/javascript' src='../wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart24b2.js?ver=5.5.5'></script><script type='text/javascript'>
var booked_wc_variables = {"prefix":"booked_wc_","ajaxurl":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","i18n_confirm_appt_edit":"Are you sure you want to change the appointment date? By doing so, the appointment date will need to be approved again.","i18n_pay":"Are you sure you want to add the appointment to cart and go to checkout?","i18n_mark_paid":"Are you sure you want to mark this appointment as \"Paid\"?","i18n_paid":"Paid","i18n_awaiting_payment":"Awaiting Payment","checkout_page":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/checkout\/"};
</script><script type='text/javascript' src='../wp-content/plugins/booked-woocommerce-payments/js/frontend-functionsd87f.js?ver=4.9.9'></script><link rel='https://api.w.org/' href='../wp-json/index.html' /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db0.php?rsd" /><link rel="wlwmanifest" type="application/wlwmanifest+xml" href="../wp-includes/wlwmanifest.xml" /> <meta name="generator" content="WordPress 4.9.9" /><meta name="generator" content="WooCommerce 3.5.1" /><link rel="icon" type="image/png" href="../wp-content/themes/beautyzone/assets/images/favicon.ico"/><noscript><style>.woocommerce-product-gallery{opacity:1 !important}</style></noscript><meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress."/><!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="http://demos.casethemes.net/beautyzone/demo/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]--><meta name="generator" content="Powered by Slider Revolution 5.4.8 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." /><script type="text/javascript">function setREVStartSize(e){try{ e.c=jQuery(e.c);var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
}catch(d){console.log("Failure at Presize of Slider:"+d)}};</script><style type="text/css" title="dynamic-css" class="options-output">.site-footer .top-footer{background-position:center top}a{color:#ff5ea5}a:hover{color:#e54d90}a:active{color:#e54d90}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible{opacity:1}</style></noscript></head><body class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page woocommerce-no-js woo-variation-swatches woo-variation-swatches-theme-beautyzone woo-variation-swatches-theme-child-beautyzone woo-variation-swatches-style-rounded woo-variation-swatches-attribute-behavior-blur woo-variation-swatches-tooltip-enabled woo-variation-swatches-stylesheet-enabled reduxon hfeed body-default-font heading-default-font visual-composer header-sticky wpb-js-composer js-comp-ver-5.5.5 vc_responsive"><div id="page" class="site"> <div id="ct-loadding" class="ct-loader style1"> <div class="loading-default"></div> </div> 

<!--header start-->

<header id="masthead" class="header-main"> <div id="header-wrap" class="header-layout1 fixed-height is-sticky"> <div id="header-top-bar"> <div class="container"> <div class="row"> <ul class="top-bar-contact"> <li><a href="tel:91 12345 67890"><i class="fa fa-phone"></i>+91 12345 67890</a></li> <li><a href="http://maps.google.com/?q=Surat, Gujarat, India" target="_blank"><i class="fa fa-map-marker"></i>Surat, Gujarat, India</a></li> </ul> 


<?php 

	if(!isset($_SESSION['uid']))
	{

?>

<div class="top-bar-social"><a href="../login/index.php" >Login</a><a href="../register/index.php" >Register Now</a></div>
<?php
	
	}
?>
<div class="site-menu-right"> <div class="menu-right-item menu-cart"> <span class="h-btn-cart"><i class="fa fa-shopping-cart"></i></span> 

<?php

	if(isset($_SESSION['cart']) && $_SESSION['cart']!="")
	{
		$cnt = count($_SESSION['cart']);
?>

<div class="widget_shopping_cart"> <div class="widget_shopping_title"> Shopping Cart <span class="cart-couter-items">(<?php echo $cnt; ?> items)</span> </div> <div class="widget_shopping_cart_content"> <p class="woocommerce-mini-cart__empty-message">
<?php

	$j=1;

	for($i=0;$i<$cnt;$i++)
	{
		echo $j.". ";
		echo $_SESSION['cart'][$i]['name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '&#8377;'.$_SESSION['cart'][$i]['price']."<br>";
		
		$j=$j+1;
	}

?>
</p> </div> </div>

<?php
	
	}

?>

</div> </div> </div> </div> </div> <div id="header-main" class="header-main"> <div class="container"> <div class="row"> <div class="header-navigation"> <div class="main-navigation"> <div class="main-navigation-inner"> <div class="menu-mobile-close"><i class="zmdi zmdi-close"></i></div> <div class="header-branding mobile"> <a class="logo-dark" href="../index.html" title="BeautyZone" rel="home"><img src="../wp-content/themes/beautyzone/assets/images/logo.png" alt="Logo Dark"/></a><a class="logo-light" href="../index.html" title="BeautyZone" rel="home"><img src="../wp-content/themes/beautyzone/assets/images/logo-light.png" alt="Logo Light"/></a> </div> 

<div class="header-menu-left"> <ul id="menu-left" class="primary-menu"><li id="menu-item-57" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-57"><a href="../index.php" class="no-one-page">Home</a></li>

<li id="menu-item-58" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  menu-item-58"><a href="#" class="no-one-page">Pages</a><ul class="sub-menu"><li id="menu-item-42" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42"><a href="../booking/appointment/index.php" class="no-one-page">Booking</a></li><li id="menu-item-49" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49"><a href="../our-team/index.php" class="no-one-page">Our Team</a></li><li id="menu-item-47" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-47 "><a href="../login/index.php" class="no-one-page">Login</a></li><li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53"><a href="../register/index.php" class="no-one-page">Register</a></li></ul></li>

<li id="menu-item-59" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-has-children menu-item-59"><a href="#" class="no-one-page">Our Services</a><ul class="sub-menu"><li id="menu-item-55" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-26  menu-item-55"><a href="../services/index.php" class="no-one-page">Services</a></li><li id="menu-item-229" class="menu-item menu-item-type-post_type menu-item-object-service menu-item-229"><a href="../service/haircut-styling/index.php" class="no-one-page">Services Details</a></li></ul></li></ul> </div> 

<div class="header-branding desktop"> <a class="logo-dark" href="../index.php" title="Salon 360 ERP" rel="home"><img src="../logo.png" alt="Salon 360 ERP"/></a><a class="logo-light" href="../index.php" title="Salon 360 ERP" rel="home"><img src="../wp-content/themes/beautyzone/assets/images/logo.png" alt="Salon 360 ERP"/></a> </div> <div class="header-menu-right"> <ul id="menu-right" class="primary-menu"><li id="menu-item-61" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-61"><a href="../our portfolio/index.php" class="no-one-page">Our Portfolio</a></li>

<li id="menu-item-448" class="menu-item menu-item-type-post_type current-menu-ancestor current-menu-parent menu-item-object-page menu-item-has-children menu-item-448"><a href="#" class="no-one-page">Shopping</a><ul class="sub-menu"><li id="menu-item-481" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-481 current_page_item"><a href="../shop/index.php" class="no-one-page">Shop</a></li><li id="menu-item-458" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-458"><a href="../product/items/index.php" class="no-one-page">Product Details</a></li><li id="menu-item-451" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-451 "><a href="../cart/index.php" class="no-one-page">Cart</a></li><li id="menu-item-450" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-450"><a href="../membership/index.php" class="no-one-page">Membership</a></li></ul></li>

<li id="menu-item-448" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-448"><a href="#" class="no-one-page">My Account</a><ul class="sub-menu"><li id="menu-item-481" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-481"><a href="../my-profile/index.php" class="no-one-page">My Profile</a></li><li id="menu-item-458" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-458"><a href="../change-password/index.php" class="no-one-page">Change Password</a></li><li id="menu-item-489" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-489"><a href="../log-out/index.php" class="no-one-page">Log Out</a></li></ul></li></ul>

</div> </div> </div> </div> <div class="header-branding mobile"> <a class="logo-dark" href="../index.html" title="BeautyZone" rel="home"><img src="../wp-content/themes/beautyzone/assets/images/logo.png" alt="Logo Dark"/></a><a class="logo-light" href="../index.html" title="BeautyZone" rel="home"><img src="../wp-content/themes/beautyzone/assets/images/logo-light.png" alt="Logo Light"/></a> </div> <div class="menu-mobile-overlay"></div> </div> </div> <div id="main-menu-mobile"> <span class="btn-nav-mobile open-menu"> <span></span> </span> </div> </div> </div>

</header>

<!--header end-->

<!--body start-->

<div id="pagetitle" class="page-title bg-overlay"> <div class="container"> <div class="page-title-inner"> <h1 class="page-title">Shop</h1> <ul class="ct-breadcrumb"><li><a class="breadcrumb-entry" href="../index.php">Home</a></li><li><span class="breadcrumb-entry">Shop</span></li></ul> </div> </div></div> 


<div id="content" class="site-content"> <div class="content-inner"> <div class="container content-container"> <div class="row content-row"> 
<?php
	
	if(isset($_SESSION['added']) && $_SESSION['added']!="")
	{
		echo $_SESSION['added'];
		unset($_SESSION['added']);
	}
?>

<div id="primary" class="content-area content-has-sidebar float-right col-xl-8 col-lg-8 col-md-7 col-sm-12"> <main id="main" class="site-main" role="main"> <div class="woocommerce-topbar"><div class="woocommerce-result-count"></div><div class="woocommerce-topbar-ordering">

<form class="woocommerce-ordering" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<input type="text" name="search" style="width:70%" placeholder="Search Product Name" required/>
<button type="submit" name="find"><i class="fa fa-search"></i></button>
</form>

</div></div><div class="woocommerce-notices-wrapper"></div>

<ul class="products columns-4">

<?php	

	if (isset($_GET['pageno'])) 
	{
            $pageno = $_GET['pageno'];
	}

	else 
	{
		$pageno = 1;
	}

	$no_of_records_per_page = 9;
	$offset = ($pageno-1) * $no_of_records_per_page;

	$total_pages_sql = "SELECT COUNT(*) FROM product";
	$result = mysql_query($total_pages_sql);
	$total_rows = mysql_fetch_array($result)[0];
	$total_pages = ceil($total_rows / $no_of_records_per_page);

	if(!isset($_POST['find']))
	{
		
	if(isset($_GET['ptype']))
	{
		// echo $_GET['ptype'];
		
		$query=mysql_query("select * from product where product_type=".$_GET['ptype']." limit $offset, $no_of_records_per_page");
		
		$result=mysql_fetch_array($query);
		
			$id=$result['product_id'];
			
			$query1=mysql_query("select * from product_feedback where product_id=$id LIMIT $offset, $no_of_records_per_page");
		
			$result1=mysql_fetch_array($query1);
		
?>
<li class="post-453 product type-product status-publish has-post-thumbnail product_cat-nails product_cat-skin product_tag-design product_tag-development product_tag-seo product_tag-user-interface product_tag-wordpress first instock shipping-taxable purchasable product-type-simple">
<a href="../product/items/index.php?pid=<?php echo $result['product_id'];?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
<div class="woocommerce-product-inner"><div class="woocommerce-product-header"><a class="woocommerce-product-details" href="../product/items/index.php?pid=<?php echo $result['product_id']; ?>"><img width="545" height="621" src="gallery/<?php echo $result['product_image']; ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>

<div class="woocommerce-product-meta">
<div class="woocommerce-add-to-cart" style="padding-left:20%;"> <a href="../cart/cart_process1.php?pid=<?php echo $id; ?>" class="button product_type_simple add_to_cart_button" data-product_sku="" rel="nofollow">Add to cart</a></div>
<div class="woocommerce-quick-view"><a href="#" class="yith-wcqv-button" data-product_id="453"><i class=""></i></a></div><div class="woocommerce-wishlist"><div class="yith-wcwl-add-to-wishlist add-to-wishlist-453"> <div class="yith-wcwl-add-button show" style="display:block"> <a href="index556a.html?add_to_wishlist=453" rel="nofollow" data-product-id="453" data-product-type="simple" class="add_to_wishlist" > <i class=""></i> </a><img src="../wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" /> </div> <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> <span class="feedback"></span> <a href="../shop-wishlist/index.html" rel="nofollow"> </a> </div> <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"> <span class="feedback"></span> <a href="../shop-wishlist/index.html" rel="nofollow"> </a> </div> <div style="clear:both"></div> <div class="yith-wcwl-wishlistaddresponse"></div></div>
<div class="clear"></div></div></div></div>

<div class="woocommerce-product-holder">
<h3 class="woocommerce-product-title"><a href="../product/items/index.php?pid=<?php echo $result['product_id'];?>" ><?php echo $result['product_name'];?></a></h3><div class="star-rating"><span style="width:<?php echo $result1['rate']; ?>">Rated <strong class="rating">4.00</strong> out of 5</span></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#8377;</span><?php echo $result['product_price']; ?></span></span></div></div>
<a href="#" class="button yith-wcqv-button" data-product_id="453">Quick View</a></li>

<?php 

		}
		
	
	
	else
	{	
		
	}
	
	
	$cnt=count($query);
			
	if(isset($_POST['order']))
	{
		$v=$_POST['order'];
		if($v=="price")
		$query=mysql_query("select * from product ORDER BY product_price ASC LIMIT $offset, $no_of_records_per_page");
	
		else
		$query=mysql_query("select * from product ORDER BY product_price DESC LIMIT $offset, $no_of_records_per_page");	
	
	}
	
	if(isset($_POST['submit']) && isset($_POST['submit'])!="")
	{
		$min=$_POST['min_price'];
		$max=$_POST['max_price'];
	
		$query=mysql_query("select * from product where product_price between $min and $max LIMIT $offset, $no_of_records_per_page");
		
		$cnt1=mysql_num_rows($query);
	}
	
	else
	{
		$min=100;
		$max=5000;
	
		$query=mysql_query("select * from product where product_price between $min and $max LIMIT $offset, $no_of_records_per_page");
	}
	
	while($result=mysql_fetch_array($query))
	{
		$id=$result['product_id'];
		
		$query1=mysql_query("select * from product_feedback where product_id=$id LIMIT $offset, $no_of_records_per_page");
	
		$result1=mysql_fetch_array($query1);
		
?>
<li class="post-453 product type-product status-publish has-post-thumbnail product_cat-nails product_cat-skin product_tag-design product_tag-development product_tag-seo product_tag-user-interface product_tag-wordpress first instock shipping-taxable purchasable product-type-simple">
<a href="../product/items/index.php?pid=<?php echo $result['product_id'];?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
<div class="woocommerce-product-inner"><div class="woocommerce-product-header"><a class="woocommerce-product-details" href="../product/items/index.php?pid=<?php echo $result['product_id']; ?>"><img width="545" height="621" src="gallery/<?php echo $result['product_image']; ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>

<div class="woocommerce-product-meta">
<div class="woocommerce-add-to-cart" style="padding-left:20%;"> <a href="../cart/cart_process1.php?pid=<?php echo $id; ?>" class="button product_type_simple add_to_cart_button" data-product_sku="" rel="nofollow">Add to cart</a></div>
<div class="woocommerce-quick-view"><a href="#" class="yith-wcqv-button" data-product_id="453"><i class=""></i></a></div><div class="woocommerce-wishlist"><div class="yith-wcwl-add-to-wishlist add-to-wishlist-453"> <div class="yith-wcwl-add-button show" style="display:block"> <a href="index556a.html?add_to_wishlist=453" rel="nofollow" data-product-id="453" data-product-type="simple" class="add_to_wishlist" > <i class=""></i> </a><img src="../wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" /> </div> <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> <span class="feedback"></span> <a href="../shop-wishlist/index.html" rel="nofollow"> </a> </div> <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"> <span class="feedback"></span> <a href="../shop-wishlist/index.html" rel="nofollow"> </a> </div> <div style="clear:both"></div> <div class="yith-wcwl-wishlistaddresponse"></div></div>
<div class="clear"></div></div></div></div>

<div class="woocommerce-product-holder">
<h3 class="woocommerce-product-title"><a href="../product/items/index.php?pid=<?php echo $result['product_id'];?>" ><?php echo $result['product_name'];?></a></h3><div class="star-rating"><span style="width:<?php echo $result1['rate']; ?>">Rated <strong class="rating">4.00</strong> out of 5</span></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#8377;</span><?php echo $result['product_price']; ?></span></span></div></div>
<a href="#" class="button yith-wcqv-button" data-product_id="453">Quick View</a></li>

<?php 

		}
	}

	else
	{
		$search=$_POST['search'];
		$query=mysql_query("select * from product where product_name like  '%$search%' limit $offset, $no_of_records_per_page");
		
		$counter = count($query);
		
		if(isset($_POST['submit']) && isset($_POST['submit'])!="")
		{
			$min=$_POST['min_price'];
			$max=$_POST['max_price'];
		
			$query5=mysql_query("select * from product where product_price between $min and $max LIMIT $offset, $no_of_records_per_page");
			
			$cnt1=mysql_num_rows($query);
		}
		
		else
		{
			$min=100;
			$max=5000;
		
			$query5=mysql_query("select * from product where product_price between $min and $max LIMIT $offset, $no_of_records_per_page");
		}
		
		while($result=mysql_fetch_array($query))
		{
			$id=$result['product_id'];
			
			$query1=mysql_query("select * from product_feedback where product_id=$id LIMIT $offset, $no_of_records_per_page");
		
			$result1=mysql_fetch_array($query1);
			$result5=mysql_fetch_array($query5);
			
?>
<li class="post-453 product type-product status-publish has-post-thumbnail product_cat-nails product_cat-skin product_tag-design product_tag-development product_tag-seo product_tag-user-interface product_tag-wordpress first instock shipping-taxable purchasable product-type-simple">
<a href="../product/items/index.php?pid=<?php echo $result['product_id'];?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
<div class="woocommerce-product-inner"><div class="woocommerce-product-header"><a class="woocommerce-product-details" href="../product/items/index.php?pid=<?php echo $result['product_id']; ?>"><img width="545" height="621" src="gallery/<?php echo $result['product_image']; ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>

<div class="woocommerce-product-meta">
<div class="woocommerce-add-to-cart" style="padding-left:20%;"> <a href="../product/items/cart_process1.php?pid=<?php echo $id; ?>" class="button product_type_simple add_to_cart_button" data-product_sku="" rel="nofollow">Add to cart</a></div>
<div class="woocommerce-quick-view"><a href="#" class="yith-wcqv-button" data-product_id="453"><i class=""></i></a></div><div class="woocommerce-wishlist"><div class="yith-wcwl-add-to-wishlist add-to-wishlist-453"> <div class="yith-wcwl-add-button show" style="display:block"> <a href="index556a.html?add_to_wishlist=453" rel="nofollow" data-product-id="453" data-product-type="simple" class="add_to_wishlist" > <i class=""></i> </a><img src="../wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" /> </div> <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> <span class="feedback"></span> <a href="../shop-wishlist/index.html" rel="nofollow"> </a> </div> <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"> <span class="feedback"></span> <a href="../shop-wishlist/index.html" rel="nofollow"> </a> </div> <div style="clear:both"></div> <div class="yith-wcwl-wishlistaddresponse"></div></div>
<div class="clear"></div></div></div></div>

<div class="woocommerce-product-holder">
<h3 class="woocommerce-product-title"><a href="../product/items/index.php?pid=<?php echo $result['product_id'];?>" ><?php echo $result['product_name'];?></a></h3><div class="star-rating"><span style="width:<?php echo $result1['rate']; ?>">Rated <strong class="rating">4.00</strong> out of 5</span></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#8377;</span><?php echo $result['product_price']; ?></span></span></div></div>
<a href="#" class="button yith-wcqv-button" data-product_id="453">Quick View</a></li>

<?php
		
	}
	}
	
?>

</ul>
<nav class="woocommerce-pagination">
<?php if(isset($_POST['find']) && isset($counter) && $counter<9 ){?>  <a href = 'index.php'><button type="submit">View All Products</button></a> <?php } else {?>
	<br><br>
<ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); if(isset($cnt1) && $cnt1<9) { echo '?disabled'; } }  ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul> <?php }?></nav> </main> </div>
<aside id="secondary" class="sidebar-fixed widget-area widget-has-sidebar sidebar-fixed col-xl-4 col-lg-4 col-md-5 col-sm-12"> <div class="sidebar-fixed-inner"> <section id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories"><div class="widget-content"><h2 class="widget-title">Product categories</h2><div class="widget-content-inner"><ul class="product-categories"><li class="cat-item cat-item-38"><a href="index.php?ptype=hair">Hair</a></li><li class="cat-item cat-item-36"><a href="index.php?ptype='make up'">Makeup</a></li><li class="cat-item cat-item-35"><a href="index.php?ptype='nails'">Nails</a></li><li class="cat-item cat-item-34"><a href="index.php?ptype='skin'">Skin</a></li><li class="cat-item cat-item-19"><a href="index.php?ptype='tanning'">Tanning</a></li></ul></div></div></section>
 
<section id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter"><div class="widget-content"><h2 class="widget-title">Price Range</h2><div class="widget-content-inner">

<form method="post" action="index.php"><div class="price_slider_wrapper"><div class="price_slider" style="display:none;"></div><div class="price_slider_amount"><input type="text" id="min_price" name="min_price" value="100" data-min="100" placeholder="Min price" /><input type="text" id="max_price" name="max_price" value="5000" data-max="5000" placeholder="Max price" /><button type="submit" class="button" name="submit">Filter</button><div class="price_label" style="display:none;">Price: <i class="fa fa-rupee"> <?php echo $min; ?> </i> <i class="fa fa-rupee"> <?php echo $max; ?> </i> </div><div class="clear"></div></div></div></form>

</div></div></section>

</div> 



</aside> </div> </div></div>

</div>


 <div class="ct-shop-bottom"> <div class="container"> <div class="row"> <div class="ct-shop-bottom-item" style="margin-left:15%;"> <div class="ct-icon"> <i class="fa fa-gift"></i> </div> <div class="ct-meta"> <h3>Free shipping on orders &#8377;1000</h3> <p>Shippining Within City!</p> </div> </div>  <div class="ct-shop-bottom-item"> <div class="ct-icon"> <i class="fa fa-user"></i> </div> <div class="ct-meta"> <h3>Happy Customers!</h3> <p>Happy with our product, Give us Feedback!</p> </div> </div> </div> </div> </div>
 
<footer id="colophon" class="site-footer footer-layout1"> <div class="top-gallery"> <div class="ct-carousel owl-carousel images-light-box-carousel" data-item-xs="4" data-item-sm="6" data-item-md="8" data-item-lg="10" data-margin="0" data-loop="true" data-autoplay="true" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="false" data-bullets="false" data-stagepadding="0" data-stagepaddingsm="0" data-rtl="false"> <div class="ct-carousel-item"> <a class="light-box" href="../wp-content/uploads/2018/09/pic1.jpg"><img src="../wp-content/uploads/2018/09/pic1.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="../wp-content/uploads/2018/09/pic2.jpg"><img src="../wp-content/uploads/2018/09/pic2.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="../wp-content/uploads/2018/09/pic3.jpg"><img src="../wp-content/uploads/2018/09/pic3.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="../wp-content/uploads/2018/09/pic4.jpg"><img src="../wp-content/uploads/2018/09/pic4.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="../wp-content/uploads/2018/09/pic5.jpg"><img src="../wp-content/uploads/2018/09/pic5.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="../wp-content/uploads/2018/09/pic6.jpg"><img src="../wp-content/uploads/2018/09/pic6.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="../wp-content/uploads/2018/09/pic7.jpg"><img src="../wp-content/uploads/2018/09/pic7.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="../wp-content/uploads/2018/09/pic8.jpg"><img src="../wp-content/uploads/2018/09/pic8.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="../wp-content/uploads/2018/09/pic9.jpg"><img src="../wp-content/uploads/2018/09/pic9.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="../wp-content/uploads/2018/09/pic10.jpg"><img src="../wp-content/uploads/2018/09/pic10.jpg" alt=""></a> </div> </div> </div> <div class="top-footer bg-image bg-overlay column-width"> <div class="container"> <div class="row"> <div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <section id="nav_menu-2" class="widget widget_nav_menu"><h2 class="footer-widget-title">Salon 360 ERP</h2><div class="menu-menu-company-container"><ul id="menu-menu-company" class="menu"><li id="menu-item-69" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-69"><a href="../index.php" class="no-one-page">Home</a></li><li id="menu-item-70" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-70"><a href="../our portfolio/index.php" class="no-one-page">Our Portfolio</a></li><li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="../our-team/index.php" class="no-one-page">Our Team</a></li><li id="menu-item-72" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-72"><a href="../booking/appointment/index.php" class="no-one-page">Booking</a></li><li id="menu-item-73" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-73"><a href="../membership/index.php" class="no-one-page">Membership</a></li></ul></div></section></div><div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <section id="nav_menu-3" class="widget widget_nav_menu"><h2 class="footer-widget-title">Useful Links</h2><div class="menu-menu-useful-link-container"><ul id="menu-menu-useful-link" class="menu"><li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79"><a href="../shop/index.php" class="no-one-page">Shop</a></li><li id="menu-item-78" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78"><a href="../services/index.php" class="no-one-page">Services</a></li><li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80"><a href="../cart/index.php" class="no-one-page">Cart</a></li><li id="menu-item-82" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82"><a href="../login/index.php" class="no-one-page">Login</a></li><li id="menu-item-81" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-81"><a href="../register/index.php" class="no-one-page">Register</a></li></ul></div></section></div><div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <div class="contact-info widget"> <h3 class="footer-widget-title">Contact us</h3> <ul class="ct-contact-info-inner"> <li> <i class="ti-location-pin"></i> <label>Address</label> <span>Surat, Gujarat, India.</span> </li> <li> <i class="ti-mobile"></i> <label>Phone</label> <span>+91 12345 67890 (24/7 Support Line)</span> </li> <li> <i class="ti-email"></i> <label>Email</label> <span>salon360erp@gmail.com</span> </li> </ul> </div> </div><div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <section id="newsletterwidget-2" class="mb-20 widget widget_newsletterwidget"><h2 class="footer-widget-title">Any Query?</h2>If you have any questions, you can contact with us so that we can give you a satisfying answer. Send us E-mail at salon360erp@gmail.com We'll reply you as soon as possible.</section></div> </div> </div> </div> <a href="#" class="ct-scroll-top fixed-bottom"><i class="zmdi zmdi-chevron-up"></i></a></footer> <a href="#" class="ct-scroll-top"> <i class="ti-angle-up"></i> </a></div><div id="yith-quick-view-modal"><div class="yith-quick-view-overlay"></div><div class="yith-wcqv-wrapper"><div class="yith-wcqv-main"><div class="yith-wcqv-head"><a href="#" id="yith-quick-view-close" class="yith-wcqv-close">X</a></div><div id="yith-quick-view-content" class="woocommerce single-product"></div></div></div></div><script type="text/javascript">var c = document.body.className;c = c.replace(/woocommerce-no-js/, 'woocommerce-js');document.body.className = c;</script><div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button><button class="pswp__button pswp__button--share" aria-label="Share"></button><button class="pswp__button pswp__button--fs" aria-label="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" aria-label="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" aria-label="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div><script type="text/template" id="tmpl-variation-template"><div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div><div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div><div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div></script><script type="text/template" id="tmpl-unavailable-variation-template"><p>Sorry, this product is unavailable. Please choose a different combination.</p></script><link rel='stylesheet' id='photoswipe-css' href='../wp-content/plugins/woocommerce/assets/css/photoswipe/photoswipe9d52.css?ver=3.5.1' type='text/css' media='all' /><link rel='stylesheet' id='photoswipe-default-skin-css' href='../wp-content/plugins/woocommerce/assets/css/photoswipe/default-skin/default-skin9d52.css?ver=3.5.1' type='text/css' media='all' /><script type='text/javascript' src='../wp-includes/js/jquery/ui/core.mine899.js?ver=1.11.4'></script><script type='text/javascript' src='../wp-includes/js/jquery/ui/datepicker.mine899.js?ver=1.11.4'></script><script type='text/javascript'>jQuery(document).ready(function(jQuery){jQuery.datepicker.setDefaults({"closeText":"Close","currentText":"Today","monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Previous","dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"dateFormat":"MM d, yy","firstDay":1,"isRTL":false});});</script><script type='text/javascript' src='../wp-content/plugins/booked/assets/js/spin.min7406.js?ver=2.0.1'></script><script type='text/javascript' src='../wp-content/plugins/booked/assets/js/spin.jquery7406.js?ver=2.0.1'></script><script type='text/javascript' src='../wp-content/plugins/booked/assets/js/tooltipster/js/jquery.tooltipster.min9b70.js?ver=3.3.0'></script><script type='text/javascript'>
var booked_js_vars = {"ajax_url":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","profilePage":"","publicAppointments":"","i18n_confirm_appt_delete":"Are you sure you want to cancel this appointment?","i18n_please_wait":"Please wait ...","i18n_wrong_username_pass":"Wrong username\/password combination.","i18n_fill_out_required_fields":"Please fill out all required fields.","i18n_guest_appt_required_fields":"Please enter your name to book an appointment.","i18n_appt_required_fields":"Please enter your name, your email address and choose a password to book an appointment.","i18n_appt_required_fields_guest":"Please fill in all \"Information\" fields.","i18n_password_reset":"Please check your email for instructions on resetting your password.","i18n_password_reset_error":"That username or email is not recognized."};
</script><script type='text/javascript' src='../wp-content/plugins/booked/assets/js/functions77e6.js?ver=2.2.1'></script><script type='text/javascript'>
var wpcf7 = {"apiSettings":{"root":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}},"cached":"1"};
</script><script type='text/javascript' src='../wp-content/plugins/contact-form-7/includes/js/scripts1748.js?ver=5.0.5'></script><script type='text/javascript' src='../wp-content/plugins/ctuser/acess/js/notify.min8a54.js?ver=1.0.0'></script><script type='text/javascript' src='../wp-content/plugins/ctuser/acess/js/remodal.min8a54.js?ver=1.0.0'></script><script type='text/javascript'>
var userpress = {"ajax":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","nonce":"a638ab289c"};
</script><script type='text/javascript' src='../wp-content/plugins/ctuser/acess/js/user-press8a54.js?ver=1.0.0'></script><script type='text/javascript'>
var userpress = {"ajax":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","nonce":"a638ab289c","app_id":""};
</script><script type='text/javascript' src='../wp-content/plugins/ctuser/acess/js/facebook.login8a54.js?ver=1.0.0'></script><script type='text/javascript'>
var userpress = {"ajax":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","nonce":"a638ab289c","app_id":""};
</script><script type='text/javascript' src='../wp-content/plugins/ctuser/acess/js/google.login8a54.js?ver=1.0.0'></script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js?ver=2.1.4'></script><script type='text/javascript'>
var woocommerce_params = {"ajax_url":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/beautyzone\/demo\/?wc-ajax=%%endpoint%%"};
</script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min9d52.js?ver=3.5.1'></script><script type='text/javascript'>
var wc_cart_fragments_params = {"ajax_url":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/beautyzone\/demo\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_7396856dd2b73fde7fa24aec378f1949","fragment_name":"wc_fragments_7396856dd2b73fde7fa24aec378f1949"};
</script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min9d52.js?ver=3.5.1'></script><script type='text/javascript'>
var booked_fea_vars = {"ajax_url":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","i18n_confirm_appt_delete":"Are you sure you want to cancel this appointment?","i18n_confirm_appt_approve":"Are you sure you want to approve this appointment?"};
</script><script type='text/javascript' src='../wp-content/plugins/booked-frontend-agents/js/functions77e6.js?ver=2.2.1'></script><script type='text/javascript'>
var yith_qv = {"ajaxurl":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php","loader":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-content\/plugins\/yith-woocommerce-quick-view\/assets\/image\/qv-loader.gif","is2_2":"","lang":""};
</script><script type='text/javascript' src='../wp-content/plugins/yith-woocommerce-quick-view/assets/js/frontend.mine34c.js?ver=1.3.5'></script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.min005e.js?ver=3.1.6'></script><script type='text/javascript' src='../wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.selectBox.min7359.js?ver=1.2.0'></script><script type='text/javascript'>
var yith_wcwl_l10n = {"ajax_url":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php","redirect_to_cart":"yes","multi_wishlist":"","hide_add_button":"1","is_user_logged_in":"","ajax_loader_url":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-content\/plugins\/yith-woocommerce-wishlist\/assets\/images\/ajax-loader.gif","remove_from_wishlist_after_add_to_cart":"yes","labels":{"cookie_disabled":"We are sorry, but this feature is available only if cookies are enabled on your browser.","added_to_cart_message":"<div class=\"woocommerce-message\">Product correctly added to cart<\/div>"},"actions":{"add_to_wishlist_action":"add_to_wishlist","remove_from_wishlist_action":"remove_from_wishlist","move_to_another_wishlist_action":"move_to_another_wishlsit","reload_wishlist_and_adding_elem_action":"reload_wishlist_and_adding_elem"}};
</script><script type='text/javascript' src='../wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.yith-wcwl5bf8.js?ver=2.2.5'></script><script type='text/javascript' src='../wp-includes/js/underscore.min4511.js?ver=1.8.3'></script><script type='text/javascript'>
var _wpUtilSettings = {"ajax":{"url":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php"}};
</script><script type='text/javascript' src='../wp-includes/js/wp-util.mind87f.js?ver=4.9.9'></script><script type='text/javascript'>
var woo_variation_swatches_options = {"is_product_page":""};
</script><script type='text/javascript' src='../wp-content/plugins/woo-variation-swatches/assets/js/frontend.minfa41.js?ver=1.0.48'></script><script type='text/javascript' src='../wp-content/themes/beautyzone/assets/js/bootstrap.mincce7.js?ver=4.0.0'></script><script type='text/javascript' src='../wp-content/themes/beautyzone/assets/js/nice-select.mindc98.js?ver=all'></script><script type='text/javascript' src='../wp-content/themes/beautyzone/assets/js/enscrolldc98.js?ver=all'></script><script type='text/javascript' src='../wp-content/themes/beautyzone/assets/js/match-height-min8a54.js?ver=1.0.0'></script><script type='text/javascript' src='../wp-content/themes/beautyzone/assets/js/sidebar-scroll-fixed8a54.js?ver=1.0.0'></script><script type='text/javascript' src='../wp-content/themes/beautyzone/assets/js/magnific-popup.min8a54.js?ver=1.0.0'></script><script type='text/javascript'>
var main_data = {"ajax_url":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php"};
</script><script type='text/javascript' src='../wp-content/themes/beautyzone/assets/js/main20b9.js?ver=1.0.2'></script><script type='text/javascript'>
var newsletter = {"messages":{"email_error":"Email address is not correct","name_error":"Name is required","surname_error":"Last name is required","profile_error":"","privacy_error":"You must accept the privacy policy"},"profile_max":"20"};
</script><script type='text/javascript' src='../wp-content/plugins/newsletter/subscription/validatefcc2.js?ver=5.7.9'></script><script type='text/javascript' src='../wp-includes/js/wp-embed.mind87f.js?ver=4.9.9'></script><script type='text/javascript' src='../wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4'></script><script type='text/javascript' src='../wp-includes/js/jquery/ui/mouse.mine899.js?ver=1.11.4'></script><script type='text/javascript' src='../wp-includes/js/jquery/ui/slider.mine899.js?ver=1.11.4'></script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/jquery-ui-touch-punch/jquery-ui-touch-punch.min9d52.js?ver=3.5.1'></script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/accounting/accounting.minaffb.js?ver=0.4.2'></script><script type='text/javascript'>
var woocommerce_price_slider_params = {"currency_format_num_decimals":"0","currency_format_symbol":"\u00a3","currency_format_decimal_sep":".","currency_format_thousand_sep":",","currency_format":"%s%v"};
</script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/price-slider.min9d52.js?ver=3.5.1'></script><script type='text/javascript' src='../wp-content/plugins/ctcore/assets/js/owl.carousel.mind87f.js?ver=4.9.9'></script><script type='text/javascript' src='../wp-content/themes/beautyzone/assets/js/ct-carousel20b9.js?ver=1.0.2'></script><script type='text/javascript'>
var wc_add_to_cart_variation_params = {"wc_ajax_url":"\/beautyzone\/demo\/?wc-ajax=%%endpoint%%","i18n_no_matching_variations_text":"Sorry, no products matched your selection. Please choose a different combination.","i18n_make_a_selection_text":"Please select some product options before adding this product to your cart.","i18n_unavailable_text":"Sorry, this product is unavailable. Please choose a different combination."};
</script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min9d52.js?ver=3.5.1'></script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe.min0235.js?ver=4.1.1'></script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe-ui-default.min0235.js?ver=4.1.1'></script><script type='text/javascript'>
var wc_single_product_params = {"i18n_required_rating_text":"Please select a rating","review_rating_required":"yes","flexslider":{"rtl":false,"animation":"slide","smoothHeight":true,"directionNav":false,"controlNav":"thumbnails","slideshow":false,"animationSpeed":500,"animationLoop":false,"allowOneSlide":false},"zoom_enabled":"","zoom_options":[],"photoswipe_enabled":"1","photoswipe_options":{"shareEl":false,"closeOnScroll":false,"history":false,"hideAnimationDuration":0,"showAnimationDuration":0},"flexslider_enabled":"1"};
</script><script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/single-product.min9d52.js?ver=3.5.1'></script></body>
<!-- Mirrored from demos.casethemes.net/beautyzone/demo/shop/?sidebar-shop=left by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Jan 2019 08:18:20 GMT -->
</html>
<!-- Dynamic page generated in 1.133 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2019-01-07 08:10:51 -->

<!-- Compression = gzip -->