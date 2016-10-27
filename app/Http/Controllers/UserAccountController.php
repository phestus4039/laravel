<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Mail;

class UserAccountController extends Controller {

public function index() {

  //return view('useraccount.index');
  //return 'Hello World';
  return redirect()->route('useraccount.create');


    //return view('useraccount.index');
}

public function create() {
  return view('user.index');
}

public function store() {
  return view('useraccount.login');
}


//   public function login() {
//
//     return view('useraccount.login');
//   }
//
//   public function doLogin(Request $request) {
//
//     $this->validate($request, [
//                 'phonenumber' => 'required',
//                 'password' => 'required|min:3'
//             ]);
//
//             $authStatus = Auth::attempt($request->only(['phonenumber', 'password']), $request->has('remember'));
//
//             if (!$authStatus) {
//                 return redirect()->back()->with('warning', 'Invalid phonenumber or password');
//             }
//
//             //  return $authStatus;
//       //  return redirect('users/dashboard')->with('info', 'You are now signed in'.Auth::user()->phonenumber);
//          return redirect()->route('client.index');
//   }
//
//
//
//
//   public function dashboard() {
//   return view('users.dashboard');
// }
//
//   public function register() { //Todo User Register
//
//     return view('users.register');
//   }
//
//   //Store user data
//   public function post_register(\App\Http\Requests\CreateUserRequest $request){
//
//     $user = \App\UserDataTbl::create([
//             'phonenumber' => $request->input('phonenumber'),
//             'password' => bcrypt($request->input('password')),
//             'Firstname' => $request->input('Firstname'),
//             'Surname' => $request->input('Surname'),
//             'Email' => $request->input('email'),
//             'Dob' => $request->input('dob'),
//             'Sex' => $request->input('sex'),
//             'Address' => $request->input('address'),
//             'State' => $request->input('state'),
//             'LGA' => $request->input('lga')
//         ]);
//
//
//     //GET ALL THE FORM FIELD DATA AND SAVE
//     $user_details= \App\UserDataTbl::orderBy('id', 'desc')->first();
//     $id =  $user_details->id; //user id
//
//     //save into users table
//
//     $user = \App\User::create([
//       'phonenumber' => $request->input('phonenumber'),
//       'password' => bcrypt($request->input('password'))
//     ]);
//     //Method to send Mail
//     $default_email = 'beautifulme569@gmail.com';
//     $email =  $user_details->Email;
//
//     $data = array('name'=>'Esanju');
//
//     Mail::send('emails.confirm', $data, function($message) {
//       $message->to('tundeesanju@gmail.com', 'Payment Clone')->subject
//                   ('Laravel Basic Testing Mail');
//                $message->from('beautifulme569@gmail.com','Payment Clone');
//
//     });
//     //Methods to send OTP
//
//     $phonenumber = $user_details->phonenumber;
//
//
//     //Method ends
//     return view('users.verify_pin')->with('id', $id);
//   }
//
//   public function verify_user_pin() {
//
//     return view('users.verify_pin');
//   }
//
//   //save the OTP send and confirm account
//   public function post_verify_user_pin(\App\Http\Requests\CreateUserOTPRequest $request) {
//   $otp  = \App\UserOTP::create($request->all());
//
//     $message = '';
//     if($otp){
//         $message  = 'User Creation Successfully';
//     }
//     else
//     {
//         $message  = 'Opps!!!, Error Occurred While Creating a User';
//     }
//      //return redirect()->intended('users/response')->with('message', $message);
//      return view('users.response', compact('message'));
//   }
//
//   public function response() {
//     return view('users.response');
//   }
//
//
//   public function FundAccount() { //Todo Fund Account
//
//       return view('users.fund_account');
//   }
//
//   public function post_fund_account() {
//     //1. check the BVN enter by integrating to API
//     //2. if valid redirect to another page
//
//   }
//
//   public  function BuyFuel(){ //Todo Buy fuel
//     return view('users.buy_fuel');
//   }
//
//
//   public function TransferFund() { //Todo Transfer Fund
//     return view('users.transfer_fund');
//   }
//
//
//   public function BuyAirtime(){ //Todo Buy Airtime
//     return 'Buy Airtime';
//   }
//
//   public function PayBill (){ //Todo Pay Bill
//     return view('users.pay_bill');
//   }
//
//
//   public function Transaction_History() { //Todo Transaction History
//     return view('users.transaction_history');
//   }
//
//   public function Sales_Income() {
//     //Todo Sales & Income
//     return 'Sales & Income';
//   }
//
//   public function WithdrawFund() {
//     return view('users.withdraw_fund');
//   }
//
//   public function UserProfile() {
//     //Todo User Profile
//     //get the user id from  session, cookie or any storage means after login
//     $user_profile = ['Firstname' => ' Festus'];
//     return view('user.profile', compact('user_profile'));
//   }
//
//   public function Logout() {
//     //Todo Logout
//     // destroy all session, cookie or an storage used
//     return 'Logout';
//   }
//

}
