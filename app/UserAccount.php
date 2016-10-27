<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model {

	//
  protected $fillable = [
    'phonenumber',
    'password',
    'Firstname',
    'Surname',
    'Email',
    'Dob',
    'Sex',
    'Address',
    'State',
    'LGA'
  ];

}
