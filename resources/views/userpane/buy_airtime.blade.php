
@extends('app')

	@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Buy Airtime</div>
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

            <!-- Response  -->
            @if ( session()->has('info'))
                <div class="alert alert-info" role-"alert">
                    {{ session()->get('info') }}
                </div>
            @endif
            <!-- Response  -->
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/userpane/do_buy_airtime') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label class="col-md-4 control-label">Select Your Network</label>
                <div class="col-md-6">
                <select class="form-control" name="network" id="network">
                  <option> --Select network-- </option>
                    <option>MTN</option>
                </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Enter Your Phone Number</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="phonenumber" value="" placeholder="Enter Your Phone Number">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Amount</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="amount" placeholder="Enter Amount" value="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Continue
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
	@section('footer')


	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$.ajax({
			
		})
	</script>

	@endsection
