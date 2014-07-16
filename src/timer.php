<?php
	function timer($timer)
	{
		$date = new DateTime();
		$diff = $timer->diff($date);
		return date('H:i:s').' | '.$diff->format('%H:%I:%S').': ';
	}
?>