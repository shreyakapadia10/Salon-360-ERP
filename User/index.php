<?php

	include("connection1.php");

	session_start();

	require "PHPMailerAutoload.php";

	$today = date('Y-m-d');
	
	$select = mysql_query("select * from appointment a, user u where a.user_id = u.user_id && a.appointment_date='$today'");
	
	$cnt = mysql_num_rows($select);

	while($ans = mysql_fetch_array($select))
	{
		$aid = $ans['appointment_id'];
		
		$time = $ans['appointment_time'];
		
		$app = $ans['appointment_details'];
		
		$uid = $ans['user_id'];
		
		$name = $ans['user_name'];
		
		$email = $ans['user_email'];
		
		$select1 = mysql_query("select * from notification_user where appointment_id = '$aid'");

		$cnt1 = mysql_num_rows($select1);

		if($cnt1==0)
		{
			$msg = "<table> 

					<tr>

						<th> Dear $name, </th>
					
					</tr>
					
					<tr>
					
						<td> You Have Appointment Today At $time for $app.  </td> 
					
					</tr>
					
					</table>";
								
					$mail=new PHPMailer;
					$mail->isSMTP();
					$mail->Host='smtp.gmail.com';
					$mail->SMTPAuth=true;
					$mail->Username='salon360erp@gmail.com';
					$mail->Password='Salon360erp@123';
					$mail->SMTPSecure='ssl';
					$mail->Port=465;
					$mail->From='salon360erp@gmail.com';
					$mail->FromName='Salon 360 ERP';
					$mail->addAddress($email);
					$mail->WordWrap=50;
					$mail->isHTML(true);
					$mail->Subject='Appoinment Reminder';
					$mail->Body=$msg;
					
					// echo $msg;
					
					if($mail->send())
					{
						$insert = mysql_query("insert into notification_user(user_id,appointment_id, notification_title, notification, notification_date, notification_time) values ('$uid','$aid', 'Appoinment Reminder', 'You Have Appointment Today At $time for $app', CURDATE(), CURTIME())");
						
						mysql_query("update notification_user set notification_status = 'Yes' where user_id ='$uid'");
						
						header("location:index.php");
						
						echo "Message has been sent.<br>";
					}

					else
					{
						// echo "Message could not be sent";
						// echo "Mailer Error".$mail->ErrorInfo ;
						// header("location:index.php");
					}
		}

		else
		{
			while($ans1 = mysql_fetch_array($select1))
			{
				if($ans1['notification_status']=='Yes')
				{
				}
				
				else
				{
					$msg = "<table> 

					<tr>

						<th> Dear $name, </th>
					
					</tr>
					
					<tr>
					
						<td> You Have Appointment Today At $time for $app.  </td> 
					
					</tr>
					
					</table>";
				
					// require "PHPMailerAutoload.php";
					
					$mail=new PHPMailer;
					$mail->isSMTP();
					$mail->Host='smtp.gmail.com';
					$mail->SMTPAuth=true;
					$mail->Username='salon360erp@gmail.com';
					$mail->Password='Salon360erp@123';
					$mail->SMTPSecure='ssl';
					$mail->Port=465;
					$mail->From='salon360erp@gmail.com';
					$mail->FromName='Salon 360 ERP';
					$mail->addAddress($email);
					$mail->WordWrap=50;
					$mail->isHTML(true);
					$mail->Subject='Appoinment Reminder';
					$mail->Body=$msg;
					
					// echo $msg;
					
					if($mail->send())
					{
						$insert = mysql_query("insert into notification_user(user_id,appointment_id, notification_title, notification, notification_date, notification_time) values ('$uid','$aid', 'Appoinment Reminder', 'You Have Appointment Today At $time for $app', CURDATE(), CURTIME())");
						
						mysql_query("update notification_user set notification_status = 'Yes' where user_id ='$uid'");
						
						header("location:index.php");
						
						echo "Message has been sent.<br>";
					}

					else
					{
					/*	echo "Message could not be sent";
						echo "Mailer Error".$mail->ErrorInfo ;
						header("location:index.php");*/
					}
				}
			}
		}
	}
	
	//Confirm Appointment
	
	$today = date('Y-m-d');
	
	$select = mysql_query("select * from confirm_appointment a, user u where a.user_id = u.user_id && a.appointment_date='$today'");
	
	$cnt = mysql_num_rows($select);

	while($ans = mysql_fetch_array($select))
	{
		$aid = $ans['appointment_id'];
		
		$time = $ans['appointment_time'];
		
		$app = $ans['appointment_details'];
		
		$uid = $ans['user_id'];
		
		$name = $ans['user_name'];
		
		$email = $ans['user_email'];
		
		$select1 = mysql_query("select * from notification_user where appointment_id = '$aid'");

		$cnt1 = mysql_num_rows($select1);

		if($cnt1==0)
		{
			$msg = "<table> 

					<tr>

						<th> Dear $name, </th>
					
					</tr>
					
					<tr>
					
						<td> You Have Appointment Today At $time for $app.  </td> 
					
					</tr>
					
					</table>";
				
					$mail=new PHPMailer;
					$mail->isSMTP();
					$mail->Host='smtp.gmail.com';
					$mail->SMTPAuth=true;
					$mail->Username='salon360erp@gmail.com';
					$mail->Password='Salon360erp@123';
					$mail->SMTPSecure='ssl';
					$mail->Port=465;
					$mail->From='salon360erp@gmail.com';
					$mail->FromName='Salon 360 ERP';
					$mail->addAddress($email);
					$mail->WordWrap=50;
					$mail->isHTML(true);
					$mail->Subject='Appoinment Reminder';
					$mail->Body=$msg;
					
					echo $msg;
					
					if($mail->send())
					{
						$insert = mysql_query("insert into notification_user(user_id,appointment_id, notification_title, notification, notification_date, notification_time) values ('$uid','$aid', 'Appoinment Reminder', 'You Have Appointment Today At $time for $app', CURDATE(), CURTIME())");
						
						mysql_query("update notification_user set notification_status = 'Yes' where user_id ='$uid'");
						
						header("location:index.php");
						
						echo "Message has been sent.<br>";
					}

					else
					{
						echo "Message could not be sent";
						echo "Mailer Error".$mail->ErrorInfo ;
						header("location:login/index1.php");
					}
		}

		else
		{
			while($ans1 = mysql_fetch_array($select1))
			{
				if($ans1['notification_status']=='Yes')
				{
				}
				
				else
				{
					$msg = "<table> 

					<tr>

						<th> Dear $name, </th>
					
					</tr>
					
					<tr>
					
						<td> You Have Appointment Today At $time for $app.  </td> 
					
					</tr>
					
					</table>";
				
					require "PHPMailerAutoload.php";
					
					$mail=new PHPMailer;
					$mail->isSMTP();
					$mail->Host='smtp.gmail.com';
					$mail->SMTPAuth=true;
					$mail->Username='salon360erp@gmail.com';
					$mail->Password='Salon360erp@123';
					$mail->SMTPSecure='ssl';
					$mail->Port=465;
					$mail->From='salon360erp@gmail.com';
					$mail->FromName='Salon 360 ERP';
					$mail->addAddress($email);
					$mail->WordWrap=50;
					$mail->isHTML(true);
					$mail->Subject='Appoinment Reminder';
					$mail->Body=$msg;
					
					echo $msg;
					
					if($mail->send())
					{
						$insert = mysql_query("insert into notification_user(user_id,appointment_id, notification_title, notification, notification_date, notification_time) values ('$uid','$aid', 'Appoinment Reminder', 'You Have Appointment Today At $time for $app', CURDATE(), CURTIME())");
						
						mysql_query("update notification_user set notification_status = 'Yes' where user_id ='$uid'");
						
						header("location:index.php");
						
						echo "Message has been sent.<br>";
					}

					else
					{
						echo "Message could not be sent";
						echo "Mailer Error".$mail->ErrorInfo ;
						header("location:index.php");
					}
				}
			}
		}
	}
	
?>

