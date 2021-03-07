@extends('parent')

@section('name','Article Submission - Step 1')

@section('content')
    <div class="container">
        <form class="form article_type_form" action="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="container">
                <h1 class="text-center h-size-color">INS JOURNAL ARTICLE SUBMISSION</h1>
                <br></br>
                <div class="content-acknowledgement" style="padding: 0 !important;">
                    <h5 class="cont">Choose Article Type:</h5>
                    <div class="container">
                        <div class="row" style="padding: 20px;">
                            <span class="col-md-6">
                                <label for="article_type" style="color: #35708e">Article</label>
                                <br>
                                <div class="spinner-border"></div>
                                <select id="article_type" name="article_type" class="form-input">
                                    <option selected="" disabled="" value="0">----</option>
                                    <option value="Original Research">Original Research</option>
                                    <option value="Original Research">Original Research</option>
                                    <option value="Original Research">Original Research</option>
                                </select>
                            </span>
                            <span class="col-md-6">
                                <br>
                                <div class="btn-continue btn-right" style="max-width: 100% !important;width: 1000px;">
                                    <button type="submit" id="btn-next" style="width: 100% !important;"> PROCEED </button>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
	<script type="text/javascript" src="/js/Author/step1.js"></script>
@endsection
			       
