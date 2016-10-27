
@extends('app')

	@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Transfer Fuel</div>
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
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/userpane/do_transfer_fuel') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label class="col-md-4 control-label">Enter Friend User Id</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="to_user_id" placeholder="Enter Friend User Id" value="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Receipent</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="to_id_name" placeholder="Enter the name of Receipent" value="">
                </div>
              </div>


              <div class="form-group">
                <label class="col-md-4 control-label">Fuel Amount To Transfer</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="amount" placeholder="Fuel Amount To Transfer" value="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Phone Number</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" value="">
                </div>
              </div>



              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                  Transfer Fuel
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

	<script src="{{asset('js/ajax-crud.js')}}"></script>

	@endsection
