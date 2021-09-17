$(document).ready(function() {
	$("#submit").bind("click", function(event) {
		ajax({
		  'id': $('#id').val(),
		  'date_1' : $('#date_1').val(),
		  'date_2' : $('#date_2').val(),
		  'name' : $('#name').val(),
		  'email' : $('#email').val(),
		  'phone_number' : $('#phone').val()
		});
	});
});
function ajax(data) {
	$.ajax({
		url: '/save.php',
		type: "POST",
		data: data,
		dataType: "text",
		error: error,
		success: success
	});
}
function error() {
	alert('Ошибка при загрузке данных!');
}
function success(result) {

	$('#result').empty();
	$('#result').append(result);

}