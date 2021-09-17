<?php 

namespace App\Models;
use App\core\Db;
use App\core\Model;

/**
 * Class for Article
 */
class Room extends Model
{

	public const TABLE = 'rooms';

	public $id;
	public $name;


	public static function checkBookings($date1 = 0 , $date2 = 0, $id = 1)
	{
		$allDatesfromModel = static::allDatesfromModel($id);
		$ar = [];

		foreach ($allDatesfromModel as $dayKey => $dayValue) {
			foreach ($dayValue as $day) {
				$ar[] = $day;
				
			}
		}
				foreach ($ar as $d) {

					if(static::in_range($date1, $date2, $d)){
						return true;
					}else{
						return false;
					}
				}
	}


	public static function allDatesfromModel($id)
	{
		$bookings = static::getBookings($id);
		$datesFromDb = [];

		foreach ($bookings as $booking) {
			
			$datesFromDb[] = static::date_period_grid($booking->booking_start, $booking->booking_end);
			
		}

		return $datesFromDb;

	}

	public static function getBookings($id)
	{
		$db = new Db();

		$sql = "select * from ".static::TABLE." join bookings on rooms.id = bookings.room_id where rooms.id = ".$id;

		return $db->query($sql);
	}

	public static function in_range($date1 , $date2 , $range)
	{

		$start_date = strtotime($date1); 
		$end_date = strtotime($date2); 

		$date = strtotime($range); 

		// Выполняем проверку
		echo $inRange = ($date >= $start_date && $date <= $end_date)? true : false; // флаг, если дата входит, то равен true, если нет, то false

		return ($inRange); // 1

	}

	public static function date_period_grid($start, $end)
	{

	    $start = new \DateTime($start);
	    $end   = new \DateTime($end);
	    
	    $interval = $end->diff($start);

	    $days   = $interval->days;
	    $months = $interval->y * 12 + $interval->m;
	    $years  = intval($end->format('Y')) - intval($start->format('Y'));
	  
	  
	    $period = new \DatePeriod($start, new \DateInterval('P1D'), $days);
	    $format = 'd.m.Y';

	    
	    $result = [];
	    foreach ($period as $date) {
	        $result[] = $date->format($format);
	    }
	    
	    return $result;
	}


}
