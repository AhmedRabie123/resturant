<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealController extends Controller
{


    public function create () {
  
        return view('Meal.Create_Meal');

    } 



}
