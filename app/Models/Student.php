<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'nric_passport_number',
        'email',
        'edu_inst',
        'student_id_no',
        'photo',
    ];


    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }





}


