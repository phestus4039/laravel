<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App\Http\Requests\CreateUserRequest;

class AuthenticationController extends Controller {


  public function __construct()
  {
    $this->middleware('guest', ['only' => 'login']);
  }
	//
  public function login()
  {
      return view('authentication.login');
  }

  public function post_login(Request $request) {
    $this->validate($request, [
                'phonenumber' => 'required',
                'password' => 'required|min:6'
            ]);

        $authStatus = Auth::attempt($request->only(['phonenumber', 'password']), $request->has('remember'));

        if (!$authStatus) {
            return redirect()->back()->with('warning', 'Invalid phonenumber or password');
        }

       return redirect('userpane/dashboard')->with('info', 'You are now signed in');
  }

  public function register(){
    return view('authentication.register');
  }

  public function doRegister(\App\Http\Requests\CreateUserRequest $request) {

    $user = \App\UserAccount::where('phonenumber','=',$request->input('phonenumber'))->first();
       if(count($user)){
         return view('authentication.exist');
       }
      else
        {
          $user_save = \App\UserAccount::create([
                'phonenumber' => $request->input('phonenumber'),
                'password' => bcrypt($request->input('password')),
                'Firstname' => $request->get('firstname'),
                'Surname' => $request->get('surname'),
                'Email' => $request->get('email'),
                'Dob' => $request->get('dob'),
                'Sex' => $request->get('sex'),
                'Address' => $request->get('address'),
                'State' => $request->get('state'),
                'LGA' => $request->get('lga')
                ]);


    //GET ALL THE FORM FIELD DATA AND SAVE
    $user_details= \App\UserAccount::orderBy('id', 'desc')->first();
    $id =  $user_details->id; //user id

    //save into users table

    $userr = \App\User::create([
      'phonenumber' => $request->input('phonenumber'),
      'name' => $request->get('firstname'),
      'password' => bcrypt($request->input('password'))
    ]);

    //Method to send Mail
    // $default_email = 'beautifulme569@gmail.com';
    // $email =  $user_details->Email;
    //
    // $data = array('name'=>'Esanju');
    //
    // Mail::send('emails.confirm', $data, function($message) {
    //   $message->to('tundeesanju@gmail.com', 'Payment Clone')->subject
    //               ('Laravel Basic Testing Mail');
    //            $message->from('beautifulme569@gmail.com','Payment Clone');
    //
    // });
    //Methods to send OTP

    $phonenumber = $user_details->phonenumber;
    return view('authentication.verify_pin')->with('id', $id);
    }
  }
}
