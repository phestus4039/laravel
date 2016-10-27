<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\FuelStationTbl;
class StationsController extends Controller {

	// /stations/show
  public function show(){
    $allfuelstation = FuelStationTbl::all();
    return response()->json(array('response'=> $allfuelstation), 200);
  }
}
