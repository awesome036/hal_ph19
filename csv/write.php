<?php
	$f_pt = fopen('data.csv','a');
	$data = array("IH12A335",3,"おおさわ");
	fputcsv($f_pt,$data);
	fclose($f_pt);
?>