<!doctype html><html lang="en-US">
<!-- Mirrored from demos.casethemes.net/beautyzone/demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Jan 2019 08:08:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="profile" href="http://gmpg.org/xfn/11"> <script>document.documentElement.className = document.documentElement.className + ' yes-js js_active js'</script><title>Home &#8211; Salon 360 ERP</title><style type="text/css" media="screen">#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td a.ui-state-active,#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td a.ui-state-active:hover,body #booked-profile-page input[type=submit].button-primary:hover,body .booked-list-view button.button:hover,body .booked-list-view input[type=submit].button-primary:hover,body table.booked-calendar input[type=submit].button-primary:hover,body .booked-modal input[type=submit].button-primary:hover,body table.booked-calendar th,body table.booked-calendar thead,body table.booked-calendar thead th,body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover,body #booked-profile-page .booked-profile-header,body #booked-profile-page .booked-tabs li.active a,body #booked-profile-page .booked-tabs li.active a:hover,body #booked-profile-page .appt-block .google-cal-button > a:hover,#ui-datepicker-div.booked_custom_date_picker .ui-datepicker-header{background:!important}body #booked-profile-page input[type=submit].button-primary:hover,body table.booked-calendar input[type=submit].button-primary:hover,body .booked-list-view button.button:hover,body .booked-list-view input[type=submit].button-primary:hover,body .booked-modal input[type=submit].button-primary:hover,body table.booked-calendar th,body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover,body #booked-profile-page .booked-profile-header,body #booked-profile-page .appt-block .google-cal-button > a:hover{border-color:!important}body table.booked-calendar tr.days,body table.booked-calendar tr.days th,body .booked-calendarSwitcher.calendar,body #booked-profile-page .booked-tabs,#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead,#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead th{background:!important}body table.booked-calendar tr.days th,body #booked-profile-page .booked-tabs{border-color:!important}#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td.ui-datepicker-today a,#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td.ui-datepicker-today a:hover,body #booked-profile-page input[type=submit].button-primary,body table.booked-calendar input[type=submit].button-primary,body .booked-list-view button.button,body .booked-list-view input[type=submit].button-primary,body .booked-list-view button.button,body .booked-list-view input[type=submit].button-primary,body .booked-modal input[type=submit].button-primary,body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button,body #booked-profile-page .booked-profile-appt-list .appt-block.approved .status-block,body #booked-profile-page .appt-block .google-cal-button > a,body .booked-modal p.booked-title-bar,body table.booked-calendar td:hover .date span,body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active,body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active:hover,.booked-ms-modal .booked-book-appt{background:}body #booked-profile-page input[type=submit].button-primary,body table.booked-calendar input[type=submit].button-primary,body .booked-list-view button.button,body .booked-list-view input[type=submit].button-primary,body .booked-list-view button.button,body .booked-list-view input[type=submit].button-primary,body .booked-modal input[type=submit].button-primary,body #booked-profile-page .appt-block .google-cal-button > a,body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button,body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active,body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active:hover{border-color:}body .booked-modal .bm-window p i.fa,body .booked-modal .bm-window a,body .booked-appt-list .booked-public-appointment-title,body .booked-modal .bm-window p.appointment-title,.booked-ms-modal.visible:hover .booked-book-appt{color:}.booked-appt-list .timeslot.has-title .booked-public-appointment-title{color:inherit}</style><style>.wishlist_table .add_to_cart,a.add_to_wishlist.button.alt{border-radius:16px;-moz-border-radius:16px;-webkit-border-radius:16px}</style><link rel='dns-prefetch' href='http://fonts.googleapis.com/' /><link rel='dns-prefetch' href='http://s.w.org/' /><link rel="alternate" type="application/rss+xml" title="BeautyZone &raquo; Feed" href="feed/index.html" /><link rel="alternate" type="application/rss+xml" title="BeautyZone &raquo; Comments Feed" href="comments/feed/index.html" /><script type="text/javascript">window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.9.9"}};!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);</script><style type="text/css">img.wp-smiley,img.emoji{display:inline !important;border:none !important;box-shadow:none !important;height:1em !important;width:1em !important;margin:0 .07em !important;vertical-align:-0.1em !important;background:none !important;padding:0 !important}</style><link rel='stylesheet' id='booked-icons-css' href='wp-content/plugins/booked/assets/css/icons77e6.css?ver=2.2.1' type='text/css' media='all' /><link rel='stylesheet' id='booked-tooltipster-css' href='wp-content/plugins/booked/assets/js/tooltipster/css/tooltipster9b70.css?ver=3.3.0' type='text/css' media='all' /><link rel='stylesheet' id='booked-tooltipster-theme-css' href='wp-content/plugins/booked/assets/js/tooltipster/css/themes/tooltipster-light9b70.css?ver=3.3.0' type='text/css' media='all' /><link rel='stylesheet' id='booked-animations-css' href='wp-content/plugins/booked/assets/css/animations77e6.css?ver=2.2.1' type='text/css' media='all' /><link rel='stylesheet' id='booked-styles-css' href='wp-content/plugins/booked/assets/css/styles77e6.css?ver=2.2.1' type='text/css' media='all' /><link rel='stylesheet' id='booked-responsive-css' href='wp-content/plugins/booked/assets/css/responsive77e6.css?ver=2.2.1' type='text/css' media='all' /><link rel='stylesheet' id='contact-form-7-css' href='wp-content/plugins/contact-form-7/includes/css/styles1748.css?ver=5.0.5' type='text/css' media='all' /><link rel='stylesheet' id='cms-plugin-stylesheet-css' href='wp-content/plugins/ctcore/assets/css/cms-styled87f.css?ver=4.9.9' type='text/css' media='all' /><link property="stylesheet" rel='stylesheet' id='owl-carousel-css' href='wp-content/plugins/ctcore/assets/css/owl.carousel.mind87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='remodal-css' href='wp-content/plugins/ctuser/acess/css/remodald87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='remodal-default-theme-css' href='wp-content/plugins/ctuser/acess/css/remodal-default-themed87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='up.social.icons-css' href='wp-content/plugins/ctuser/acess/css/socicond87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='rs-plugin-settings-css' href='wp-content/plugins/revslider/public/assets/css/settings23da.css?ver=5.4.8' type='text/css' media='all' /><style id='rs-plugin-settings-inline-css' type='text/css'>#rs-demo-id{}</style><link rel='stylesheet' id='woocommerce-layout-css' href='wp-content/plugins/woocommerce/assets/css/woocommerce-layout9d52.css?ver=3.5.1' type='text/css' media='all' /><link rel='stylesheet' id='woocommerce-smallscreen-css' href='wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen9d52.css?ver=3.5.1' type='text/css' media='only screen and (max-width: 768px)' /><link rel='stylesheet' id='woocommerce-general-css' href='wp-content/plugins/woocommerce/assets/css/woocommerce9d52.css?ver=3.5.1' type='text/css' media='all' /><style id='woocommerce-inline-inline-css' type='text/css'>.woocommerce form .form-row .required{visibility:visible}</style><link rel='stylesheet' id='booked-fea-styles-css' href='wp-content/plugins/booked-frontend-agents/css/styles77e6.css?ver=2.2.1' type='text/css' media='all' /><link rel='stylesheet' id='yith-quick-view-css' href='wp-content/plugins/yith-woocommerce-quick-view/assets/css/yith-quick-viewd87f.css?ver=4.9.9' type='text/css' media='all' /><style id='yith-quick-view-inline-css' type='text/css'>#yith-quick-view-modal .yith-wcqv-main{background:#ffffff}#yith-quick-view-close{color:#cdcdcd}#yith-quick-view-close:hover{color:#ff0000}</style><link rel='stylesheet' id='woocommerce_prettyPhoto_css-css' href='wp-content/plugins/woocommerce/assets/css/prettyPhoto9d52.css?ver=3.5.1' type='text/css' media='all' /><link rel='stylesheet' id='jquery-selectBox-css' href='wp-content/plugins/yith-woocommerce-wishlist/assets/css/jquery.selectBox7359.css?ver=1.2.0' type='text/css' media='all' /><link rel='stylesheet' id='yith-wcwl-main-css' href='wp-content/plugins/yith-woocommerce-wishlist/assets/css/style5bf8.css?ver=2.2.5' type='text/css' media='all' /><link rel='stylesheet' id='yith-wcwl-font-awesome-css' href='wp-content/plugins/yith-woocommerce-wishlist/assets/css/font-awesome.min1849.css?ver=4.7.0' type='text/css' media='all' /><link rel='stylesheet' id='woo-variation-swatches-css' href='wp-content/plugins/woo-variation-swatches/assets/css/frontend.minfa41.css?ver=1.0.48' type='text/css' media='all' /><style id='woo-variation-swatches-inline-css' type='text/css'> .variable-item:not(.radio-variable-item){width:30px;height:30px}.woo-variation-swatches-style-squared .button-variable-item{min-width:30px}.button-variable-item span{font-size:16px}</style><link rel='stylesheet' id='woo-variation-swatches-theme-override-css' href='wp-content/plugins/woo-variation-swatches/assets/css/wvs-theme-override.minfa41.css?ver=1.0.48' type='text/css' media='all' /><link rel='stylesheet' id='woo-variation-swatches-tooltip-css' href='wp-content/plugins/woo-variation-swatches/assets/css/frontend-tooltip.minfa41.css?ver=1.0.48' type='text/css' media='all' /><link rel='stylesheet' id='bootstrap-css' href='wp-content/themes/beautyzone/assets/css/bootstrap.mincce7.css?ver=4.0.0' type='text/css' media='all' /><link rel='stylesheet' id='font-awesome-css' href='wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min24b2.css?ver=5.5.5' type='text/css' media='all' /><style id='font-awesome-inline-css' type='text/css'>[data-font="FontAwesome"]:before{font-family:'FontAwesome' !important;content:attr(data-icon) !important;speak:none !important;font-weight:normal !important;font-variant:normal !important;text-transform:none !important;line-height:1 !important;font-style:normal !important;-webkit-font-smoothing:antialiased !important;-moz-osx-font-smoothing:grayscale !important}</style><link rel='stylesheet' id='font-material-icon-css' href='wp-content/themes/beautyzone/assets/css/material-design-iconic-font.min3601.css?ver=2.2.0' type='text/css' media='all' /><link rel='stylesheet' id='flaticon-css' href='wp-content/themes/beautyzone/assets/css/flaticon8a54.css?ver=1.0.0' type='text/css' media='all' /><link rel='stylesheet' id='themify-icons-css' href='wp-content/themes/beautyzone/assets/css/themify-icons8a54.css?ver=1.0.0' type='text/css' media='all' /><link rel='stylesheet' id='font-etline-icon-css' href='wp-content/themes/beautyzone/assets/css/et-line8a54.css?ver=1.0.0' type='text/css' media='all' /><link rel='stylesheet' id='magnific-popup-css' href='wp-content/themes/beautyzone/assets/css/magnific-popup8a54.css?ver=1.0.0' type='text/css' media='all' /><link rel='stylesheet' id='beautyzone-theme-css' href='wp-content/themes/beautyzone/assets/css/theme20b9.css?ver=1.0.2' type='text/css' media='all' /><style id='beautyzone-theme-inline-css' type='text/css'>.single-post .content-area .entry-content p{text-align:justify}</style><link rel='stylesheet' id='beautyzone-menu-css' href='wp-content/themes/beautyzone/assets/css/menu20b9.css?ver=1.0.2' type='text/css' media='all' /><link rel='stylesheet' id='beautyzone-style-css' href='wp-content/themes/beautyzone/styled87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='beautyzone-google-fonts-css' href='https://fonts.googleapis.com/css?family=Lato%3A100%2C100i%2C300%2C300i%2C400%2C400i%2C700%2C700i%2C900%2C900i%7CMontserrat%3A400%2C500%2C700%7CPoppins%3A400%2C500%2C600%2C700%7CNunito%3A400%2C600%2C700%2C800&amp;subset=latin%2Clatin-ext&amp;ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='booked-wc-fe-styles-css' href='wp-content/plugins/booked-woocommerce-payments/css/frontend-styled87f.css?ver=4.9.9' type='text/css' media='all' /><link rel='stylesheet' id='newsletter-css' href='wp-content/plugins/newsletter/stylefcc2.css?ver=5.7.9' type='text/css' media='all' /><link rel='stylesheet' id='js_composer_front-css' href='wp-content/plugins/js_composer/assets/css/js_composer.min24b2.css?ver=5.5.5' type='text/css' media='all' /><script type='text/javascript' src='wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script><script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script><script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min23da.js?ver=5.4.8'></script><script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min23da.js?ver=5.4.8'></script><script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script><script type='text/javascript'>
var wc_add_to_cart_params = {"ajax_url":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/beautyzone\/demo\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
</script><script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min9d52.js?ver=3.5.1'></script><script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart24b2.js?ver=5.5.5'></script><script type='text/javascript'>
var booked_wc_variables = {"prefix":"booked_wc_","ajaxurl":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","i18n_confirm_appt_edit":"Are you sure you want to change the appointment date? By doing so, the appointment date will need to be approved again.","i18n_pay":"Are you sure you want to add the appointment to cart and go to checkout?","i18n_mark_paid":"Are you sure you want to mark this appointment as \"Paid\"?","i18n_paid":"Paid","i18n_awaiting_payment":"Awaiting Payment","checkout_page":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/checkout\/"};
</script><script type='text/javascript' src='wp-content/plugins/booked-woocommerce-payments/js/frontend-functionsd87f.js?ver=4.9.9'></script><link rel='https://api.w.org/' href='wp-json/index.html' /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" /><link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" /> <meta name="generator" content="WordPress 4.9.9" /><meta name="generator" content="WooCommerce 3.5.1" /><link rel="canonical" href="index.html" /><link rel='shortlink' href='index.html' /><link rel="alternate" type="application/json+oembed" href="wp-json/oembed/1.0/embed315a.json?url=http%3A%2F%2Fdemos.casethemes.net%2Fbeautyzone%2Fdemo%2F" /><link rel="alternate" type="text/xml+oembed" href="wp-json/oembed/1.0/embed4b37?url=http%3A%2F%2Fdemos.casethemes.net%2Fbeautyzone%2Fdemo%2F&amp;format=xml" /><link rel="icon" type="image/png" href="wp-content/themes/beautyzone/assets/images/favicon.ico"/><noscript><style>.woocommerce-product-gallery{opacity:1 !important}</style></noscript><meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress."/><!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="http://demos.casethemes.net/beautyzone/demo/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]--><meta name="generator" content="Powered by Slider Revolution 5.4.8 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." /><script type="text/javascript">function setREVStartSize(e){try{ e.c=jQuery(e.c);var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
}catch(d){console.log("Failure at Presize of Slider:"+d)}};</script><style type="text/css" title="dynamic-css" class="options-output">.site-footer .top-footer{background-position:center top}a{color:#ff5ea5}a:hover{color:#e54d90}a:active{color:#e54d90}</style><style type="text/css" id="cms-page-dynamic-css">#content{padding-top:0;padding-bottom:0}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1538880710882{background-image:url(wp-content/uploads/2018/10/bg-transdc59.png?id=290) !important;background-position:center !important;background-repeat:no-repeat !important;background-size:cover !important}.vc_custom_1538791880181{background-image:url(http://demos.casethemes.net/beautyzone/demo/wp-content/uploads/2018/10/bg-parallax1.jpg?id=231) !important;background-position:center !important;background-repeat:no-repeat !important;background-size:cover !important}.vc_custom_1538882602722{background-image:url(http://demos.casethemes.net/beautyzone/demo/wp-content/uploads/2018/10/bg-portfolio.jpg?id=359) !important;background-position:center !important;background-repeat:no-repeat !important;background-size:cover !important}.vc_custom_1538800497675{background-color:rgba(0,0,0,0.8) !important;*background-color:rgb(0,0,0) !important}.vc_custom_1538834879315{background-image:url(http://demos.casethemes.net/beautyzone/demo/wp-content/uploads/2018/10/bg-trans.png?id=290) !important;background-position:center !important;background-repeat:no-repeat !important;background-size:cover !important}.vc_custom_1538834813103{background-image:url(http://demos.casethemes.net/beautyzone/demo/wp-content/uploads/2018/10/bg-trans.png?id=290) !important;background-position:center !important;background-repeat:no-repeat !important;background-size:cover !important}.vc_custom_1538844562085{padding-top:0px !important}.vc_custom_1538880664987{padding-top:80px !important;padding-bottom:80px !important}.vc_custom_1538880843054{padding-top:0px !important;padding-right:50px !important;padding-bottom:68px !important;padding-left:50px !important}.vc_custom_1538793413178{padding-top:90px !important;padding-bottom:120px !important}.vc_custom_1538844325130{padding-top:30px !important}.vc_custom_1538844331469{padding-top:30px !important}.vc_custom_1538844341959{padding-top:30px !important}.vc_custom_1538844351372{padding-top:30px !important}.vc_custom_1538882649855{padding-top:80px !important;padding-bottom:95px !important}.vc_custom_1538882864969{padding-top:0px !important;padding-right:50px !important;padding-bottom:22px !important;padding-left:50px !important}.vc_custom_1538801703166{padding-top:153px !important;padding-bottom:140px !important}.vc_custom_1538800572756{padding-top:0px !important;padding-right:0px !important;padding-bottom:50px !important;padding-left:0px !important}.vc_custom_1538794072383{padding-top:80px !important;padding-bottom:90px !important}.vc_custom_1538067333010{padding-top:0px !important;padding-right:50px !important;padding-bottom:50px !important;padding-left:50px !important}.vc_custom_1538839183877{padding-top:80px !important;padding-bottom:60px !important}.vc_custom_1538063128965{padding-top:0px !important;padding-right:50px !important;padding-left:50px !important}.vc_custom_1539253343034{padding-top:82px !important;padding-bottom:100px !important}.vc_custom_1538067333010{padding-top:0px !important;padding-right:50px !important;padding-bottom:50px !important;padding-left:50px !important}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible{opacity:1}</style></noscript></head><body class="home page-template-default page page-id-7 woocommerce-no-js woo-variation-swatches woo-variation-swatches-theme-beautyzone woo-variation-swatches-theme-child-beautyzone woo-variation-swatches-style-rounded woo-variation-swatches-attribute-behavior-blur woo-variation-swatches-tooltip-enabled woo-variation-swatches-stylesheet-enabled reduxon body-default-font heading-default-font visual-composer header-sticky wpb-js-composer js-comp-ver-5.5.5 vc_responsive"><div id="page" class="site"> <div id="ct-loadding" class="ct-loader style1"> <div class="loading-default"></div> </div>

<!-- Marquee Start -->

<b><font color = "red" size = "3"><marquee > 10% Off On Booking of Appoinment For Members of Salon 360 ERP. </marquee></b></font>

<!-- Marquee End -->

<header id="masthead" class="header-main"> <div id="header-wrap" class="header-layout1 fixed-height is-sticky"> <div id="header-top-bar"> <div class="container"> <div class="row"> <ul class="top-bar-contact"> <li><a href="tel:91 12345 67890"><i class="fa fa-phone"></i>+91 12345 67890</a></li> <li><a href="http://maps.google.com/?q=Surat, Gujarat, India" target="_blank"><i class="fa fa-map-marker"></i>Surat, Gujarat, India</a></li> </ul> 


<?php 

	if(!isset($_SESSION['uid']))
	{

?>

<div class="top-bar-social"><a href="login/index.php" >Login</a><a href="register/index.php" >Register Now</a></div>
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

<div class="header-menu-left"> <ul id="menu-left" class="primary-menu"><li id="menu-item-57" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home current-menu-ancestor current-menu-parent menu-item-57"><a href="index.php" class="no-one-page">Home</a></li>

<li id="menu-item-58" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-58"><a href="#" class="no-one-page">Pages</a><ul class="sub-menu"><li id="menu-item-42" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42"><a href="booking/appointment/index.php" class="no-one-page">Booking</a></li><li id="menu-item-49" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49"><a href="our-team/index.php" class="no-one-page">Our Team</a></li><li id="menu-item-47" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-47"><a href="login/index.php" class="no-one-page">Login</a></li><li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53"><a href="register/index.php" class="no-one-page">Register</a></li><li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53"><a href="about-us/index.php" class="no-one-page">About Us & Contact Us</a></li></ul></li>

<li id="menu-item-59" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-has-children menu-item-59"><a href="#" class="no-one-page">Our Services</a><ul class="sub-menu"><li id="menu-item-55" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-26 menu-item-55"><a href="services/index.php" class="no-one-page">Services</a></li><li id="menu-item-229" class="menu-item menu-item-type-post_type menu-item-object-service menu-item-229"><a href="service/haircut-styling/index.php" class="no-one-page">Services Details</a></li></ul></li></ul> </div> 

<div class="header-branding desktop"> <a class="logo-dark" href="../index.php" title="Salon 360 ERP" rel="home"><img src="logo.png" alt="Salon 360 ERP"/></a><a class="logo-light" href="../index.php" title="Salon 360 ERP" rel="home"><img src="../wp-content/themes/beautyzone/assets/images/logo.png" alt="Salon 360 ERP"/></a> </div> <div class="header-menu-right"> <ul id="menu-right" class="primary-menu"><li id="menu-item-61" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-61"><a href="our portfolio/index.php" class="no-one-page">Our Portfolio</a></li>

<li id="menu-item-448" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-448"><a href="#" class="no-one-page">Shopping</a><ul class="sub-menu"><li id="menu-item-481" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-481"><a href="shop/index.php" class="no-one-page">Shop</a></li><li id="menu-item-458" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-458"><a href="product/items/index.php" class="no-one-page">Product Details</a></li><li id="menu-item-451" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-451"><a href="cart/index.php" class="no-one-page">Cart</a></li><li id="menu-item-450" class="menu-item menu-item-type-post_type  menu-item-object-page menu-item-450"><a href="membership/index.php" class="no-one-page">Membership</a></li></ul></li>

<li id="menu-item-448" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-448"><a href="#" class="no-one-page">My Account</a><ul class="sub-menu"><li id="menu-item-481" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-481"><a href="my-profile/index.php" class="no-one-page">My Profile</a></li><li id="menu-item-458" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-458"><a href="change-password/index.php" class="no-one-page">Change Password</a></li><li id="menu-item-489" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-489"><a href="log-out/index.php" class="no-one-page">Log Out</a></li></ul></li></ul>

</div> </div> </div> </div> <div class="header-branding mobile"> <a class="logo-dark" href="../index.html" title="BeautyZone" rel="home"><img src="../wp-content/themes/beautyzone/assets/images/logo.png" alt="Logo Dark"/></a><a class="logo-light" href="../index.php" title="BeautyZone" rel="home"><img src="../wp-content/themes/beautyzone/assets/images/logo-light.png" alt="Logo Light"/></a> </div> <div class="menu-mobile-overlay"></div> </div> </div> <div id="main-menu-mobile"> <span class="btn-nav-mobile open-menu"> <span></span> </span> </div> </div> </div>

</header>
 
<div id="content" class="site-content"> <div class="content-inner"> <div class="container content-container"> <div class="row content-row"> <div id="primary" class="content-area content-full-width col-12"> <main id="main" class="site-main"> <article id="post-7" class="post-7 page type-page status-publish hentry"> <div class="entry-content clearfix"> <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding bg-image-ps-inherit"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1538844562085"><div class="wpb_wrapper"><link href="http://fonts.googleapis.com/css?family=Nunito:800%7COpen+Sans:400%7CMontserrat:400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">

<img id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" src="wp-content/uploads/2018/10/bg-slide1.jpg" alt="" title="bg-slide1" width="2000" height="767" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="110" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="off" class="rev-slidebg" data-no-retina><div class="tp-caption rev_group" id="slide-1-layer-1" data-x="['left','left','center','center']" data-hoffset="['30','30','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
data-width="['800','800','800','480']"
data-height="['343','293','180','130']"
data-whitespace="nowrap"
data-type="group"
data-responsive_offset="off"
data-responsive="off"
data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
data-margintop="[0,0,0,0]"
data-marginright="[0,0,0,0]"
data-marginbottom="[0,0,0,0]"
data-marginleft="[0,0,0,0]"
data-textAlign="['inherit','inherit','inherit','inherit']"
data-paddingtop="[0,0,0,0]"
data-paddingright="[0,0,0,0]"
data-paddingbottom="[0,0,0,0]"
data-paddingleft="[0,0,0,0]"
style="z-index: 5; min-width: 800px; max-width: 800px; max-width: 343px; max-width: 343px; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;"></div></li>
</ul><script>var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";if(htmlDiv) {htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;}else{var htmlDiv = document.createElement("div");htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
}</script><div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div></div><script>var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";if(htmlDiv) {htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;}else{var htmlDiv = document.createElement("div");htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
}</script><script type="text/javascript">if (setREVStartSize!==undefined) setREVStartSize(
{c: '#rev_slider_1_1', responsiveLevels: [1240,1024,778,480], gridwidth: [1200,1024,778,480], gridheight: [766,766,560,480], sliderLayout: 'fullwidth'});var revapi1,tpj;(function() {if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded",onLoad); else onLoad();function onLoad() {if (tpj===undefined) { tpj = jQuery; if("off" == "on") tpj.noConflict();}if(tpj("#rev_slider_1_1").revolution == undefined){revslider_showDoubleJqueryError("#rev_slider_1_1");}else{revapi1 = tpj("#rev_slider_1_1").show().revolution({sliderType:"standard",jsFileLocation:"//demos.casethemes.net/beautyzone/demo/wp-content/plugins/revslider/public/assets/js/",sliderLayout:"fullwidth",dottedOverlay:"none",delay:9000,navigation: {keyboardNavigation:"off",keyboard_direction: "horizontal",mouseScrollNavigation:"off",mouseScrollReverse:"default",onHoverStop:"off",arrows: {style:"custom",enable:true,hide_onmobile:false,hide_onleave:true,hide_delay:200,hide_delay_mobile:1200,tmp:'',left: {h_align:"left",v_align:"center",h_offset:10,v_offset:0
},right: {h_align:"right",v_align:"center",h_offset:10,v_offset:0
}}},responsiveLevels:[1240,1024,778,480],visibilityLevels:[1240,1024,778,480],gridwidth:[1200,1024,778,480],gridheight:[766,766,560,480],lazyType:"none",parallax: {type:"scroll",origo:"enterpoint",speed:400,speedbg:0,speedls:0,levels:[50,12,15,20,25,30,35,40,45,46,47,48,49,50,51,55],disable_onmobile:"on"
},shadow:0,spinner:"spinner0",stopLoop:"off",stopAfterLoops:-1,stopAtSlide:-1,shuffle:"off",autoHeight:"off",disableProgressBar:"on",hideThumbsOnMobile:"off",hideSliderAtLimit:0,hideCaptionAtLimit:0,hideAllCaptionAtLilmit:0,debugMode:false,fallbacks: {simplifyAll:"off",nextSlideOnWindowFocus:"off",disableFocusListener:false,}});}; 
}; 
}()); 
</script><script>var htmlDivCss = unescape(".custom.tparrows%20%7B%0A%09cursor%3Apointer%3B%0A%09background%3A%23000%3B%0A%09background%3Argba%280%2C0%2C0%2C0.5%29%3B%0A%09width%3A40px%3B%0A%09height%3A40px%3B%0A%09position%3Aabsolute%3B%0A%09display%3Ablock%3B%0A%09z-index%3A100%3B%0A%7D%0A.custom.tparrows%3Ahover%20%7B%0A%09background%3A%23000%3B%0A%7D%0A.custom.tparrows%3Abefore%20%7B%0A%09font-family%3A%20%22revicons%22%3B%0A%09font-size%3A15px%3B%0A%09color%3A%23fff%3B%0A%09display%3Ablock%3B%0A%09line-height%3A%2040px%3B%0A%09text-align%3A%20center%3B%0A%7D%0A.custom.tparrows.tp-leftarrow%3Abefore%20%7B%0A%09content%3A%20%22%5Ce824%22%3B%0A%7D%0A.custom.tparrows.tp-rightarrow%3Abefore%20%7B%0A%09content%3A%20%22%5Ce825%22%3B%0A%7D%0A%0A%0A");var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');if(htmlDiv) {htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;}else{var htmlDiv = document.createElement('div');htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
} </script></div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div>

