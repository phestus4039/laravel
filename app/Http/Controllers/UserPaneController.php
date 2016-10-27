<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Http\Request;

class UserPaneController extends Controller {

	//
  public function dashboard() {
    return view('userpane.dashboard');
  }

  public function fund_account() {
    return view('userpane.fund_account');
  }

  public function do_fund_account(Request $request) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // generate a pin based on 2 * 7 digits + a random character
    $pin = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];

    // shuffle the result
      $tran = str_shuffle($pin);

      $this->validate($request, [
                'amount' => 'required|numeric|min:2',
                'bank_name' => 'required',
                'account_no'=> 'required|numeric|min:2'
            ]);
            $user_save = \App\UserFundTbl::create([
              'user_id' =>  Auth::user()->id,
              'amount' => $request->input('amount'),
              'bank_name' => $request->input('bank_name'),
              'account_no' => $request->input('account_no'),
              'transaction_id' => $tran
            ]);
            return redirect()->back()->with('info', 'Fund Paid successfully');
      }

  public function buy_fuel() {
    return view('userpane.buy_fuel');
  }

  public function do_buy_fuel(Request $request) {

    //1.Check if there is account in the Userfund for the User Auth::user()->id

    $user = \App\UserFundTbl::where('user_id','=',Auth::user()->id)->first();
    $user_amount = $user->amount; // return  amount of user in user fund table
    if($user_amount==0){
        return redirect()->back()->with('info', 'The amount in your account is low. please fund your account!');
    }else if($user_amount < $request->input('amount')){

      return redirect()->back()->with('info', 'The amount of fuel your requested for is more than your money. Please add more fund!');

    }else{

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // generate a pin based on 2 * 7 digits + a random character
      $pin = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];

    // shuffle the result
      $tran = str_shuffle($pin);

      $this->validate($request, [
                'station' => 'required',
                'amount' => 'required|min:2',
                'litres' => 'required',
              ]);

              // check if user and station exist before
      $user_station = DB::table('user_buy_fuel_tbls')
          ->where('user_id', '=', Auth::user()->id)
          ->where('station', '=', $request->input('station'))
          ->first();

          //if not exist
      if (is_null($user_station)) {
        //store user data

        $buy = \App\UserBuyFuelTbl::create([
          'user_id' =>  Auth::user()->id,
          'amount' => $request->input('amount'),
          'station' => $request->input('station'),
          'litres' => $request->input('litres'),
          'transaction_id' => $tran
        ]);

      }
      else
      {
        //else if exist
        $prev  = $user_station->amount; //previous amount
        $next = $request->input('amount'); // next amount
        $total = $prev + $next;
        DB::table('user_buy_fuel_tbls')
            ->where('user_id', Auth::user()->id)
            ->where('station', '=', $request->input('station'))
            ->update(['amount' => $total,'transaction_id' => $tran ]);
      }

      $str_amount = $request->input('amount'); // request amount of fuel
      $balance = $user_amount  -   $str_amount; // $balance is the substraction of amount in the fund table - $requesting amount of fuel
      DB::table('user_fund_tbls')
          ->where('user_id', Auth::user()->id)
          ->update(['amount' => $balance]);

      return redirect()->back()->with('info', 'Buy Fuel Paid successfully');


      }
    }

  public function transfer_fuel() {
    return view('userpane.transfer_fuel');
  }

  public function do_transfer_fuel(Request $request) {

    $user = \App\UserBuyFuelTbl::where('user_id','=',Auth::user()->id)->first();
    $user_amount = $user->amount;
    if($user_amount==0){
        return redirect()->back()->with('info', 'The amount in your account is low. please fund your account!');
    }else if($user_amount < $request->input('amount')){

      return redirect()->back()->with('info', 'The amount of fuel your requested for is more than your money. Please add more fund!');

    }else{

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // generate a pin based on 2 * 7 digits + a random character
    $pin = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];

    // shuffle the result
      $tran = str_shuffle($pin);

      $this->validate($request, [
                'to_user_id' => 'required',
                'amount' => 'required|numeric',
                'phonenumber' => 'required|numeric',
                'to_id_name' => 'required'
              ]);

              $buy = \App\FuelTransferTbl::create([
                'user_id' =>  Auth::user()->id,
                'to_user_id' => $request->input('to_user_id'),
                'amount' => $request->input('amount'),
                'phonenumber' => $request->input('phonenumber'),
                'user_id_name' => Auth::user()->name,
                'to_id_name' => $request->input('to_id_name'),
                'transaction_id' => $tran
              ]);

              $str_amount = $request->input('amount'); // request amount of fuel
              $balance = $user_amount  -   $str_amount; // $balance is the substraction of amount in the fund table - $requesting amount of fuel
              DB::table('user_buy_fuel_tbls')
                  ->where('user_id', Auth::user()->id)
                  ->update(['amount' => $balance]);

            return redirect()->back()->with('info', 'Fuel Transfer successfully');
    }
  }


  public function buy_airtime(){
    return view('userpane.buy_airtime');
  }

  public function do_buy_airtime(Request $request){
    $this->validate($request, [
              'network' => 'required',
              'phonenumber' => 'required',
              'amount' => 'required'
            ]);
    $amount_of_airtime = $request->input('amount'); //amount of airtime

    $user = \App\UserFundTbl::where('user_id','=',Auth::user()->id)->first();
    $user_amount = $user->amount;
    if($user_amount==0){
        return redirect()->back()->with('info', 'The amount in your account is low. please fund your account!');
    }else if($user_amount < $request->input('amount')){
      return redirect()->back()->with('info', 'The amount of fuel your requested for is more than your money. Please add more fund!');
    }else{

      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      // generate a pin based on 2 * 7 digits + a random character
      $pin = mt_rand(1000000, 9999999)
          . mt_rand(1000000, 9999999)
          . $characters[rand(0, strlen($characters) - 1)];

      // shuffle the result
        $tran = str_shuffle($pin);


      $buy = \App\UserBuyAirtimeTbl::create([
        'user_id' =>  Auth::user()->id,
        'amount' => $request->input('amount'),
        'network' => $request->input('network'),
        'phonenumber' => $request->input('phonenumber'),
        'transaction_id' => $tran
      ]);

      //update UserFundTbl
      $str_amount = $request->input('amount'); // request amount of fuel
      $balance = $user_amount  -   $str_amount; // $balance is the substraction of amount in the fund table - $requesting amount of fuel
      DB::table('user_fund_tbls')
          ->where('user_id', Auth::user()->id)
          ->update(['amount' => $balance]);

    return redirect()->back()->with('info', 'Airtime bought successfully');
    }
  }
}
