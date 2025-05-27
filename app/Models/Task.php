<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function class(){

        return $this->belongsTo(Classes::class,'classes_id','id');
    }
    public function subject(){

        return $this->belongsTo(Subject::class,'subjects_id','id');
    }
}

