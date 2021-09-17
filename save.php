<?php 
use App\Models\Booking;
use App\Models\User;
use App\core\Db;
use app\models\Room;
require_once 'autoload.php';
require_once 'app/core/helpers.php';


if(isset($_POST['id']) and isset($_POST['date_1']) and isset($_POST['date_2']) and isset($_POST['name']) and isset($_POST['email']) and isset($_POST['phone_number']) ){
	$user = new User();
	$db = new Db(); 

	$user::save([
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'phone_number' => $_POST['phone_number']
	]);

	Booking::save([
		'room_id' => $_POST['id'],
		'user_id' => $db->lastID(),
		'booking_start' => $_POST['date_1'],
		'booking_end' => $_POST['date_2'],
	]);

	echo '<p class="text-center">Забронирован</p>';
}else{
	echo "not ok";
}