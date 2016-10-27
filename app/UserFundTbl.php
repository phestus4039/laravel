<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFundTbl extends Model {

	//
  protected $fillable = [
    'user_id',
    'amount',
    'transaction_id',
    'bank_name',
    'account_no'
  ];
}
