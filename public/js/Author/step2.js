$(document).ready(function () {

	let count = 0;

	$('#btn-prev').click(function(e){
        e.preventDefault();
        location.href = '/author/step1';
    });

    $('#btn-next').click(function(e){
        e.preventDefault();
        location.href = '/author/step3';
    });

	$('#check_add_ca').change(function(){
		if ($('#check_add_ca').prop("checked") == true) {
			$('.ca').prop("disabled", false);
            $('#add_ca').prop("disabled", false);
            $('.co_author_div').css("display", "block");
		}else{
			$('.ca').prop("disabled", true);
			$('#add_ca').prop("disabled", true);
			$('.co_author_div').css("display", "none");
            $('.ca_append').empty();
		}
	});



	$('#btn-save').click(function(){
        var article_id = localStorage.getItem("article_type");
        $('.article_id').val(article_id);

        $('.author_form').on('submit',function(event) {
            event.preventDefault();
            $('.loading_screen').fadeIn();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: '/author_form',
                type: 'POST',              
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result)
                {
                    if (result.msg === 1) {
                        $('.loading_screen').fadeOut();
                        swal("Success!", "Author Saved!", "success");
                    }else{
                        swal("Error!", "Author could not be saved!", "error");
                    }
                },
                error: function(data)
                {
                    swal("Error!", data, "error");
                }
            });

        });
    });

    $('.a_haq').on('change',function(){
        console.log($(this).val());
        let sel = $(this).val();
        if (sel === "Bachelor's Degree") {
            $('.a_bd').prop("readonly", false);
            $('.a_bd').val("");
        }else{
            $('.a_bd').prop("readonly", true);
            $('.a_bd').val("N/A");
        }
    });


	$('#add_ca').click(function(){
		count++;
		$('.ca_append').append(`
			<div class="ca_div container">
                <div class="row">
                	<div class="col-9">
                        <h5 class="co_author">CO-AUTHOR</h5>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-danger btn-right-delete delete_div${count}">Remove</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control ca ca_item${count}" hidden name="ca_item[]" value="${count}" placeholder="First name" required  />
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control ca ca_fname${count}" name="ca_fname[]" placeholder="First name" required  />
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1">Last name</label>
                        <input type="text" class="form-control ca ca_lname${count}" name="ca_lname[]" placeholder="Last name" required  />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="text" class="form-control ca ca_email${count}"  name="ca_email[]" placeholder="Email Address" required  />
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="text" class="form-control ca ca_pnumber${count}"  name="ca_pnumber[]" placeholder="Phone Number" required  />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control ca ca_address${count}"  name="ca_address[]" placeholder="Address" required   />
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1">Country</label>
                        <input class="form-control ca ca_country${count}" list="country" name="ca_country[]" id="countries" >
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Highest Academic Qualification:</label>
                        <select id="ca_haq_id" class="form-control-select ca ca_haq${count}" name="ca_haq[]" required >
                            <option disabled selected value="">-----</option>
                            <option value="Lorem ipsum">Lorem ipsum</option>
                            <option value="Lorem ipsum">Lorem ipsum</option>
                            <option value="Lorem ipsum">Lorem ipsum</option>
                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                            <option value="Lorem ipsum">Lorem ipsum</option>
                            <option value="Lorem ipsum">Lorem ipsum</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1">If Bachelor's Degree</label>
                        <input type="text" class="form-control ca ca_bd${count}" name="ca_bd[]" placeholder="" required  />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Upload Cirriculum Vitae File</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input ca ca_cv${count}" name="ca_cv[]" id="customFile" placeholder="" required >
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <br><br>
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
            </div>
		`);
		$(".custom-file-input").on("change", function() {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	    });

	    $('.delete_div' + count).click(function(e){

	    	e.preventDefault();
	    	console.log($(this).parent().parent().parent());

	    	$(this).parent().parent().parent().remove();
	    });
	});
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});
