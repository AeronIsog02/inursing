$(document).ready(function () {
	$('#btn-save').click(function(){
		$('.article_form').submit(function(event) {
	        event.preventDefault();
	        $.ajax({
	            url: '/update_article',
	            type: 'put',              
	            data: $(this).serialize(),
	            dataType: 'JSON',
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            success: function(res){
	            	console.log(res);
	                if (res === 1) {
	                	swal("Saved!", "Success", "success");
	                	$('.article_title').attr('readonly','');
	                }else{
	                    swal("Error!", "Article could not be saved!", "error");
	                }
	            },
	            error: function(data){
	                swal("Error!", `${data.message}`, "error");
	            }
	        });
	    });
	});

	$('#btn-prev').click(function(e){
        e.preventDefault();
        location.href = '/author/step4';
    });

    $('#btn-submit').click(function(){
        $('.article_form').submit(function(event) {
	        event.preventDefault();
	        $.ajax({
	            url: '/submit_article',
	            type: 'post',              
	            data: $(this).serialize(),
	            dataType: 'JSON',
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            success: function(res){
	                if (res.msg === 1) {
	                	$('#message_modal').appendTo("body").modal('show');
	                	$('.ref_id').html(res.ref_id + " " + res.title);
	                }else{
	                    swal("Error!", "Article could not be saved!", "error");
	                }
	            },
	            error: function(data){
	                swal("Error!", `${data.message}`, "error");

	            }
	        });
	    }); 
    });

    $('.close').on('click',function(){
    	$('#message_modal').modal('hide');
    	location.href = "/author/dashboard";
    });

	$('#check_select_all').change(function(){
		if ($('#check_select_all').prop("checked") == true) {
            $('.sub_check').prop('checked', true);  
         } else {  
            $('.sub_check').prop('checked',false);  
         }  
	});

	$('#delete_select_all').on('click', function(e) {
        var allVals = [];  

        $(".sub_check:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });  

        if(allVals.length <= 0){  

            swal('Selected Article not found','Please select Article.','error');  

        }  else {  

        		swal({
		          title: "Are you sure?",
		          text: "You will not be able to recover this imaginary file!",
		          icon: "warning",
		          buttons: [
		            'No, cancel it!',
		            'Yes, I am sure!'
		          ],
		          dangerMode: true,
		        }).then(function(isConfirm) {
		          if (isConfirm) {
		            swal({
		              title: 'Shortlisted!',
		              text: 'Candidates are successfully shortlisted!',
		              icon: 'success'
		            }).then(function() {

		              var join_selected_values = allVals.join(","); 
		                $.ajax({
		                    url: '/delete_all_articles',
		                    type: 'delete',
		                    data: 'ids='+join_selected_values,
		                    dataType: 'JSON',
		                    headers: {
				                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				            },
		                    success: function (data) {
		                        console.log(data);
		                    },
		                    error: function (data) {
		                        swal('Error',`${data.responseText}`, 'error');
		                    }
		                });

		                location.reload();
		            });
		          } else {
		            swal("Cancelled", "Your imaginary file is safe :)", "error");
		          }
		        });
        }  
    });
});