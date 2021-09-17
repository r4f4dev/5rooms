<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);


function debug($str) {
	echo "<pre>";
	var_dump($str);
	echo "</pre>";
	exit;
}

function in_range($date1 , $date2 , $range)
{
	
	$start_date = strtotime($date1); 
	$end_date = strtotime($date2); 

	$date = strtotime($range); 

	// Выполняем проверку
	$inRange = ($date >= $start_date && $date <= $end_date)? true : false; // флаг, если дата входит, то равен true, если нет, то false

	return ($inRange); // 1

}

function date_period_grid($start, $end)
{
    $start = new DateTime($start);
    $end   = new DateTime($end);
    
    $interval = $end->diff($start);

    $days   = $interval->days;
    $months = $interval->y * 12 + $interval->m;
    $years  = intval($end->format('Y')) - intval($start->format('Y'));
  
  
    $period = new DatePeriod($start, new DateInterval('P1D'), $days);
    $format = 'd.m.Y';

    
    $result = [];
    foreach ($period as $date) {
        $result[] = $date->format($format);
    }
    
    return $result;
}

