<?php 

namespace App\Models;
use App\core\Db;
use App\core\Model;

/**
 * Class for Article
 */
class Booking extends Model
{

	public const TABLE = 'bookings';

	public $id;
	public $room_id;
	public $user_id;
	public $booking_start;
	public $booking_end;


}
