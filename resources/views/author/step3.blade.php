@extends('parent')

@section('name','Article Submission - Step 3')

@section('content')
    <div class="container">
        <form class="form article_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="container">
                <h1 class="text-center h-size-color">INS JOURNAL ARTICLE SUBMISSION</h1>
                <br>
                <div class="content-acknowledgement" style="padding:0 !important;">
                    <h5 class="cont">Atricle Details</h5>
                    <div class="container p-5">
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control article_title" name="article_title" placeholder="Title" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">Item Type</label>
                                <select class="form-control-select article_item_page" name="article_item_page" required >
                                    <option selected disabled value="">-----</option>
                                    <option value="Lorem Ipsum">Lorem Ipsum</option>
                                    <option value="Lorem Ipsum">Lorem Ipsum</option>
                                    <option value="Lorem Ipsum">Lorem Ipsum</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" class="form-control article_desc" name="article_desc" placeholder="Description" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input article_file" type='file' name="article_file" required onchange="readURL(this);" />
                                    <div class="drag-text">
                                      <p>
                                        <br><br><br>
                                        Drag and drop a file
                                        <br>
                                        or
                                        <br>
                                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Browse File</button>
                                        <br><br><br>
                                      </p>
                                    </div>
                                </div>
                                <div class="file-upload-content" style="background-color: white;">
                                    <div class="image-title-wrap">
                                        <br><br>
                                        <button type="button" onclick="removeUpload()" class="remove-image">
                                            Remove <span class="image-title">Uploaded Image</span>
                                        </button>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="overflow: auto !important;padding: 0;">
                        <table class="table table-hover">
                            <thead class="bg-color">
                                <tr>
                                    <th class="text-center">
                                        ORDER
                                    </th>
                                    <th class="text-center">
                                        ITEM
                                    </th>
                                    <th class="text-center">
                                        DESCRIPTION
                                    </th>
                                    <th class="text-center">
                                        FILE NAME
                                    </th>
                                    <th class="text-center">
                                        FILE SIZE
                                    </th>
                                    <th class="text-center">
                                        ACTIONS
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach($articles as $article)
                                    <tr>
                                        <td class="text-center">{{$article->id}}</td>
                                        <td hidden="">
                                            <input type="text" class="edit_title" name="edit_title" value="{{$article->title}}">
                                        </td>
                                        <td class="text-center">
                                            {{$article->item_page}}
                                            <input type="text" class="edit_item" name="edit_item" value="{{$article->item_page}}">
                                        </td>
                                        <td class="text-center">
                                            {{$article->article_desc}}
                                            <input type="text" class="edit_desc" name="edit_desc" value="{{$article->article_desc}}">
                                        </td>
                                        <td class="text-center">
                                            {{$article->file_name}}
                                        </td>
                                        <td class="text-center">
                                            {{$article->file_size}}KB
                                        </td>
                                        <td class="align-center">
                                            <button type="button" class="btn btn-danger btn-right-delete delete_btn " value="{{$article->id}}" style="margin: 2px">
                                                Remove
                                            </button>
                                            <button class="btn btn-success btn-right-delete edit_btn " value="{{$article->id}}" style="margin: 2px">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="btn-continue2" style="display: inline-flex;">
                            <br><br>
                            <button type="button" id="btn-prev" style="margin: 10px;">BACK</button> 
                            <button type="submit" id="btn-save" style="margin: 10px;">SAVE</button> 
                            <button type="button" id="btn-next" style="margin: 10px;">NEXT</button> 
                            <br><br>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="edit_modal" tabindex="1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header ins_theme">
                <h5 class="modal-title" id="exampleModalLabel">Edit Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="ins-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="edit_form" method="put" enctype="multipart/form-data">
                        <div class="container p-5">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="hidden" class="form-control e_article_id" name="e_article_id"/>
                                    <input type="text" class="form-control e_article_title" name="e_article_title" placeholder="Title" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleInputEmail1">Item Type</label>
                                    <select class="form-control-select e_article_item_page" name="e_article_item_page" required >
                                        <option selected disabled value="">-----</option>
                                        <option value="Lorem Ipsum">Lorem Ipsum</option>
                                        <option value="Lorem Ipsum">Lorem Ipsum</option>
                                        <option value="Lorem Ipsum">Lorem Ipsum</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="exampleInputEmail1">Description</label>
                                    <input type="text" class="form-control e_article_desc" name="e_article_desc" placeholder="Description" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input e_article_file" type='file' name="e_article_file" required onchange="readURL(this);" />
                                        <div class="drag-text">
                                          <p>
                                            <br><br><br>
                                            Drag and drop a file
                                            <br>
                                            or
                                            <br>
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Browse File</button>
                                            <br><br><br>
                                          </p>
                                        </div>
                                    </div>
                                    <div class="file-upload-content" style="background-color: white;">
                                        <div class="image-title-wrap">
                                            <br><br>
                                            <button type="button" onclick="removeUpload()" class="remove-image">
                                                Remove <span class="image-title">Uploaded Image</span>
                                            </button>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary save_changes" id="save_changes">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
	<script type="text/javascript" src="/js/Author/step3.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
              $('.image-upload-wrap').hide();

              $('.file-upload-image').attr('src', e.target.result);
              $('.file-upload-content').show();

              $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

            } else {
            removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
            }
            $('.image-upload-wrap').bind('dragover', function () {
            $('.image-upload-wrap').addClass('image-dropping');
            });
            $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
        });
    </script>
@endsection
			       
