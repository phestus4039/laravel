<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\BankListTbl;

class ListBankController extends Controller {

	// /bank/show
  public function show(){
      $allbank = BankListTbl::all();
      return response()->json(array('response'=> $allbank), 200);
   }

}
