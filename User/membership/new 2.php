<?php
$today=date('d-m-Y');
$next_date= date('d-m-Y', strtotime($today. ' + 90 days'));
echo $next_date;
?>