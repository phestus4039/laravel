<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelTransferTbl extends Model {

	//
  protected $fillable = [
    'user_id',
    'to_user_id',
    'amount',
    'transaction_id',
    'phonenumber',
    'user_id_name',
    'to_id_name'
  ];
}
