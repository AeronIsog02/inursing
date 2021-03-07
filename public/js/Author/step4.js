$(document).ready(function () {
	$('#btn-save').click(function(){
        $('.copyright_form').on('submit',function(event) {
            event.preventDefault();
            $('.loading_screen').fadeIn();
            $.ajax({
                url: '/copyright_form',
                type: 'POST',              
                data: $(this).serialize(),
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result){
                    if (result === 1) {
                        $('.loading_screen').fadeOut();
                        swal("Success!", "Copyright Saved!", "success");
                        
                    }else{
                        swal("Error!", "Data could not be saved!", "error");
                    }
                },
                error: function(data){
                    swal("Error!", data, "error");
                }
            });
        });
    });

	$('#btn-prev').click(function(e){
        e.preventDefault();
        location.href = '/author/step3';
    });

    $('#btn-next').click(function(e){
        e.preventDefault();
        location.href = '/author/step5';
    });
});
