<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\CategoriesTbl;
class CategoriesController extends Controller {

	// /categories/show
  public function show(){
    $allbank = CategoriesTbl::all();
    return response()->json(array('response'=> $allbank), 200);
  }
}
