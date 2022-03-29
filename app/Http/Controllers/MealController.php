<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\meal;
use Intervention\Image\Facades\Image;



class MealController extends Controller
{

    public function index () {
  
        $meals = meal::paginate(7);
        return view ('meal.index' , compact('meals'));
         
    }


    public function create () {
   
        $cats = category::latest()->get();
        return view('Meal.Create_Meal' , compact('cats'));

    } 
 
    public function store (Request $request) {

      $request->validate([
    
        'name' => 'required|string|min:3|max:40',
        'description' => 'required|min:3|max:500',
        'price' => 'required|numeric',
        'image' => 'required|mimes:jpg,jpeg,png',

      ]);
 
      $image = $request->file('image');  //$image = mostafa.jpg
      $name_gen = hexdec(uniqid()) . '.' .  $image->getClientOriginalExtension();
      //$name_gen = 12548796968 . jpg
      Image::make($image)->resize(300 , 300)->save('upload/meals/' . $name_gen);

      $save_url = 'upload/meals/' . $name_gen;

      meal::insert([
 
       'category' => $request->category,
       'name' => $request->name ,
       'description' => $request->description,
       'price' => $request->price,
       'image' => $save_url,

    ]);
 
    
    $notification = array(
        'message_id' => 'تم اضافة الوجبه بنجاح!',
        'alert-type' => 'success',
    );
 
   return redirect()->route('meal.index')->with($notification);

    }

    public function edit ($id) {

     $meal = meal::find($id);
     $cats = category::latest()->get();

     return view('meal.edit_meal' , compact('meal' , 'cats'));

    }

    public function update (Request $request , $id) {

      $old_img = $request->old_image;

      if( $request->file('image')){
          
       unlink($old_img);


      $image = $request->file('image'); //ahmed.jpg
      $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
      Image::make($image)->resize(300 , 300)->save('upload/meals/' . $name_gen);

      $save_url = 'upload/meals/' . $name_gen;

       meal::findOrFail($id)->update([

        'category' => $request->category,
        'name' => $request->name ,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $save_url,

       ]);

       return redirect()->route('meal.index')->with ('message' , ' تم تعديل الوجبه بنجاح!');

      } //end if
 
      else {

        meal::findOrFail($id)->update([

            'category' => $request->category,
            'name' => $request->name ,
            'description' => $request->description,
            'price' => $request->price,
    
           ]);
        

      }

      return redirect()->route('meal.index')->with ('message' , ' تم تعديل الوجبه بنجاح!');


    }
    
    public function delete ($id) {
 
      meal::find($id)->delete();
      return redirect()->route('meal.index')->with('message' , 'تم حذف الوجبه بنجاح!');

   }
     
     
    public function show_details ($id) {
       
      $meal = meal::findOrFail($id);
      return view ('meal.meal_details' , compact('meal'));

    }


    public function mealSearch (Request $request) {
 
      $search = $request->input('search');
      $meals = meal::query()
      ->where('name' , 'LIKE' , "%{$search}%")
      ->orwhere('description' , 'LIKE' , "%{$search}%")
      ->get();
      return view ('meal.meal_search' , compact('meals'));

    } 
     
    public function mealPage () {

      if(Auth::check()) {

        return redirect()->route('home');

      } else{
   
      return redirect()->route('Vpage'); 
   
     }


    }

  

}
