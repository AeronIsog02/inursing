<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('name')</title>
        <script src="https://kit.fontawesome.com/871397182d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="/css/author/index.css">
        <link rel="stylesheet" type="text/css" href="/css/fonts.css">
        <script src="/js/jquery.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/css/all.min.css">

    </head>
    <body>
    	<div class="loading_screen">
    		<span class="helper">
    			<img style="" src="/assets/img/logo.png">
    		</span>
    	</div>
    	<div class="wrapper">
	        <div class="wrapper">
		        <nav id="sidebar">
		            <div class="sidebar-header">
		                <img class="center" src="/assets/img/Screenshot 2021-02-28 174011.png">
		            </div>
		            <h4 class="text-center">Aeron Javier Isog</h4>
	                <br>
	                <h5 class="text-center">Web Developer</h5>

		            <ul class="list-unstyled components">
		            	<li>
		                    <a href="#">Home</a>
		                </li>
		                <li>
		                    <a href="#">My Profile</a>
		                </li>
		                <li>
		                    <a href="#">Message</a>
		                </li>
		                <li>
		                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Journal</a>
		                    <ul class="collapse list-unstyled" id="pageSubmenu">
		                        <li>
		                            <a href="/author/dashboard">Dashboard</a>
		                        </li>
		                        <li>
		                            <a href="#">Page 2</a>
		                        </li>
		                        <li>
		                            <a href="#">Page 3</a>
		                        </li>
		                    </ul>
		                </li>
		                <li>
		                    <a href="#">Settings</a>
		                </li>
		                <li>
							<a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
		                </li>
		            </ul>
		        </nav>
		        <div id="content">
		            <nav class="navbar navbar-expand-lg">
		                <div class="container-fluid">

		                    <button type="button" id="sidebarCollapse" class="navbar-btn">
		                        <span></span>
		                        <span></span>
		                        <span></span>
		                    </button>

		                    <img src="/assets/img/logo.png" class="logo">

		                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		                        
		                    </div>
		                </div>
		            </nav>
		            @yield('content')
		        </div>
		    </div>
    	@yield('modal')
    </body>
</html>
<script type="text/javascript">
	$(document).ready(function () {
		$('.loading_screen').fadeOut();
	    $('#sidebarCollapse').on('click', function () {
	        $('#sidebar').toggleClass('active');
	        $(this).toggleClass('active');
	    });
	});
</script>
@yield('script')

