<?php

	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['uid']) && $_SESSION['uid']=="" )
	{
		$_SESSION['appointment'] = "appointment";
		
		header("location:../../login/index.php");
	}
	
	else
	{	
	
?>

<!DOCTYPE html>
<html>
	
<!-- Mirrored from fmghub.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Feb 2019 11:33:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<meta charset="utf-8">
		<title>Appointment Booking - Salon 360 ERP</title>
		<!-- Search Engine -->
		<meta name="description" content="Keep in touch with your audience by scheduling your company’s events in a beautifully designed calendar. Show them all of your events.">
		<meta name="image" content="590x300_2.png">
		<!-- Schema.org for Google -->
		<meta itemprop="name" content="eCalendar - Responsive Events Calendar">
		<meta itemprop="description" content="Keep in touch with your audience by scheduling your company’s events in a beautifully designed calendar. Show them all of your events.">
		<meta itemprop="image" content="590x300_2.png">
		<!-- Twitter -->
		<meta name="twitter:card" content="eCalendar">
		<meta name="twitter:title" content="eCalendar - Responsive Events Calendar">
		<meta name="twitter:description" content="Keep in touch with your audience by scheduling your company’s events in a beautifully designed calendar. Show them all of your events.">
		<!-- Open Graph general (Facebook, Pinterest & Google+) -->
		<meta name="og:title" content="eCalendar - Responsive Events Calendar">
		<meta name="og:description" content="Keep in touch with your audience by scheduling your company’s events in a beautifully designed calendar. Show them all of your events.">
		<meta name="og:image" content="590x300_2.png">
		<meta name="og:url" content="index.html">
		<meta name="og:site_name" content="eCalendar - Responsive Events Calendar">
		<meta name="og:locale" content="en_US">
		<meta name="og:type" content="website">

		<meta name="google-site-verification" content="HWnzj7Ep37hrTLWAWCpWt-2VBImKlt2zq1VRxvlCXss" />

		<link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
		<meta name="theme-color" content="#ffffff">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="calendar/3.1.1/css/bootstrap.min.css" media="screen">
		<!-- Main style -->
		<link rel="stylesheet" href="calendar/css/style.css" media="screen">
		<link rel="stylesheet" href="calendar/css/modern-style.css" media="screen">
		<script type="text/javascript" src="calendar/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="calendar/js/json2.js"></script>
		<script type="text/javascript" src="calendar/js/script.php"></script>
		<script>
		(function(h,e,a,t,m,p) {
		m=e.createElement(a);m.async=!0;m.src=t;
		p=e.getElementsByTagName(a)[0];p.parentNode.insertBefore(m,p);
		})(window,document,'script','../u.heatmap.it/log.js');
		</script>
	</head>
	<body onload="sessionStorage.clear();">
		<!-- Google Tag Manager -->
		<noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WCGBG4"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WCGBG4');</script>
		<!-- End Google Tag Manager -->
	
		<link rel="StyleSheet" href="calendar/admin/css/timepicker-addon.css" type="text/css" />
<link rel="StyleSheet" href="calendar/admin/js/datepicker/css/jquery-ui-1.10.3.custom.min.css" type="text/css" />
<script type="text/javascript" src="calendar/admin/js/jquery-ui.js"></script>
<script type="text/javascript" src="calendar/admin/js/timepicker-addon.js"></script>		<script type="text/javascript">
			$("#style-selector").on("change", function () {
				if (this.options[0].selected) {
					$('link[rel=stylesheet][href~="calendar/css/modern-style.css"]').remove();
				}
				else if (this.options[1].selected) {
					$('link[rel=stylesheet][href~="calendar/css/style.css"]').after('<link rel=stylesheet href="calendar/css/modern-style.css">');
				}
			});
		</script>
		<input type="hidden" id="admin" value="true" />
		<div id="loading" class="loading">Loading Calendar...</div>
		<input type="hidden" id="timeFormat" value="military" />		<div class="container">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th><span id="anio"></span></th>
						<th colspan="5" style="padding: 0px; line-height: 38px;">
							<a class="prev" onclick="Go('prev')" href="javascript:void(0)"></a>
							<span id="mes"></span>
							<a class="next" onclick="Go('next')" href="javascript:void(0)"></a>
						</th>
						<th style="padding: 0px; line-height: 40px;">
							<a class="today" onclick="Go('today')" href="javascript:void(0)">TODAY</a>
						</th>
					</tr>
					<tr class="weekdays info" id="monday">
						<!-- WEEKDAYS -->
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 id="myModalLabel">Appointment</h3>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="calendar/3.1.1/js/bootstrap.min.js"></script>
	</body>



</html>


<?php
	}
?>