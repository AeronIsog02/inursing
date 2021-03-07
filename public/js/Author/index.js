$(document).ready(function () {
	$('#check-ack').change(function(){
		if ($('#check-ack').prop("checked") == true) {
			$('#btn-continue').prop("disabled", false);
		}else{
			$('#btn-continue').prop("disabled", true);
		}
	});

	$('#btn-continue').click(function(e){
		e.preventDefault();
		location.href = "/author/step1"
	});
});
