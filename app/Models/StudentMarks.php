<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    public function student(){
    	return $this->belongsTo(User::class, 'student_id','id');
    }
}
