@extends('parent')

@section('name','Article Submission - Step 4')

@section('content')
    <div class="container">
        <form class="form copyright_form" method="POST">
            @csrf
            <div class="container">
                <h1 class="text-center h-size-color">INS JOURNAL ARTICLE SUBMISSION</h1>
                <br>
                <div class="content-acknowledgement" style="padding:0 !important;">
                    <h5 class="cont">Copyrights and Confirmation</h5>
                    <div class="container p-5">
                        <div class="row">
                            <div class="col-8">
                                <p class="p-style">
                                    Please confirm if you have approval from all co-authors to submit this manuscript
                                </p>
                            </div>
                            <div class="col-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="q1" value="YES" class="custom-control-input" required >
                                    <label class="custom-control-label" for="customRadioInline1">YES</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="q1" value="NO" class="custom-control-input" required >
                                    <label class="custom-control-label" for="customRadioInline2">NO</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <p class="p-style">
                                    Please enter the word count of your manuscript.
                                </p>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" name="q2" placeholder="Word count" required />
                                <br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <p class="p-style">
                                    Has this manuscript ever been uploaded to a preprint server or submitted to <br> another journal?
                                </p>
                            </div>
                            <div class="col-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline3" value="YES" name="q3" class="custom-control-input" required >
                                    <label class="custom-control-label" for="customRadioInline3">YES</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline4" value="NO" name="q3" class="custom-control-input" required >
                                    <label class="custom-control-label" for="customRadioInline4">NO</label>
                                </div>
                                <br><br>
                                <input type="text" class="form-control" name="q3_1" placeholder="Manuscript" required />
                                <br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <p class="p-style">
                                    Is this submission supported ny a company, or do you have any other conflicts of <br> interest to declare?
                                </p>
                            </div>
                            <div class="col-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline5" value="YES" name="q4" class="custom-control-input" required >
                                    <label class="custom-control-label" for="customRadioInline5">YES</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline6" value="NO" name="q4" class="custom-control-input" required >
                                    <label class="custom-control-label" for="customRadioInline6">NO</label>
                                </div>
                                <br><br>
                                <input type="text" class="form-control" name="q4_1" placeholder="Remarks" required />
                                <br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <p class="p-style">
                                    Please click below if you are to receive occasional marketing emails from International <br> Nursing School.
                                    You will be able to unsubscribe from these communications at any time. 
                                </p>
                            </div>
                            <div class="col-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline7" value="YES" name="q5" class="custom-control-input" required >
                                    <label class="custom-control-label" for="customRadioInline7">YES</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline8" value="NO" name="q5" class="custom-control-input" required >
                                    <label class="custom-control-label" for="customRadioInline8">NO</label>
                                </div>
                                <br>
                            </div>
                        </div>
                        <br><br>
                        <hr style="border: solid 2px white;" />
                        <div class="row">
                            <div class="col">
                                <p class="p-style">
                                    <br><br>
                                    In order to complete your submission, you are required to complete and sign the appropriate copyright/licensing from before <br>
                                    publication.
                                    <br><br>
                                    - If you intend to submit the article for Open Access publication, the correct form is here.<br>
                                    - If you intend to submit the article for regular publication, the correct form is here.<br>
                                    - If the article has been commissioned by the INS journal, the editor will send you the correct form.<br>

                                    <br><br>
                                    Forms can be completed with Adobe Reader, and signed digitally. If you cannot sign digitally, sign manually and scan for return.
                                </p>
                            </div>
                        </div>
                    </div>
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

@section('script')
	<script type="text/javascript" src="/js/Author/step4.js"></script>
@endsection
			       
