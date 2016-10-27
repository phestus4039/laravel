<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBuyFuelTbl extends Model {

	//
  protected $fillable = [
    'user_id',
    'station',
    'amount',
    'litres',
    'transaction_id'
  ];
}