<!-- Services Start -->

<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1538880710882 vc_row-has-fill bg-image-ps-center"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1538880664987"><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div><div class="wpb_column vc_column_container vc_col-sm-8 rm-padding-md"><div class="vc_column-inner vc_custom_1538880843054"><div class="wpb_wrapper"><div id="ct-heading" class="ct-heading align-center align-center-md align-center-sm align-center-xs "> <h3 class="ct-heading-tag " style="font-weight:800; "> Our Services </h3> <h6 class="ct-heading-sub" > You Will Like To Look Like Godess Every Day! </h6> <div class="ct-heading-separator"><i class="flaticon-spa"></i></div> <div class="ct-heading-desc" style=""></div> </div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div></div>

<div id="ct-service-carousel" class="ct-service-carousel layout2 owl-carousel nav-middle " data-item-xs=1 data-item-sm=3 data-item-md=4 data-item-lg=4 data-margin=30 data-loop=true data-autoplay=false data-autoplaytimeout=5000 data-smartspeed=250 data-center=false data-arrows=false data-bullets=true data-stagepadding=0 data-rtl=false data-item-xs-custom="2" > 

<?php 

	$query5 = mysql_query("select * from treatment_details");
	
	while($result5=mysql_fetch_array($query5))
	{
		$treatment_name = $result5['treatment_name'];
			
		$query6 = mysql_query("select * from gallery where image_type = '$treatment_name' ");
	
		$result6=mysql_fetch_array($query6);		

?>


<div class="ct-carousel-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="item-featured"> 

<img class="" src="our portfolio/gallery/<?php echo $result6['salon_pics']; ?>" width="500" height="500" alt="<?php echo $result5['treatment_name']; ?>" title="<?php echo $result5['treatment_name']; ?>" /></a> 

<div class="item-icon"> <i class="flaticon-lotus"></i> </div> 

</div> <div class="item-holder"> <div class="item-meta"><h3 class="item-title"> </h3> </div> </div> </div> </div> 

<?php
	
	}
	
