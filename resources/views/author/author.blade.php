@extends('parent')

@section('name','Author')

@section('content')
    <div class="container">
        <form>
            <div class="container">
                <h1 class="text-center h-size-color">INS JOURNAL ACKNOWLEDGEMENT</h1>
                <br></br>
                <div class="content-acknowledgement">
                    <p>Please respond to any questions below and click <span class="cont">CONTINUE.</span></p>
                    <br>
                    <p>Please click on the privacy policy links below and then check the box.</p>
                    <br>
                    <div class="flex">
                        <span class="span">
                            <input type="checkbox" id="check-ack" name="check-ack"></input>
                        </span>
                        <span class="span">
                            <p>
                                * I acknowledge that my personal information will be accessed, used and otherwise processed in <br/>
                                accordance with the Publisher's Data User Privacy Policy and the Aries Privacy Policy.
                            </p>
                        </span>
                    </div>
                    <div class="btn-continue">
                        <button type="button" id="btn-continue" disabled=""> CONTINUE </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
	<script type="text/javascript" src="/js/Author/index.js"></script>
@endsection

