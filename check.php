<?php 
use app\models\Room;
require_once 'autoload.php';
require_once 'app/core/helpers.php';

if(!empty($_POST)){
	$id = $_POST['id'];
	$date1 = $_POST['date_1'];
	$date2 = $_POST['date_2'];
}

if ($id and $date1 and $date2)  {

	$room = new Room();

	if($room::checkBookings($date1, $date2, $id)){
		echo '<p class="text-center mt-2">Извините в этот период комната забронирована</p>';
	}else{
		echo '<p class="text-center mt-2">В этот период комната свободна ! <a href="bron.php/?room_id='. $id .'"><button class="btn btn-primary">Забронировать</button></a></p>';
	}


}else{
	echo 'Данные введены неправильно';
}