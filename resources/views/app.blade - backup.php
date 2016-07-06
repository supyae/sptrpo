<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->
	<!-- vote -->
	<link href="css/font-awesome.min.css" rel="stylesheet">	 
	 <link href="{{ asset('/css/font.css') }}" rel='stylesheet'>
	 <link href="css/style.css" rel="stylesheet">
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
	<script src="{{ asset('/js/jquery.min.js') }}"></script>
	 <!-- <script src="js/script.js"></script> -->
	 <script>
	 $(document).ready(function(){
	// ajax setup	    
		
	// any voting button (up/down) clicked event
	$('.vote').click(function(){
		var self = $(this); // cache $this
		var action = self.data('action'); // grab action data up/down 		
		var parent = self.parent().parent(); // grab grand parent .item
		var postid = parent.data('postid'); // grab post id from data-postid		
		var score = parent.data('score'); // grab score form data-score
		
		//var arr = [postid,action];
		var arr= {'postid':postid,'action':action};
		alert(arr);
		
		
			// var id = $('input[name="id"]').val();
              var BASE="http://localhost/spt/public"
                $.get(BASE+'/ajaxvote/'+arr, function(data) {
               $("#call-info").html(data);
             })	
		
		
		var $data={};
		$data.postid = postid;
		$data.postaction = action;

		// only works where is no disabled class
		if (!parent.hasClass('.disabled')) {
			// vote up action
			if (action == 'up') {
				// increase vote score and color to orange
				parent.find('.vote-score').html(++score).css({'color':'orange'});
				// change vote up button color to orange
				self.css({'color':'orange'});
				// send ajax request with post id & action
				$.ajax({data: {'postid' : postid, 'action' : 'up'}});
			}
			// voting down action
			else if (action == 'down'){
				// decrease vote score and color to red
				parent.find('.vote-score').html(--score).css({'color':'red'});
				// change vote up button color to red
				self.css({'color':'red'});
				// send ajax request
				$.ajax({data: {'postid' : postid, 'action' : 'down'}});
			};

			// add disabled class with .item
			parent.addClass('.disabled');
		};
	
});
	
});
</script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Reddit Clone</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('/link') }}">Upload Link</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts 
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	 <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
-->
	 <!-- <script src="{{ asset('/js/jquery.min.js') }}"></script> 
	 <script src="{{ asset('/js/bootstrap.min.js') }}"></script>-->
</body>
</html>
