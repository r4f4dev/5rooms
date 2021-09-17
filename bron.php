<?php 
use app\models\Room;
require_once 'autoload.php';
require_once 'app/core/helpers.php';


$room_id = $_GET['room_id'];
$room = Room::find($room_id);
?>
<?php require_once 'public/templates/head.htm';?>
<?php foreach($room as $r) : ?>
	<div>
		<div class="container text-center">

				ID комнаты : <input id="id" value="<?=$r->id?>"><br />
				Название комнаты : <?=$r->name?><br />
				Ваше имя : <input id="name" type="text"><br />
				Забронировать от : <input id="date_1" type="date" ><br />
				Забронировать до : <input id="date_2" type="date" ><br />
				Email : <input id="email" type="text" name="email"><br />
				Телефон : <input id="phone" type="number"><br />
				<input id="submit" type="submit" name="submit">

		</div>
		<div id="result"></div>
	</div>
<?php endforeach; ?>
<?php require_once 'public/templates/footer2.htm';?>	
