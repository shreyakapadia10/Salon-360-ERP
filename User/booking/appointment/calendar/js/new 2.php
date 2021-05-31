<?php
				$time = "06:58:00";
				$time2 = "00:42:00";

				$secs = strtotime($time2)-strtotime("00:00:00");
				$result = date("H:i:s",strtotime($time)+$secs);
	
	echo $result;
	
				?>