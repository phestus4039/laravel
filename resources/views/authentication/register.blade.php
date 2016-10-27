<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

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
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">

						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>

				</ul>
			</div>
		</div>
	</nav>

  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-8 col-md-offset-2">
  			<div class="panel panel-default">
  				<div class="panel-heading">Register</div>
  				<div class="panel-body">
  					@if (count($errors) > 0)
  						<div class="alert alert-danger">
  							<strong>Whoops!</strong> There were some problems with your input.<br><br>
  							<ul>
  								@foreach ($errors->all() as $error)
  									<li>{{ $error }}</li>
  								@endforeach
  							</ul>
  						</div>
  					@endif

  					<form class="form-horizontal" role="form" method="POST" action="{{ url('/authentication/doRegister') }}">
  						<input type="hidden" name="_token" value="{{ csrf_token() }}">

  						<div class="form-group">
  							<label class="col-md-4 control-label">FirstName</label>
  							<div class="col-md-6">
  								<input type="text" class="form-control" name="firstname" value="">
  							</div>
  						</div>

              <div class="form-group">
                <label class="col-md-4 control-label">SurName</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="surname" value="">
                </div>
              </div>


  						<div class="form-group">
  							<label class="col-md-4 control-label">E-Mail Address</label>
  							<div class="col-md-6">
  								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
  							</div>
  						</div>

  						<div class="form-group">
  							<label class="col-md-4 control-label">Password</label>
  							<div class="col-md-6">
  								<input type="password" class="form-control" name="password">
  							</div>
  						</div>

              <div class="form-group">
                <label class="col-md-4 control-label">Phone Number</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="phonenumber" id="inputEmail3" placeholder="Phone Number">
                </div>
              </div>


              <div class="form-group">
                <label class="col-md-4 control-label">DOB</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="dob"  placeholder="DOB">
                </div>
              </div>


              <div class="form-group">
                  <label for="inputEmail3" class="col-md-4 control-label">Sex</label>
                  <div class="col-md-6">
                    <select class="form-control" id="sex" name="sex">
                      <option>Select One...</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                  </div>
                </div>


                <div class="form-group">
                    <label for="inputPassword3" class="col-md-4 control-label">Address</label>
                    <div class="col-md-6">
                      <textarea name="address" class="form-control" rows="4" placeholder="Address" cols="20"></textarea>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-md-4 control-label">State</label>
                    <div class="col-md-6">
                      <select class="form-control" id="state" name="state"> <!-- Load data from jquery ajax-->
                        <option>Select One...</option>
                        <option>Osun</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-md-4 control-label">LGA</label>
                    <div class="col-md-6">
                      <select class="form-control" id="lga" name="lga"> <!-- Load data from jquery ajax-->
                        <option>Select One...</option>
                          <option>Obokun</option>
                      </select>
                    </div>
                  </div>
      						<div class="form-group">
      							<div class="col-md-6 col-md-offset-4">
      								<button type="submit" class="btn btn-primary">
      									Register
      								</button>
      							</div>
      						</div>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
