<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\user;
use App\models\meal;

class order extends Model
{
    use HasFactory;
    Protected $guarded = [];

    public function user (){
        return $this->belongsTo(User::class);
    }

    public function meal (){
        return $this->belongsTo(Meal::class);
    }

    
}
