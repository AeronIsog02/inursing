@extends('parent')

@section('name','Article Submission - Step 2')

@section('content')
    <div class="container">
        <form class="author_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="container col-12">
                <h1 class="text-center h-size-color">INS JOURNAL ARTICLE SUBMISSION</h1>
                <br>
                <div class="content-acknowledgement" style="padding: 0 !important;">
                    <h5 class="cont">Author Details</h5>
                    <div class="container p-5">
                        <div class="col">
                            <input type="text" class="form-control article_id" id="article_id" hidden name="article_id" placeholder="First name"/>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" name="a_fname" placeholder="First name" required />
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">Last name</label>
                                <input type="text" class="form-control" name="a_lname" placeholder="Last name" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="text" class="form-control" name="a_email" placeholder="Email Address" required />
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="text" class="form-control" name="a_pnumber" placeholder="Phone Number" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" name="a_address" placeholder="Address" required />
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">Country</label>
                                <input class="form-control" list="country" name="a_country" id="a_countries">
                                <datalist id="country">
                                  @include('countries')
                                </datalist>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Highest Academic Qualification:</label>
                                <select class="form-control-select a_haq" name="a_haq" required>
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
                                <input type="text" class="form-control a_bd" name="a_bd" placeholder="" value="N/A" readonly required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">Upload Cirriculum Vitae File</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="a_cv" placeholder="" required />
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                    
                    <div class="container checkbox_div">
                        <div class="custom-control custom-checkbox">
                            <br>
                            <input type="checkbox" class="custom-control-input" id="check_add_ca">
                            <label class="custom-control-label" for="check_add_ca">Co-Author (Tick the checkbox to add co-author(s))</label>
                            <br><br>
                        </div>
                    </div>
                    <div class="container cont co_author_div">
                        <span class="col-6" style="display: inline-flex;padding: 0;">
                            <h5>Add Co-Author(s) Details (If any)</h5>
                        </span>
                        <span class="col-6">
                            <button type="button" id="add_ca" class="btn btn-primary btn-right" disabled>
                                ADD MORE CO-AUTHOR
                            </button>
                        </span>
                    </div>
                    <div class="continer p-5">
                        <div class="ca_append">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="btn-continue2" style="display: inline-flex;">                        
                            <button type="submit" style="margin: 10px;" id="btn-prev">BACK</button> 
                            <button type="submit" style="margin: 10px;" id="btn-save">SAVE</button> 
                            <button type="submit" style="margin: 10px;" id="btn-next">NEXT</button> 
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
	<script type="text/javascript" src="/js/Author/step2.js"></script>
@endsection
			       
