
@extends('app')

	@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Buy Fuel</div>
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
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/userpane/do_buy_fuel') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label class="col-md-4 control-label">Select Petrol Station</label>
                <div class="col-md-6">
                <select class="form-control" name="station" id="station">
                  <option> --Select Petrol Station-- </option>
                </select>
                </div>
              </div>
							<div class="form-group">
                <label class="col-md-4 control-label">Litres</label>
                <div class="col-md-6">
                  <input type="number" class="form-control" name="litres" id="litres" placeholder="Enter Litres" value="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Amount</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount" value="" readonly="true">
                </div>
              </div>



              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Pay For Fuel
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

		$(document).ready(function() {

			var url = '../stations/show';
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'json',
				success:function(resp){
					var parsed_branch = $.parseJSON(JSON.stringify(resp.response));
					var select = $("#station");
		      //select.empty().append('<option selected="selected" value="0">Please select</option>');
		      $.each(parsed_branch, function (index, jsonData) {
		          select.append($("<option></option>").val(jsonData.name).html(jsonData.name));

		      });
				},
				error:function(xhr) {
					console.log(xhr);
				}
			});



			$("#litres").change(function () {
				var litres = $(this).val();
				var url = '../fuelcalulator/show'
				$.ajax({
					url: url,
					type: 'GET',
					dataType: 'json',
					success:function(resp){
						var parsed_branch = $.parseJSON(JSON.stringify(resp.response));
						console.log(parsed_branch[0].price);
						var  price = litres * parsed_branch[0].price;
						$("#amount").html(price);	$("#amount").val(price);
					},
					error:function(xhr) {

					}
				})

			});

		});

	</script>

	@endsection
