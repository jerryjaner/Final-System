<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){

    	return view ('Admin.Category.AddCategory');
    }

    public function save (Request $Request){

       $validated = $Request->validate([
        'category_name' => 'required|string|unique:categories|max:255',
      ]);

		$category = new Category();
    	$category -> category_name = $Request->category_name;
    	$category -> category_status = $Request->category_status;
    	$category->save();

    	// return back()->with('added_msg','Category Added Successfully');

        $notification = array (

            'message' => 'Category Added Successfully',
            'alert-type' =>'success'
        );

        return back()->with($notification);

    	//return redirect(to:'/category/manage')->with('sms','Category Save');
        
    }		

    public function manage(){

    	$categories = Category::all();
      
    	return view('Admin.Category.ManageCategory',compact('categories'));
    }

    public function active($category_id){

    	$category = Category::find($category_id);
    	$category->category_status = 1;
    	$category->save();

        $notification = array (

            'message' => 'Status Updated Successfully',
            'alert-type' =>'info'
        );

        return back()->with($notification);

    	// return back()->with('status_msg','Status Updated Successfully');
    }
    public function Inactive($category_id)
    {

    	$category = Category::find($category_id);
    	$category ->category_status = 0;
    	$category->save();

        $notification = array (

            'message' => 'Status Updated Successfully',
            'alert-type' =>'info'
        );

        return back()->with($notification);

    	// return back()->with('status_msg','Status Updated Successfully');
    }

    public function delete($category_id)
     {

    	$category = Category::find($category_id);
    	$category->delete();

        $notification = array (

            'message' => 'Category Deleted Successfully',
            'alert-type' =>'error'
        );

        return back()->with($notification);
    	// return back()->with('delete_msg', 'Category Deleted Successfully');
 
    }

     public function update(Request $request)
     {

    	$category = Category::find($request->category_id);
    	$category->category_name = $request->category_name;
    	$category->save();

        $notification = array (

            'message' => 'Category Updated Successfully',
            'alert-type' =>'info'
        );

        return back()->with($notification);

    // return redirect(to:'/admin/category/manage')->with('update_msg','Category Updated Successfully');
 
    }

}
