<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\category;
use App\models\meal;
use App\models\order;
use App\models\user;


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

    if(Auth()->User()->is_admin == 1 ){ 
         
        $order = order::orderBy('id', 'DESC')->paginate(7);
        return view ('Adminpage' , compact('order'));

    } else{
 
        if(!$request->category){
              
            $cat1 = 'الصفحه الرئيسيه';
            $meals = meal::all();
            return view('UserPage' , compact('cats', 'meals', 'cat1'));

        } else{
            $cat1 = $request->category;
            $meals = meal::where('category' , $request->category)->get();
            return view('UserPage' , compact('cats', 'meals', 'cat1'));
         }
     }
  } 
  
 

    public function orderStore (Request $request) {
  

        order::insert([

            'user_id' => Auth()->user()->id,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'meal_id' => $request->meal_id,
            'qty' => $request->qty,
            'address' => $request->address,
            'status' =>'تتم مراجعة الطلب!',



        ]);

        $notification = array(
            'message_id' => 'تم اضافةالطلب بنجاح',
            'alert-type' => 'success',
        );
     
       return redirect()->route('home')->with($notification);
    
        
       
    }


 
    public function show_order () {


        $order = order::where('user_id', Auth::user()->id)->paginate(7);
 
        return view('order.show_order' , compact('order'));
    }
 
     
    public function changeStatus (Request $request , $id) {

       
       $order = order::find($id);
       order::where('id' , $id)->update([
 
        'status' => $request->status,
         
       ]);

       $notification = array(
        'message_id' => 'تم تغيير حالة الطلب بنجاح',
        'alert-type' => 'success',
    );
         
       return back()->with($notification);
     
    }


    


}

