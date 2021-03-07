@extends('parent')

@section('name','Author')

@section('content')
    <div style="padding: 3rem;">
        <form>
            <div class="">
                <div class="row">
                    <div class="col-6">
                        <h1 class="h-size-color">My Articles</h1>
                    </div>
                    <div class="col-6">
                        <a href="/author" class="float-right btn-article">
                            NEW ARTICLE
                         </a>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="bg-color">
                        <tr>
                            <th class="text-center">
                                ARTICLE TITLE
                            </th>
                            <th class="text-center">
                                LAST MODIFIED
                            </th>
                            <th class="text-center">
                                CREATED DATE
                            </th>
                            <th class="text-center">
                                ACTIONS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td class="text-center">{{$article->title}}</td>
                                <td class="text-center">{{date('F j , Y ', strtotime($article->modified_at))}}</td>
                                <td class="text-center">{{date('F j, Y', strtotime($article->created_at))}}</td>
                                <td class="text-center"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$articles->links()}}
            </div>
            <br><br><br>
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <h1 class="h-size-color">My Submissions</h1>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="bg-color">
                        <tr>
                            <th class="text-center">
                                ARTICLE REFERENCE NO.
                            </th>
                            <th class="text-center">
                                ARTICLE TITLE
                            </th>
                            <th class="text-center">
                                STATUS
                            </th>
                            <th class="text-center">
                                ACTIONS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $submission)
                            <tr>
                                <td class="text-center">{{$submission['ref_id']}}</td>
                                <td class="text-center">{{$submission['title']}}</td>
                                <td class="text-center">
                                    @if($submission['status'] === 0)
                                        <span class="badge badge-warning">Submitted for Review</span>
                                    @elseif($submission['status'] === 1)
                                        <span class="badge badge-primary">Request Revision</span>
                                    @elseif($submission['status'] === 2)
                                        <span class="badge badge-success">Approved for Publishing</span>
                                    @elseif($submission['status'] === 2)
                                        <span class="badge badge-danger">Rejected</span>
                                    @endif

                                </td>
                                <td class="text-center">
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$submissions->links()}}
            </div>
        </form>
    </div>
@endsection

@section('script')
	<script type="text/javascript" src="/js/Author/index.js"></script>
@endsection
			       
