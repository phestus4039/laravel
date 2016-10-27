<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\FuelPriceTbl;
class FuelCalculatorController extends Controller {


	//
  public function show() {
    $fuel_price = FuelPriceTbl::all();
    return response()->json(array('response'=> $fuel_price), 200);
  }

}
