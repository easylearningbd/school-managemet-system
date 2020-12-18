<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountEmployeeSalary extends Model
{
     public function user(){
    	return $this->belongsTo(User::class,'employee_id','id');
    }



}