?>  

</div><div class="vc_empty_space" style="height: 38px" ><span class="vc_empty_space_inner"></span></div><div class="ct-button-wrapper align-center align-center-md align-center-sm align-center-xs wpb_animate_when_almost_visible wpb_fadeInUp fadeInUp"> <a href="services/index.php" target="_self" class="btn btn-outline size-default"> <span>See all Services</span> </a></div></div></div></div></div>

<!-- Services End -->

<!-- Gallery -->

<div class="vc_row-full-width vc_clearfix"></div><div class="vc_row wpb_row vc_row-fluid bg-image-ps-inherit"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1538834974217"><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div><div class="wpb_column vc_column_container vc_col-sm-8 rm-padding-md"><div class="vc_column-inner vc_custom_1538063128965"><div class="wpb_wrapper"><div id="ct-heading-2" class="ct-heading align-center align-center-md align-center-sm align-center-xs "> <h3 class="ct-heading-tag" > Our Portfolio </h3> <div class="ct-heading-separator"><i class="flaticon-spa"></i></div>
<div class="grid-filter-wrap align-center"> 

<span class="filter-item active" data-filter="*">All</span> 

<?php

	$query7 = mysql_query("select * from treatment_details");
	
	while($result7 = mysql_fetch_array($query7))
	{
?>

<span class="filter-item"> <?php echo $result7['treatment_name']; ?>  </span> 

<?php
	
	}
	
?>

</div> 

</div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div></div><div class="vc_empty_space" style="height: 10px" ><span class="vc_empty_space_inner"></span></div><div class="vc_row wpb_row vc_inner vc_row-fluid">

<?php

	$query = mysql_query("select * from gallery where image_id between 1 and 4");
	
	while($result = mysql_fetch_array($query))
	{
?>

<div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-3 vc_col-md-3 wpb_animate_when_almost_visible wpb_fadeInRight fadeInRight"><div class="vc_column-inner vc_custom_1538844072775"><div class="wpb_wrapper"><div class="ct-team-member-default "> <div class="ct-team-member-inner clearfix"> <div class="ct-team-member-image"> <img class="" src="our portfolio/gallery/<?php echo $result['salon_pics']; ?>" width="500" height="500" alt="<?php echo $result['image_name']; ?>" title="<?php echo $result['image_name']; ?>" /> </div> <div class="ct-team-member-content"> <h3 class="ct-team-member-title"> <?php echo $result['image_name']; ?> </div> </div></div></div></div></div>

<?php

	}

?>

<div class="ct-button-wrapper align-center align-center-md align-center-sm align-center-xs wpb_animate_when_almost_visible wpb_fadeInUp fadeInUp"> <a href="our portfolio/index.php" target="_self" class="btn btn-outline size-default" style="margin-top:25px;"> <span>See Gallery</span> </a></div>

</div></div></div></div></div> 

<!-- Gallery End -->

<!-- Video -->

<div class="vc_row-full-width vc_clearfix" style="margin-top:125px;"></div><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="1.5" data-vc-parallax-image="http://demos.casethemes.net/beautyzone/demo/wp-content/uploads/2018/10/bg-parallax1-1.jpg" class="vc_row wpb_row vc_row-fluid vc_custom_1538800497675 vc_row-has-fill vc_general vc_parallax vc_parallax-content-moving row-overlay bg-image-ps-inherit"><div data-vc-parallax="1.5" class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill vc_general vc_parallax vc_parallax-content-moving"><div class="vc_column-inner vc_custom_1538801703166"><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div><div class="wpb_column vc_column_container vc_col-sm-8 rm-padding-md"><div class="vc_column-inner vc_custom_1538800572756"><div class="wpb_wrapper"><div id="ct-heading-3" class="ct-heading align-center align-center-md align-center-sm align-center-xs "> <h3 class="ct-heading-tag " style="margin-bottom:31px;color:#ffffff;font-weight:800; "> Video Presentation </h3> <div class="ct-heading-desc" style="color:#ffffff;">In this video, our staff members tell about their work at Solari, how they achieve the best results for their clients every day and more. Click the Play button below to watch this presentation.</div> </div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div></div><div id="ct-video" class="ct-video-wrapper "> <div class="ct-video-inner"> 

<?php  
	/*$query1 = mysql_query("select * from gallery where ");

	while($result1 = mysql_fetch_array($query1))
	{
		*/
