<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use carbon\carbon;

class CategoryController extends Controller
{
   public function show () {
       $cats = category::paginate(5);
       return view ('category.categoryPage' , compact('cats'));
   }


   public function store (Request $request) {
  
    $request->validate (['cat_name' => 'required|string|unique:categories|min:3|max:40']);

    category::insert ([
 
        'cat_name' => $request->cat_name ,
        'created_at' => carbon::now()
    ]);
  
    return back()->with('message', 'تم إضافة صنف جديد بنجاح');

   }

     public function delete ($id) {
 
        category::find($id)->delete();
        return redirect()->route('cat.show')->with('message' , 'تم حذف الصنف بنجاح');
         
     }

    public function update (Request $request) {
  
        $request-> validate(['cat_name' => 'required|string|unique:categories|min:3|max:40']);

        $id = $request->id;
        category::findOrFail($id)->update([

            'cat_name' => $request->cat_name,

        ]);
         
      return redirect()->route('cat.show')->with('message' , 'تم تعديل الصنف بنجاح!');

    }



}
