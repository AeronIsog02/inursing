@extends('parent')

@section('name','Article Submission - Step 5')

@section('content')
    <div class="container">
        <form class="form article_form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <h1 class="text-center h-size-color">INS JOURNAL ARTICLE SUBMISSION</h1>
                <br>
                <div class="content-acknowledgement" style="padding:0 !important;">
                    <h5 class="cont">ARTICLE SUBMISSION</h5>
                    <div class="container p-5">
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">TITLE OF THE ARTICLE</label>
                                <input type="text" class="form-control article_title" name="article_title" placeholder="TITLE" required />
                            </div>
                        </div>
                    </div>
                    <div class="container checkbox_div" style="display: inline-flex;">
                        <div class="custom-control custom-checkbox col-9">
                            <br>
                            <input type="checkbox" class="custom-control-input" id="check_select_all">
                                <label class="custom-control-label" for="check_select_all">Select All</label>
                            <br><br>
                        </div>
                        <div class="col-3">
                            <br>
                            <button type="button" id="delete_select_all" data-url="{{ url('delete_all_articles') }}" class="btn btn-primary btn-right-select">
                                Delete
                            </button>
                            <br><br>
                        </div>
                    </div>
                    <div class="container" style="overflow: auto !important;padding: 0;">
                        <table class="table table-hover">
                            <thead class="bg-color">
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center">ORDER</th>
                                    <th class="text-center">ITEM</th>
                                    <th class="text-center">DESCRIPTION</th>
                                    <th class="text-center">FILE NAME</th>
                                    <th class="text-center">FILE SIZE</th>
                                    <th class="text-center">ACTIONS</th>
                                </tr>
                            </thead>
                            @foreach($articles as $article)
                                <tr id="tr_{{$article->id}}">
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input sub_check" data-id="{{$article->id}}">
                                        </div>
                                    </td>
                                    <td class="text-center">{{$article->id}}</td>
                                    <td class="text-center">{{$article->item_page}}</td>
                                    <td class="text-center">{{$article->article_desc}}</td>
                                    <td class="text-center">{{$article->file_name}}</td>
                                    <td class="text-center">{{$article->file_size}}KB</td>
                                    <td class="align-center">
                                        <button class="btn btn-danger btn-right-delete" value="{{$article->id}}" style="margin: 2px">
                                            Remove
                                        </button>
                                        <button class="btn btn-success btn-right-delete" value="{{$article->id}}" style="margin: 2px">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <br><br>
                    </div>
                    <div class="content-acknowledgement" style="padding:0 !important;">
                        <h5 class="cont">QUESTIONNAIRES</h5>
                        <div class="container p-5">
                            <div class="row">
                                <div class="col-8">
                                    <p class="p-style">
                                        Please confirm if you have approval from all co-authors <br> to submit this manuscript
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label class="response">{{$copyrights->question1}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <p class="p-style">
                                        Please enter the word count of your manuscript.
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label class="response">{{$copyrights->question2}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <p class="p-style">
                                        Has this manuscript ever been uploaded to a preprint <br> server or submitted to another journal?
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label class="response">{{$copyrights->question3}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <p class="p-style">
                                        Is this submission supported ny a company, or <br> do you have any other conflicts of interest to declare?
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label class="response">{{$copyrights->question4}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <p class="p-style">
                                        Please click below if you are to receive occasional <br> marketing emails from International Nursing School. <br>
                                        You will be able to unsubscribe from these <br> communications at any time. 
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label class="response">{{$copyrights->question5}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="btn-continue2" style="display: inline-flex;">
                            <br><br>
                            <button type="button" id="btn-prev" style="margin: 10px;">BACK</button> 
                            <button type="submit" id="btn-save" style="margin: 10px;">SAVE</button> 
                            <button type="submit" id="btn-submit" style="margin: 10px;">SUBMIT</button> 
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
    <div class="modal fade" id="message_modal" tabindex="1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header ins_theme">
            <h5 class="modal-title" id="exampleModalLabel">Article Submission</h5>
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true" class="ins-white">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h2 class="text-center ins-color">THANK YOU</h2>
            <h3 class="text-center ref_id"></h3>
            <p class="text-center">
                <br>
                Your article submission is received and will be reviewed by our INS Editorial Board
                <br>
                <br>
                You can check the status of your submission in your <br>
                <span class="ins-color">"My Submission"</span> tab
            </p>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    
@endsection

@section('script')
	<script type="text/javascript" src="/js/Author/step5.js"></script>
@endsection
			       
