<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
class AuthorController extends Controller
{
    public function index(){
    	//call the model to fetch all data 
    	//select * from Authors;
    	$authors = Author::orderBy('id','DESC')->paginate(3); //$authors = \App\Author::get();
    	return view('authors.index',['authors'=>$authors]);
    	//return 'Hello Index';
    }
    public function latest(){
    	$authors=Author::select('name','bio','id','created_at')->
    	orderBy('id','DESC')->take(3)->get();
    	return view('authors.latest',['authors'=>$authors]); 
    }
    public function show($id){
    	$author=Author::find($id);
    	return view('authors.show',['author'=>$author]); 
    }
    public function search($word){
    	$authors=Author::where('name','like',"%$word%")->get();
    	return view('authors.search',['authors'=>$authors]); 
    }
    public function create(){
        return view('authors.create'); 
    }  
    public function store(Request $request){
        // dd($request->all());
        $request->validate(['name'=>'required|string|max:100','bio'=>'required|string','img'=>'required|image|mimes:jpg,jpeg,png']);
        $name = $request->name;
        $bio = $request->bio;
        $img = $request->img;
        $ext = $img->getClientOriginalExtension();
        $img_name = "author-".uniqid().".$ext";
        $img->move(public_path('uploads'),$img_name);
        Author::create(['name'=>$name,'bio'=>$bio,'img'=>$img_name]);
        return redirect(route('allAuthors'));
    }
    public function edit($id){
        $author = Author::find($id);
        return view('authors.edit',['author'=>$author]); 
    }
    public function update(Request $request,$id){
        $request->validate(['name'=>'required|string|max:100','bio'=>'required|string','img'=>'nullable|image|mimes:jpg,jpeg,png']);
        $author = Author::find($id);
        $img_name = $author->img;
        if($request->img !== null){
            $img = $request->img;
            $ext = $img->getClientOriginalExtension();
            $img_name = "author-".uniqid().".$ext";
            $img->move(public_path('uploads'),$img_name);
            unlink(public_path("uploads/$author->img"));
        }
        $author->update(['name'=>$request->name,'bio'=>$request->bio,'img'=>$img_name]);
        return back(); //return redirect(route('editAuthor',$id));
    }
    public function delete($id){
       $author = Author::find($id);
       $img = $author->img;
       unlink(public_path("uploads/$img"));
       $author->delete();
        return back();
    }
}
