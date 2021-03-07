$(document).ready(function(){
    $('#btn-prev').click(function(e){
        e.preventDefault();
        location.href = '/author/step2';
    });

    $('#btn-next').click(function(e){
        e.preventDefault();
        if ($('.tbody').children().length > 0) {
            location.href = '/author/step4';
        }else{
            swal('No Article Detail(s) found.', 'Please create Article details to proceed to next', 'error');
        }
    });

    $('.edit_btn').on('click',function(){
        $('#edit_modal').appendTo("body").modal('show');
        let item = $(this).parent().parent().find('.edit_item').val();
        let desc = $(this).parent().parent().find('.edit_desc').val()
        let title = $(this).parent().parent().find('.edit_title').val()
        $('.e_article_title').val(title);
        $('.e_article_id').val($(this).val());
        $('.e_article_desc').val(desc);
        $('.e_article_item_page option').each(function() {
            if(this.text == item) {
                $(".e_article_item_page option").removeAttr("selected");
                $(this).attr("selected","selected");
            }
        });
    });

    $('#save_changes').click(function(){
        alert(0);
        $('.edit_form').on('submit',function(event) {
            event.preventDefault();
            $('.loading_screen').fadeIn();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: '/update_article_details',
                type: 'PUT',              
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
                        removeUpload();
                        swal("Success!", "Article Updated!", "success").then(function(){
                            location.reload();
                        });
                    }else{
                        swal("Error!", "Article could not be saved!", "error");
                    }
                },
                error: function(data)
                {
                    swal("Error!", data, "error");
                }
            });

        });
    });

    $('#btn-save').click(function(){
        $('.article_form').on('submit',function(event) {
            event.preventDefault();
            $('.loading_screen').fadeIn();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: '/article_form',
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
                        swal("Success!", "Article Saved!", "success").then(function(){
                            location.reload();
                        });
                        removeUpload();
                        $('.tbody').append(`
                            <tr>
                                <td class="text-center">${result.items[0].id}</td>
                                <td class="text-center">${result.items[0].item_page}</td>
                                <td class="text-center">${result.items[0].article_desc}</td>
                                <td class="text-center">${result.items[0].file_name}</td>
                                <td class="text-center">${result.items[0].file_size}KB</td>
                                <td class="align-center">
                                    <button class="btn btn-danger btn-right-delete" value="${result.items[0].id}" style="margin: 2px">Remove</button>
                                    <button class="btn btn-success btn-right-delete" value="${result.items[0].id}" style="margin: 2px">Edit</button>
                                </td>
                            </tr>
                        `)
                    }else{
                        swal("Error!", "Article could not be saved!", "error");
                    }
                },
                error: function(data)
                {
                    swal("Error!", data, "error");
                }
            });

        });
    });
});
