
@extends('app')

	@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Fund Account</div>
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
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/userpane/do_fund_account') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label class="col-md-4 control-label">Select Your Bank</label>
                <div class="col-md-6">
                <select class="form-control" name="bank_name" id="bank_name">
                  <option> --Select Bank-- </option>
                    <option>FBN</option>
                </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Your Bank Account Number</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="account_no" value="" placeholder="Your Bank Account Number">
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
		url: '../bank/show',
		type: 'GET',
		dataType: 'json',
		success:function(resp){
			var parsed_branch = $.parseJSON(JSON.stringify(resp.response));
			var select = $("#bank_name");
      select.empty().append('<option selected="selected" value="0">Please select</option>');
      $.each(parsed_branch, function (index, jsonData) {
          select.append($("<option></option>").val(jsonData.name).html(jsonData.name));

      });
		},
		error:function(xhr) {

		}
	})
</script>

@endsection
