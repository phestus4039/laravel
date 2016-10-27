<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBuyAirtimeTbl extends Model {

	//
  protected $fillable = [
    'user_id',
    'network',
    'amount',
    'phonenumber',
    'transaction_id'
  ];
}
