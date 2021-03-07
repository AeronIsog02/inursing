$(document).ready(function () {
	$('#btn-next').click(function(){

		if ($('#article_type').val() === null) {

			swal('Error!','Please Select Article Type.', 'error');

		}else{
			$('.article_type_form').submit(function(event) {
		        event.preventDefault();
		        $.ajax({
		            url: '/article_type_form',
		            type: 'POST',              
		            data: $(this).serialize(),
		            dataType: 'JSON',
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            },
		            success: function(res){
		            	console.log(res);
		                if (res.msg === 1) {
		                    localStorage.setItem('article_type',res.id);
							location.href = '/author/step2';
		                }else{
		                    swal("Error!", "Data could not be saved!", "error");
		                }
		            },
		            error: function(data){

		                swal("Error!", `${data.message}`, "error");

		            }
		        });
		    });

		}
	});
});
