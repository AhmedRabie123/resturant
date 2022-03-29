<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\category;
use App\models\meal;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $cats = category::all();

 
        if(!$request->category){
              
            $cat1 = 'الصفحه الرئيسيه';
            $meals = meal::all();
            return view('VisitorPage' , compact('cats' , 'meals' , 'cat1'));

        } else{
            $cat1 = $request->category;
            $meals = meal::where('category' , $request->category)->get();
            return view('VisitorPage' , compact('cats' , 'meals' , 'cat1'));
         }
     
    }
}
