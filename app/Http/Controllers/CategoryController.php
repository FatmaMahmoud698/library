<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::orderBy('id','DESC')->paginate(3);
    	return view('categories.index',['categories'=>$categories]);
    }
    public function show($id){
    	$category=Category::find($id);
    	return view('categories.show',['category'=>$category]); 
    }
    // public function search($word){
    // 	$categories=Category::where('name','like',"%$word%")->get();
    // 	return view('categories.search',['categories'=>$categories]); 
    // }
    public function create(){
        return view('categories.create'); 
    }  
    public function store(Request $request){
        // dd($request->all());
        $request->validate(['name'=>'required|string|max:100']);
        $name = $request->name;
        Category::create(['name'=>$name]);
        return redirect(route('allCategories'));
    }
    public function edit($id){
        $category = Category::find($id);
        return view('categories.edit',['category'=>$category]); 
    }
    public function update(Request $request,$id){
        $request->validate(['name'=>'required|string|max:100']);
        $category = Category::find($id);
        $category->update(['name'=>$request->name]);
        //return back(); 
        return redirect(route('allCategories'));
    }
    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(route('allCategories'));
     }

}
