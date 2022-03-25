<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\category;
use App\models\meal;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index (Request $request) {
    
    $cats = category::all();

    if(Auth()->User()->is_admin ==1 ){ 

        return view ('Adminpage');

    } else{
 
        if(!$request->category){

            $meals = meal::all();
            return view('UserPage' , compact('cats' , 'meals'));

        } else{

            $meals = meal::where('category' , $request->category)->get();
            return view('UserPage' , compact('cats' , 'meals'));
         }
     }
  } 
  


}

