<?php
use app\models\Room;
require_once 'autoload.php';
require_once 'app/core/helpers.php';


$room = new Room();

$rooms = $room::findAll();

?>

<?php require_once 'public/templates/head.htm';?>

<div class="container ">
	<h2>Проверить комнату на определенное время</h2>
	<div class="input-group mt-2">
		<select name="select" id="myselect" class="custom-select">
			<?php foreach ($rooms as $room) : ?>
				<option value="<?=$room->id?>"><?=$room->name?></option>
			<?php endforeach; ?>
		</select>
		<input id="date_1" type="date" name="date_1" >
		<input id="date_2" type="date" name="date_2" >
		<div class="input-group-append">
			<button id="submit" class="btn btn-outline-secondary" type="submit">Проверить</button>
		</div>
	</div>

</div>
<div id="result"></div>

<?php require_once 'public/templates/footer.htm';?>