?>

<a class="ct-video-button" href="images/Salon Video.mp4"> <i class="ti-control-play"></i> </a>

<?php 

	// }

?>

</div></div></div></div></div></div>

<!-- Video End -->

<!-- Staff -->

<div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1538834879315 vc_row-has-fill bg-image-ps-center"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1538794072383"><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div><div class="wpb_column vc_column_container vc_col-sm-8 rm-padding-md"><div class="vc_column-inner vc_custom_1538067333010"><div class="wpb_wrapper"><div id="ct-heading-4" class="ct-heading align-center align-center-md align-center-sm align-center-xs "> <h3 class="ct-heading-tag " > Our Professional Team </h3> <div class="ct-heading-separator"><i class="flaticon-spa"></i></div> <div class="ct-heading-desc" style=""></div> </div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div></div><div class="ct-team-carousel-wrap"> <div id="ct-team-carousel" class="ct-team-carousel default owl-carousel nav-middle wpb_animate_when_almost_visible wpb_fadeIn fadeIn" data-item-xs=1 data-item-sm=3 data-item-md=5 data-item-lg=5 data-margin=30 data-loop=true data-autoplay=true data-autoplaytimeout=5000 data-smartspeed=250 data-center=true data-arrows=true data-bullets=true data-stagepadding=0 data-rtl=false > 

<?php
		
	$query4 = mysql_query("select * from staff");
	
	while($result4 = mysql_fetch_array($query4))
	{
?>

<div class="ct-team-item"> <div class="ct-team-item-inner"> <div class="team-featured"> 

<img class="" src="our-team/gallery/<?php echo $result4['staff_pic']; ?>" width="470" height="500" alt="<?php echo $result4['staff_name']; ?>" title="<?php echo $result4['staff_name']; ?>" /> <div class="team-social-wrap"> <div class="team-social"> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-facebook"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-twitter"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-instagram"></i></a> </div> </div> </div> <div class="team-holder"> <h3 class="team-title"> <?php echo $result4['staff_name']; ?> </h3> <span class="team-position"> <?php echo 'Have Specialization In : '. $result4['staff_specialization']; ?> </span> </div> </div> </div> 

<?php

	}

?> 

</div></div></div></div></div></div>

<!-- Staff End -->

<!-- Client Feedback-->

<div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="1.3" data-vc-parallax-image="wp-content/uploads/2018/10/bg-parallax2.jpg" class="vc_row wpb_row vc_row-fluid vc_row-has-fill vc_general vc_parallax vc_parallax-content-moving bg-image-ps-inherit"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1538839183877"><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div><div class="wpb_column vc_column_container vc_col-sm-8 rm-padding-md"><div class="vc_column-inner vc_custom_1538063128965"><div class="wpb_wrapper"><div id="ct-heading-5" class="ct-heading align-center align-center-md align-center-sm align-center-xs "> <h3 class="ct-heading-tag " style="font-weight:800; "> Testimonials Of Our Clients </h3> <div class="ct-heading-separator"><i class="flaticon-spa"></i></div> <div class="ct-heading-desc" style=""></div> </div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div></div><div class="vc_empty_space" style="height: 45px" ><span class="vc_empty_space_inner"></span></div> <div id="ct-testimonial-carousel" class="ct-testimonial-carousel default owl-carousel nav-middle " data-item-xs=1 data-item-sm=2 data-item-md=3 data-item-lg=3 data-margin=30 data-loop=true data-autoplay=true data-autoplaytimeout=5000 data-smartspeed=250 data-center=false data-arrows=true data-bullets=true data-stagepadding=0 data-rtl=false data-item-xs-custom="2" > 

<?php 

	$query3 = mysql_query("select * from feedback,staff,user where feedback.staff_id = staff.staff_id && feedback.user_id = user.user_id");
	
	while($result3 = mysql_fetch_array($query3))
	{
			
?>

<div class="ct-testimonial-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="testimonial-featured"> <img class="" src="register/pics/<?php echo $result3['user_pic']; ?>" width="100" height="100" alt="<?php echo $result3['user_name']; ?>" title="<?php echo $result3['user_name']; ?>" /> </div> <div class="testimonial-description"><?php echo $result3['user_name']; ?></div> <h3 class="testimonial-title"> <?php echo $result3['feedback']; ?> </h3> <div class="testimonial-position"> <?php echo 'About Staff : '.$result3['staff_name']; ?></div> </div> </div> 

<?php
	
	}
?>

</div></div></div></div></div>

<!-- Client Feedback End-->
<div class="vc_row-full-width vc_clearfix"></div> </div> </article> </main> </div> </div> </div></div></div><footer id="colophon" class="site-footer footer-layout1"> <div class="top-gallery"> <div class="ct-carousel owl-carousel images-light-box-carousel" data-item-xs="4" data-item-sm="6" data-item-md="8" data-item-lg="10" data-margin="0" data-loop="true" data-autoplay="true" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="false" data-bullets="false" data-stagepadding="0" data-stagepaddingsm="0" data-rtl="false"> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic1.jpg"><img src="wp-content/uploads/2018/09/pic1.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic2.jpg"><img src="wp-content/uploads/2018/09/pic2.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic3.jpg"><img src="wp-content/uploads/2018/09/pic3.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic4.jpg"><img src="wp-content/uploads/2018/09/pic4.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic5.jpg"><img src="wp-content/uploads/2018/09/pic5.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic6.jpg"><img src="wp-content/uploads/2018/09/pic6.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic7.jpg"><img src="wp-content/uploads/2018/09/pic7.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic8.jpg"><img src="wp-content/uploads/2018/09/pic8.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic9.jpg"><img src="wp-content/uploads/2018/09/pic9.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic10.jpg"><img src="wp-content/uploads/2018/09/pic10.jpg" alt=""></a> </div> </div> </div> 

<div class="top-footer bg-image bg-overlay column-width"> <div class="container"> <div class="row"> <div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <section id="nav_menu-2" class="widget widget_nav_menu"><h2 class="footer-widget-title">Salon 360 ERP</h2><div class="menu-menu-company-container"><ul id="menu-menu-company" class="menu"><li id="menu-item-69" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-69"><a href="index.php" class="no-one-page">Home</a></li><li id="menu-item-70" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-70"><a href="our portfolio/index.php" class="no-one-page">Our Portfolio</a></li><li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="our-team/index.php" class="no-one-page">Our Team</a></li><li id="menu-item-72" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-72"><a href="booking/appointment/index.php" class="no-one-page">Booking</a></li><li id="menu-item-73" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-73"><a href="membership/index.php" class="no-one-page">Membership</a></li></ul></div></section></div><div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <section id="nav_menu-3" class="widget widget_nav_menu"><h2 class="footer-widget-title">Useful Links</h2><div class="menu-menu-useful-link-container"><ul id="menu-menu-useful-link" class="menu"><li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79"><a href="shop/index.php" class="no-one-page">Shop</a></li><li id="menu-item-78" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78"><a href="services/index.php" class="no-one-page">Services</a></li><li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80"><a href="cart/index.php" class="no-one-page">Cart</a></li><li id="menu-item-82" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82"><a href="login/index.php" class="no-one-page">Login</a></li><li id="menu-item-81" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-81"><a href="register/index.php" class="no-one-page">Register</a></li></ul></div></section></div><div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <div class="contact-info widget"> <h3 class="footer-widget-title">Contact us</h3> <ul class="ct-contact-info-inner"> <li> <i class="ti-location-pin"></i> <label>Address</label> <span>Surat, Gujarat, India.</span> </li> <li> <i class="ti-mobile"></i> <label>Phone</label> <span>+91 12345 67890 (24/7 Support Line)</span> </li> <li> <i class="ti-email"></i> <label>Email</label> <span>salon360erp@gmail.com</span> </li> </ul> </div> </div><div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <section id="newsletterwidget-2" class="mb-20 widget widget_newsletterwidget"><h2 class="footer-widget-title">Any Query?</h2>If you have any questions, you can contact with us so that we can give you a satisfying answer. Send us E-mail at salon360erp@gmail.com We'll reply you as soon as possible.<div class="tnp tnp-widget"></div></section></div> </div> </div> </div> <a href="#" class="ct-scroll-top fixed-bottom"><i class="zmdi zmdi-chevron-up"></i></a></footer> <a href="#" class="ct-scroll-top"> <i class="ti-angle-up"></i> </a></div><div id="yith-quick-view-modal"><div class="yith-quick-view-overlay"></div><div class="yith-wcqv-wrapper"><div class="yith-wcqv-main"><div class="yith-wcqv-head"><a href="#" id="yith-quick-view-close" class="yith-wcqv-close">X</a></div><div id="yith-quick-view-content" class="woocommerce single-product"></div></div></div></div><script type="text/javascript">var c = document.body.className;c = c.replace(/woocommerce-no-js/, 'woocommerce-js');document.body.className = c;</script><script type="text/javascript">function revslider_showDoubleJqueryError(sliderID) {var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";jQuery(sliderID).show().html(errorMessage);}</script><div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button><button class="pswp__button pswp__button--share" aria-label="Share"></button><button class="pswp__button pswp__button--fs" aria-label="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" aria-label="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" aria-label="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div><script type="text/template" id="tmpl-variation-template"><div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div><div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div><div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div></script><script type="text/template" id="tmpl-unavailable-variation-template"><p>Sorry, this product is unavailable. Please choose a different combination.</p></script><link rel='stylesheet' id='animate-css-css' href='wp-content/plugins/js_composer/assets/lib/bower/animate-css/animate.min24b2.css?ver=5.5.5' type='text/css' media='all' /><link rel='stylesheet' id='inline-style-css' href='wp-content/themes/beautyzone/assets/css/inline-styled87f.css?ver=4.9.9' type='text/css' media='all' /><style id='inline-style-inline-css' type='text/css'> #ct-portfolio-grid .ct-grid-inner{margin:0 -15px}#ct-portfolio-grid .ct-grid-inner .grid-item,#ct-portfolio-grid .ct-grid-inner .grid-sizer{padding:15px}</style><link rel='stylesheet' id='photoswipe-css' href='wp-content/plugins/woocommerce/assets/css/photoswipe/photoswipe9d52.css?ver=3.5.1' type='text/css' media='all' /><link rel='stylesheet' id='photoswipe-default-skin-css' href='wp-content/plugins/woocommerce/assets/css/photoswipe/default-skin/default-skin9d52.css?ver=3.5.1' type='text/css' media='all' /><script type='text/javascript' src='wp-includes/js/jquery/ui/core.mine899.js?ver=1.11.4'></script><script type='text/javascript' src='wp-includes/js/jquery/ui/datepicker.mine899.js?ver=1.11.4'></script><script type='text/javascript'>jQuery(document).ready(function(jQuery){jQuery.datepicker.setDefaults({"closeText":"Close","currentText":"Today","monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Previous","dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"dateFormat":"MM d, yy","firstDay":1,"isRTL":false});});</script><script type='text/javascript' src='wp-content/plugins/booked/assets/js/spin.min7406.js?ver=2.0.1'></script><script type='text/javascript' src='wp-content/plugins/booked/assets/js/spin.jquery7406.js?ver=2.0.1'></script><script type='text/javascript' src='wp-content/plugins/booked/assets/js/tooltipster/js/jquery.tooltipster.min9b70.js?ver=3.3.0'></script><script type='text/javascript'>
<div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div></div><div class="ct-team-carousel-wrap"> <div id="ct-team-carousel" class="ct-team-carousel default owl-carousel nav-middle wpb_animate_when_almost_visible wpb_fadeIn fadeIn" data-item-xs=1 data-item-sm=3 data-item-md=5 data-item-lg=5 data-margin=30 data-loop=true data-autoplay=true data-autoplaytimeout=5000 data-smartspeed=250 data-center=true data-arrows=true data-bullets=true data-stagepadding=0 data-rtl=false > <div class="ct-team-item"> <div class="ct-team-item-inner"> <div class="team-featured"> <img class="" src="wp-content/uploads/2018/10/team1-470x500.jpg" width="470" height="500" alt="team1" title="team1" /> <div class="team-social-wrap"> <div class="team-social"> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-facebook"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-twitter"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-instagram"></i></a> </div> </div> </div> <div class="team-holder"> <h3 class="team-title"> Carol Oliver </h3> <span class="team-position"> Cosmetologist </span> </div> </div> </div> <div class="ct-team-item"> <div class="ct-team-item-inner"> <div class="team-featured"> <img class="" src="wp-content/uploads/2018/10/team2-470x500.jpg" width="470" height="500" alt="team2" title="team2" /> <div class="team-social-wrap"> <div class="team-social"> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-facebook"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-twitter"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-instagram"></i></a> </div> </div> </div> <div class="team-holder"> <h3 class="team-title"> Sandra Kinder </h3> <span class="team-position"> Cosmetologist </span> </div> </div> </div> <div class="ct-team-item"> <div class="ct-team-item-inner"> <div class="team-featured"> <img class="" src="wp-content/uploads/2018/10/team3-470x500.jpg" width="470" height="500" alt="team3" title="team3" /> <div class="team-social-wrap"> <div class="team-social"> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-facebook"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-twitter"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-instagram"></i></a> </div> </div> </div> <div class="team-holder"> <h3 class="team-title"> Paul Brennan </h3> <span class="team-position"> Cosmetologist </span> </div> </div> </div> <div class="ct-team-item"> <div class="ct-team-item-inner"> <div class="team-featured"> <img class="" src="wp-content/uploads/2018/10/team4-470x500.jpg" width="470" height="500" alt="team4" title="team4" /> <div class="team-social-wrap"> <div class="team-social"> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-facebook"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-twitter"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-instagram"></i></a> </div> </div> </div> <div class="team-holder"> <h3 class="team-title"> Bill Thompson </h3> <span class="team-position"> Cosmetologist </span> </div> </div> </div> <div class="ct-team-item"> <div class="ct-team-item-inner"> <div class="team-featured"> <img class="" src="wp-content/uploads/2018/10/team5-470x500.jpg" width="470" height="500" alt="team5" title="team5" /> <div class="team-social-wrap"> <div class="team-social"> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-facebook"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-twitter"></i></a> <a class="hover-effect" href="#" target="_blank"><i class="fa fa-instagram"></i></a> </div> </div> </div> <div class="team-holder"> <h3 class="team-title"> Michelle Bailey </h3> <span class="team-position"> Cosmetologist </span> </div> </div> </div> </div></div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="1.3" data-vc-parallax-image="http://demos.casethemes.net/beautyzone/demo/wp-content/uploads/2018/10/bg-parallax2.jpg" class="vc_row wpb_row vc_row-fluid vc_row-has-fill vc_general vc_parallax vc_parallax-content-moving bg-image-ps-inherit"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1538839183877"><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div><div class="wpb_column vc_column_container vc_col-sm-8 rm-padding-md"><div class="vc_column-inner vc_custom_1538063128965"><div class="wpb_wrapper"><div id="ct-heading-5" class="ct-heading align-center align-center-md align-center-sm align-center-xs "> <h3 class="ct-heading-tag " style="font-weight:800; "> Testimonials Of Our Clients </h3> <div class="ct-heading-separator"><i class="flaticon-spa"></i></div> <div class="ct-heading-desc" style="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</div> </div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div></div><div class="vc_empty_space" style="height: 45px" ><span class="vc_empty_space_inner"></span></div> <div id="ct-testimonial-carousel" class="ct-testimonial-carousel default owl-carousel nav-middle " data-item-xs=1 data-item-sm=2 data-item-md=3 data-item-lg=3 data-margin=30 data-loop=true data-autoplay=true data-autoplaytimeout=5000 data-smartspeed=250 data-center=false data-arrows=true data-bullets=true data-stagepadding=0 data-rtl=false data-item-xs-custom="2" > <div class="ct-testimonial-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="testimonial-featured"> <img class="" src="wp-content/uploads/2018/09/author1-2.jpg" width="100" height="100" alt="author1" title="author1" /> </div> <div class="testimonial-description">BeautyZone was extremely creative and forward thinking. They are also very quick and efficient when executing changes for us.</div> <h3 class="testimonial-title"> Joanna Wang </h3> <div class="testimonial-position"> Student </div> </div> </div> <div class="ct-testimonial-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="testimonial-featured"> <img class="" src="wp-content/uploads/2018/09/author2-2.jpg" width="100" height="100" alt="author2" title="author2" /> </div> <div class="testimonial-description">BeautyZone was extremely creative and forward thinking. They are also very quick and efficient when executing changes for us.</div> <h3 class="testimonial-title"> Espen Brunberg </h3> <div class="testimonial-position"> Student </div> </div> </div> <div class="ct-testimonial-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="testimonial-featured"> <img class="" src="wp-content/uploads/2018/09/author3-2.jpg" width="100" height="100" alt="author3" title="author3" /> </div> <div class="testimonial-description">BeautyZone was extremely creative and forward thinking. They are also very quick and efficient when executing changes for us.</div> <h3 class="testimonial-title"> John Doe </h3> <div class="testimonial-position"> Student </div> </div> </div> <div class="ct-testimonial-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="testimonial-featured"> <img class="" src="wp-content/uploads/2018/09/author1-2.jpg" width="100" height="100" alt="author1" title="author1" /> </div> <div class="testimonial-description">BeautyZone was extremely creative and forward thinking. They are also very quick and efficient when executing changes for us.</div> <h3 class="testimonial-title"> Joanna Wang </h3> <div class="testimonial-position"> Student </div> </div> </div> <div class="ct-testimonial-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="testimonial-featured"> <img class="" src="wp-content/uploads/2018/09/author2-2.jpg" width="100" height="100" alt="author2" title="author2" /> </div> <div class="testimonial-description">BeautyZone was extremely creative and forward thinking. They are also very quick and efficient when executing changes for us.</div> <h3 class="testimonial-title"> Espen Brunberg </h3> <div class="testimonial-position"> Student </div> </div> </div> <div class="ct-testimonial-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="testimonial-featured"> <img class="" src="wp-content/uploads/2018/09/author3-2.jpg" width="100" height="100" alt="author3" title="author3" /> </div> <div class="testimonial-description">BeautyZone was extremely creative and forward thinking. They are also very quick and efficient when executing changes for us.</div> <h3 class="testimonial-title"> John Doe </h3> <div class="testimonial-position"> Student </div> </div> </div> </div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1538834813103 vc_row-has-fill bg-image-ps-center"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1539253343034"><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div><div class="wpb_column vc_column_container vc_col-sm-8 rm-padding-md"><div class="vc_column-inner vc_custom_1538067333010"><div class="wpb_wrapper"><div id="ct-heading-6" class="ct-heading align-center align-center-md align-center-sm align-center-xs "> <h3 class="ct-heading-tag " > Our Latest Blog </h3> <div class="ct-heading-separator"><i class="flaticon-spa"></i></div> <div class="ct-heading-desc" style="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</div> </div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-2"><div class="vc_column-inner"><div class="wpb_wrapper"></div></div></div></div><div id="ct-blog-carousel" class="ct-blog-carousel layout2 ct-grid-blog-layout1 owl-carousel nav-middle " data-item-xs=1 data-item-sm=2 data-item-md=3 data-item-lg=3 data-margin=30 data-loop=true data-autoplay=false data-autoplaytimeout=5000 data-smartspeed=250 data-center=false data-arrows=true data-bullets=false data-stagepadding=0 data-rtl=false > <div class="ct-carousel-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="item-featured"> <a href="10-spas-in-ireland-to-get-pregnancy-spa-treatments/index.html"> <img class="" src="wp-content/uploads/2018/09/blog4-1-600x429.jpg" width="600" height="429" alt="10 Spas in Ireland to Get Pregnancy Spa Treatments" title="blog4" /> </a> </div> <div class="item-body"> <ul class="item-meta"> <li>September 24, 2018</li> <li> <a class="item-comment" href="10-spas-in-ireland-to-get-pregnancy-spa-treatments/index.html">3 Comments</a> </li> </ul> <h3 class="item-title" style=""> <a href="10-spas-in-ireland-to-get-pregnancy-spa-treatments/index.html">10 Spas in Ireland to Get Pregnancy Spa Treatments</a> </h3> <div class="item-readmore"> <a href="10-spas-in-ireland-to-get-pregnancy-spa-treatments/index.html">Read More</a> </div> </div> </div> </div> <div class="ct-carousel-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="item-featured"> <a href="christmas-customer-event-chill-spa-at-the-ice-house/index.html"> <img class="" src="wp-content/uploads/2018/09/blog3-1-600x429.jpg" width="600" height="429" alt="Christmas Customer Event Chill Spa at the Ice House" title="blog3" /> </a> </div> <div class="item-body"> <ul class="item-meta"> <li>September 24, 2018</li> <li> <a class="item-comment" href="christmas-customer-event-chill-spa-at-the-ice-house/index.html">3 Comments</a> </li> </ul> <h3 class="item-title" style=""> <a href="christmas-customer-event-chill-spa-at-the-ice-house/index.html">Christmas Customer Event Chill Spa at the Ice House</a> </h3> <div class="item-readmore"> <a href="christmas-customer-event-chill-spa-at-the-ice-house/index.html">Read More</a> </div> </div> </div> </div> <div class="ct-carousel-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="item-featured"> <a href="an-evening-with-kayla-ieva-on-all-things-pregnancy/index.html"> <img class="" src="wp-content/uploads/2018/09/blog2-1-600x429.jpg" width="600" height="429" alt="An Evening with Kayla &amp; Ieva on all things Pregnancy" title="blog2" /> </a> </div> <div class="item-body"> <ul class="item-meta"> <li>September 24, 2018</li> <li> <a class="item-comment" href="an-evening-with-kayla-ieva-on-all-things-pregnancy/index.html">3 Comments</a> </li> </ul> <h3 class="item-title" style=""> <a href="an-evening-with-kayla-ieva-on-all-things-pregnancy/index.html">An Evening with Kayla &#038; Ieva on all things Pregnancy</a> </h3> <div class="item-readmore"> <a href="an-evening-with-kayla-ieva-on-all-things-pregnancy/index.html">Read More</a> </div> </div> </div> </div> <div class="ct-carousel-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="item-featured"> <a href="spring-is-in-the-air-and-and-so-our-these-amazing-spa-offers/index.html"> <img class="" src="wp-content/uploads/2018/09/blog1-1-600x429.jpg" width="600" height="429" alt="Spring is in the Air and and So Our These Amazing Spa Offers" title="blog1" /> </a> </div> <div class="item-body"> <ul class="item-meta"> <li>September 24, 2018</li> <li> <a class="item-comment" href="spring-is-in-the-air-and-and-so-our-these-amazing-spa-offers/index.html">3 Comments</a> </li> </ul> <h3 class="item-title" style=""> <a href="spring-is-in-the-air-and-and-so-our-these-amazing-spa-offers/index.html">Spring is in the Air and and So Our These Amazing</a> </h3> <div class="item-readmore"> <a href="spring-is-in-the-air-and-and-so-our-these-amazing-spa-offers/index.html">Read More</a> </div> </div> </div> </div> <div class="ct-carousel-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="item-featured"> <a href="the-correct-order-to-apply-your-skincare-products/index.html"> <img class="" src="wp-content/uploads/2018/09/blog5-1-600x429.jpg" width="600" height="429" alt="The Correct Order to Apply Your Skincare Products" title="blog5" /> </a> </div> <div class="item-body"> <ul class="item-meta"> <li>September 22, 2018</li> <li> <a class="item-comment" href="the-correct-order-to-apply-your-skincare-products/index.html">3 Comments</a> </li> </ul> <h3 class="item-title" style=""> <a href="the-correct-order-to-apply-your-skincare-products/index.html">The Correct Order to Apply Your Skincare Products</a> </h3> <div class="item-readmore"> <a href="the-correct-order-to-apply-your-skincare-products/index.html">Read More</a> </div> </div> </div> </div> <div class="ct-carousel-item"> <div class="grid-item-inner wpb_animate_when_almost_visible wpb_fadeIn fadeIn"> <div class="item-featured"> <a href="4-healthy-breakfasts-you-can-make-the-night-before/index.html"> <img class="" src="wp-content/uploads/2018/09/blog8-600x429.jpg" width="600" height="429" alt="4 Healthy Breakfasts You Can Make The Night Before" title="blog8" /> </a> </div> <div class="item-body"> <ul class="item-meta"> <li>September 21, 2018</li> <li> <a class="item-comment" href="4-healthy-breakfasts-you-can-make-the-night-before/index.html">3 Comments</a> </li> </ul> <h3 class="item-title" style=""> <a href="4-healthy-breakfasts-you-can-make-the-night-before/index.html">4 Healthy Breakfasts You Can Make The Night Before</a> </h3> <div class="item-readmore"> <a href="4-healthy-breakfasts-you-can-make-the-night-before/index.html">Read More</a> </div> </div> </div> </div> </div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div> </div> </article> </main> </div> </div> </div></div></div><footer id="colophon" class="site-footer footer-layout1"> <div class="top-gallery"> <div class="ct-carousel owl-carousel images-light-box-carousel" data-item-xs="4" data-item-sm="6" data-item-md="8" data-item-lg="10" data-margin="0" data-loop="true" data-autoplay="true" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="false" data-bullets="false" data-stagepadding="0" data-stagepaddingsm="0" data-rtl="false"> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic1.jpg"><img src="wp-content/uploads/2018/09/pic1.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic2.jpg"><img src="wp-content/uploads/2018/09/pic2.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic3.jpg"><img src="wp-content/uploads/2018/09/pic3.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic4.jpg"><img src="wp-content/uploads/2018/09/pic4.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic5.jpg"><img src="wp-content/uploads/2018/09/pic5.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic6.jpg"><img src="wp-content/uploads/2018/09/pic6.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic7.jpg"><img src="wp-content/uploads/2018/09/pic7.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic8.jpg"><img src="wp-content/uploads/2018/09/pic8.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic9.jpg"><img src="wp-content/uploads/2018/09/pic9.jpg" alt=""></a> </div> <div class="ct-carousel-item"> <a class="light-box" href="wp-content/uploads/2018/09/pic10.jpg"><img src="wp-content/uploads/2018/09/pic10.jpg" alt=""></a> </div> </div> </div> <div class="top-footer bg-image bg-overlay column-width"> <div class="container"> <div class="row"> <div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <section id="nav_menu-2" class="widget widget_nav_menu"><h2 class="footer-widget-title">Salon 360 ERP</h2><div class="menu-menu-company-container"><ul id="menu-menu-company" class="menu"><li id="menu-item-69" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7 current_page_item menu-item-69"><a href="index.php" class="no-one-page">Home</a></li><li id="menu-item-70" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-70"><a href="services/index.php" class="no-one-page">Services</a></li><li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="our-team/index.php" class="no-one-page">Our Team</a></li><li id="menu-item-72" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-72"><a href="booking/appointment/index.php" class="no-one-page">Booking</a></li><li id="menu-item-73" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-73"><a href="contact-us/index.php" class="no-one-page">Contact Us</a></li></ul></div></section></div><div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <section id="nav_menu-3" class="widget widget_nav_menu"><h2 class="footer-widget-title">Useful Links</h2><div class="menu-menu-useful-link-container"><ul id="menu-menu-useful-link" class="menu"><li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79"><a href="shop/index.php" class="no-one-page">Shop</a></li><li id="menu-item-78" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78"><a href="checkout/index.php" class="no-one-page">Checkout</a></li><li id="menu-item-80" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80"><a href="cart/index.php" class="no-one-page">Cart</a></li><li id="menu-item-82" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82"><a href="login/index.php" class="no-one-page">Login</a></li><li id="menu-item-81" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-81"><a href="register/index.php" class="no-one-page">Register</a></li></ul></div></section></div><div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <div class="contact-info widget"> <h3 class="footer-widget-title">Contact us</h3> <ul class="ct-contact-info-inner"> <li> <i class="ti-location-pin"></i> <label>Address</label> <span>Surat, Gujarat, India.</span> </li> <li> <i class="ti-mobile"></i> <label>Phone</label> <span>+91 12345 67890 (24/7 Support Line)</span> </li> <li> <i class="ti-email"></i> <label>Email</label> <span>salon360erp@gmail.com</span> </li> </ul> </div> </div><div class="ct-footer-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12"> <section id="newsletterwidget-2" class="mb-20 widget widget_newsletterwidget"><h2 class="footer-widget-title">Subscribe To Our Newsletter</h2>If you have any questions, you can contact with us so that we can give you a satisfying answer. Subscribe to our newsletter to get our latest products.<div class="tnp tnp-widget"></div></section><section id="cs_social_widget-2" class="widget widget_cs_social_widget"><ul class='ct-social'><li><a class="hover-effect social-facebook" target="_blank" href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a></li><li><a class="hover-effect social-twitter" target="_blank" href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a></li><li><a class="hover-effect social-google" target="_blank" href="#"><i class="fa fa-google-plus"></i><span>Google+</span></a></li><li><a class="hover-effect social-linkedin" target="_blank" href="#"><i class="fa fa-linkedin"></i><span>Linkedin</span></a></li><li><a class="hover-effect social-instagram" target="_blank" href="#"><i class="fa fa-instagram"></i><span>Instagram</span></a></li></ul></section></div> </div> </div> </div> <div class="bottom-footer"> <div class="container"> <div class="bf-gap"></div> <div class="row"> <div class="bottom-col bottom-copyright text-left-lg text-center"> Copyright &copy; 2019. BeautyZone by <a target="_blank" href="https://themeforest.net/user/dexignzone/portfolio">DexignZone</a> </div> <div class="bottom-col bottom-menu text-right-lg text-center"> <ul id="footer-menu" class="footer-menu"><li id="menu-item-83" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-83"><a href="#" class="no-one-page">Help Desk</a></li><li id="menu-item-84" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-84"><a href="#" class="no-one-page">Privacy Policy</a></li></ul> </div> </div> </div> </div> <a href="#" class="ct-scroll-top fixed-bottom"><i class="zmdi zmdi-chevron-up"></i></a></footer> <a href="#" class="ct-scroll-top"> <i class="ti-angle-up"></i> </a></div><div id="yith-quick-view-modal"><div class="yith-quick-view-overlay"></div><div class="yith-wcqv-wrapper"><div class="yith-wcqv-main"><div class="yith-wcqv-head"><a href="#" id="yith-quick-view-close" class="yith-wcqv-close">X</a></div><div id="yith-quick-view-content" class="woocommerce single-product"></div></div></div></div><script type="text/javascript">var c = document.body.className;c = c.replace(/woocommerce-no-js/, 'woocommerce-js');document.body.className = c;</script><script type="text/javascript">function revslider_showDoubleJqueryError(sliderID) {var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";jQuery(sliderID).show().html(errorMessage);}</script><div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button><button class="pswp__button pswp__button--share" aria-label="Share"></button><button class="pswp__button pswp__button--fs" aria-label="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" aria-label="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" aria-label="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div><script type="text/template" id="tmpl-variation-template"><div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div><div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div><div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div></script><script type="text/template" id="tmpl-unavailable-variation-template"><p>Sorry, this product is unavailable. Please choose a different combination.</p></script><link rel='stylesheet' id='animate-css-css' href='wp-content/plugins/js_composer/assets/lib/bower/animate-css/animate.min24b2.css?ver=5.5.5' type='text/css' media='all' /><link rel='stylesheet' id='inline-style-css' href='wp-content/themes/beautyzone/assets/css/inline-styled87f.css?ver=4.9.9' type='text/css' media='all' /><style id='inline-style-inline-css' type='text/css'> #ct-portfolio-grid .ct-grid-inner{margin:0 -15px}#ct-portfolio-grid .ct-grid-inner .grid-item,#ct-portfolio-grid .ct-grid-inner .grid-sizer{padding:15px}</style><link rel='stylesheet' id='photoswipe-css' href='wp-content/plugins/woocommerce/assets/css/photoswipe/photoswipe9d52.css?ver=3.5.1' type='text/css' media='all' /><link rel='stylesheet' id='photoswipe-default-skin-css' href='wp-content/plugins/woocommerce/assets/css/photoswipe/default-skin/default-skin9d52.css?ver=3.5.1' type='text/css' media='all' /><script type='text/javascript' src='wp-includes/js/jquery/ui/core.mine899.js?ver=1.11.4'></script><script type='text/javascript' src='wp-includes/js/jquery/ui/datepicker.mine899.js?ver=1.11.4'></script><script type='text/javascript'>jQuery(document).ready(function(jQuery){jQuery.datepicker.setDefaults({"closeText":"Close","currentText":"Today","monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Previous","dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"dateFormat":"MM d, yy","firstDay":1,"isRTL":false});});</script><script type='text/javascript' src='wp-content/plugins/booked/assets/js/spin.min7406.js?ver=2.0.1'></script><script type='text/javascript' src='wp-content/plugins/booked/assets/js/spin.jquery7406.js?ver=2.0.1'></script><script type='text/javascript' src='wp-content/plugins/booked/assets/js/tooltipster/js/jquery.tooltipster.min9b70.js?ver=3.3.0'></script><script type='text/javascript'>
var booked_js_vars = {"ajax_url":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","profilePage":"","publicAppointments":"","i18n_confirm_appt_delete":"Are you sure you want to cancel this appointment?","i18n_please_wait":"Please wait ...","i18n_wrong_username_pass":"Wrong username\/password combination.","i18n_fill_out_required_fields":"Please fill out all required fields.","i18n_guest_appt_required_fields":"Please enter your name to book an appointment.","i18n_appt_required_fields":"Please enter your name, your email address and choose a password to book an appointment.","i18n_appt_required_fields_guest":"Please fill in all \"Information\" fields.","i18n_password_reset":"Please check your email for instructions on resetting your password.","i18n_password_reset_error":"That username or email is not recognized."};
</script><script type='text/javascript' src='wp-content/plugins/booked/assets/js/functions77e6.js?ver=2.2.1'></script><script type='text/javascript'>
var wpcf7 = {"apiSettings":{"root":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}},"cached":"1"};
</script><script type='text/javascript' src='wp-content/plugins/contact-form-7/includes/js/scripts1748.js?ver=5.0.5'></script><script type='text/javascript' src='wp-content/plugins/ctuser/acess/js/notify.min8a54.js?ver=1.0.0'></script><script type='text/javascript' src='wp-content/plugins/ctuser/acess/js/remodal.min8a54.js?ver=1.0.0'></script><script type='text/javascript'>
var userpress = {"ajax":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","nonce":"a638ab289c"};
</script><script type='text/javascript' src='wp-content/plugins/ctuser/acess/js/user-press8a54.js?ver=1.0.0'></script><script type='text/javascript'>
var userpress = {"ajax":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","nonce":"a638ab289c","app_id":""};
</script><script type='text/javascript' src='wp-content/plugins/ctuser/acess/js/facebook.login8a54.js?ver=1.0.0'></script><script type='text/javascript'>
var userpress = {"ajax":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","nonce":"a638ab289c","app_id":""};
</script><script type='text/javascript' src='wp-content/plugins/ctuser/acess/js/google.login8a54.js?ver=1.0.0'></script><script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js?ver=2.1.4'></script><script type='text/javascript'>
var woocommerce_params = {"ajax_url":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/beautyzone\/demo\/?wc-ajax=%%endpoint%%"};
</script><script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min9d52.js?ver=3.5.1'></script><script type='text/javascript'>
var wc_cart_fragments_params = {"ajax_url":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/beautyzone\/demo\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_7396856dd2b73fde7fa24aec378f1949","fragment_name":"wc_fragments_7396856dd2b73fde7fa24aec378f1949"};
</script><script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min9d52.js?ver=3.5.1'></script><script type='text/javascript'>
var booked_fea_vars = {"ajax_url":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php","i18n_confirm_appt_delete":"Are you sure you want to cancel this appointment?","i18n_confirm_appt_approve":"Are you sure you want to approve this appointment?"};
</script><script type='text/javascript' src='wp-content/plugins/booked-frontend-agents/js/functions77e6.js?ver=2.2.1'></script><script type='text/javascript'>
var yith_qv = {"ajaxurl":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php","loader":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-content\/plugins\/yith-woocommerce-quick-view\/assets\/image\/qv-loader.gif","is2_2":"","lang":""};
</script><script type='text/javascript' src='wp-content/plugins/yith-woocommerce-quick-view/assets/js/frontend.mine34c.js?ver=1.3.5'></script><script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.min005e.js?ver=3.1.6'></script><script type='text/javascript' src='wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.selectBox.min7359.js?ver=1.2.0'></script><script type='text/javascript'>
var yith_wcwl_l10n = {"ajax_url":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php","redirect_to_cart":"yes","multi_wishlist":"","hide_add_button":"1","is_user_logged_in":"","ajax_loader_url":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-content\/plugins\/yith-woocommerce-wishlist\/assets\/images\/ajax-loader.gif","remove_from_wishlist_after_add_to_cart":"yes","labels":{"cookie_disabled":"We are sorry, but this feature is available only if cookies are enabled on your browser.","added_to_cart_message":"<div class=\"woocommerce-message\">Product correctly added to cart<\/div>"},"actions":{"add_to_wishlist_action":"add_to_wishlist","remove_from_wishlist_action":"remove_from_wishlist","move_to_another_wishlist_action":"move_to_another_wishlsit","reload_wishlist_and_adding_elem_action":"reload_wishlist_and_adding_elem"}};
</script><script type='text/javascript' src='wp-content/plugins/yith-woocommerce-wishlist/assets/js/jquery.yith-wcwl5bf8.js?ver=2.2.5'></script><script type='text/javascript' src='wp-includes/js/underscore.min4511.js?ver=1.8.3'></script><script type='text/javascript'>
var _wpUtilSettings = {"ajax":{"url":"\/beautyzone\/demo\/wp-admin\/admin-ajax.php"}};
</script><script type='text/javascript' src='wp-includes/js/wp-util.mind87f.js?ver=4.9.9'></script><script type='text/javascript'>
var woo_variation_swatches_options = {"is_product_page":""};
</script><script type='text/javascript' src='wp-content/plugins/woo-variation-swatches/assets/js/frontend.minfa41.js?ver=1.0.48'></script><script type='text/javascript' src='wp-content/themes/beautyzone/assets/js/bootstrap.mincce7.js?ver=4.0.0'></script><script type='text/javascript' src='wp-content/themes/beautyzone/assets/js/nice-select.mindc98.js?ver=all'></script><script type='text/javascript' src='wp-content/themes/beautyzone/assets/js/enscrolldc98.js?ver=all'></script><script type='text/javascript' src='wp-content/themes/beautyzone/assets/js/match-height-min8a54.js?ver=1.0.0'></script><script type='text/javascript' src='wp-content/themes/beautyzone/assets/js/sidebar-scroll-fixed8a54.js?ver=1.0.0'></script><script type='text/javascript' src='wp-content/themes/beautyzone/assets/js/magnific-popup.min8a54.js?ver=1.0.0'></script><script type='text/javascript'>
var main_data = {"ajax_url":"http:\/\/demos.casethemes.net\/beautyzone\/demo\/wp-admin\/admin-ajax.php"};
</script><script type='text/javascript' src='wp-content/themes/beautyzone/assets/js/main20b9.js?ver=1.0.2'></script><script type='text/javascript'>
var newsletter = {"messages":{"email_error":"Email address is not correct","name_error":"Name is required","surname_error":"Last name is required","profile_error":"","privacy_error":"You must accept the privacy policy"},"profile_max":"20"};
</script><script type='text/javascript' src='wp-content/plugins/newsletter/subscription/validatefcc2.js?ver=5.7.9'></script><script type='text/javascript' src='wp-includes/js/wp-embed.mind87f.js?ver=4.9.9'></script><script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min24b2.js?ver=5.5.5'></script><script type='text/javascript' src='wp-content/plugins/ctcore/assets/js/owl.carousel.mind87f.js?ver=4.9.9'></script><script type='text/javascript' src='wp-content/themes/beautyzone/assets/js/ct-carousel20b9.js?ver=1.0.2'></script><script type='text/javascript' src='wp-content/plugins/js_composer/assets/lib/waypoints/waypoints.min24b2.js?ver=5.5.5'></script><script type='text/javascript' src='wp-content/plugins/js_composer/assets/lib/bower/isotope/dist/isotope.pkgd.min24b2.js?ver=5.5.5'></script><script type='text/javascript' src='wp-includes/js/imagesloaded.min55a0.js?ver=3.2.0'></script><script type='text/javascript' src='wp-content/themes/beautyzone/assets/js/isotope.ct8a54.js?ver=1.0.0'></script><script type='text/javascript' src='wp-content/plugins/js_composer/assets/lib/bower/skrollr/dist/skrollr.min24b2.js?ver=5.5.5'></script><script type='text/javascript'>
var wc_add_to_cart_variation_params = {"wc_ajax_url":"\/beautyzone\/demo\/?wc-ajax=%%endpoint%%","i18n_no_matching_variations_text":"Sorry, no products matched your selection. Please choose a different combination.","i18n_make_a_selection_text":"Please select some product options before adding this product to your cart.","i18n_unavailable_text":"Sorry, this product is unavailable. Please choose a different combination."};
</script><script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min9d52.js?ver=3.5.1'></script><script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe.min0235.js?ver=4.1.1'></script><script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe-ui-default.min0235.js?ver=4.1.1'></script><script type='text/javascript'>
var wc_single_product_params = {"i18n_required_rating_text":"Please select a rating","review_rating_required":"yes","flexslider":{"rtl":false,"animation":"slide","smoothHeight":true,"directionNav":false,"controlNav":"thumbnails","slideshow":false,"animationSpeed":500,"animationLoop":false,"allowOneSlide":false},"zoom_enabled":"","zoom_options":[],"photoswipe_enabled":"1","photoswipe_options":{"shareEl":false,"closeOnScroll":false,"history":false,"hideAnimationDuration":0,"showAnimationDuration":0},"flexslider_enabled":"1"};
</script><script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/single-product.min9d52.js?ver=3.5.1'></script></body>
<!-- Mirrored from demos.casethemes.net/beautyzone/demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Jan 2019 08:11:34 GMT -->
</html>
<!-- Dynamic page generated in 2.273 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2019-01-07 07:44:21 -->

<!-- Compression = gzip -->

<?php 
	
	// echo $msg;

?>