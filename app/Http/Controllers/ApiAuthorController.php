<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Illuminate\Support\facades\validator;
class ApiAuthorController extends Controller
{
    public function index(){
    	$authors=Author::with('books')->get();
    	return response()->json($authors);
    }
    public function show($id){
    	$author=Author::with('books')->find($id);
    	return response()->json($author);
    }
    public function store(Request $request){
    	$name = $request->name;
        $bio = $request->bio;
        $img = $request->img;
        $validator=Validator::make($request->all(),[
        	'name'=>'required|string|max:100',
        	'bio'=>'required|string',
        	'img'=>'nullable|image|mimes:jpg,jpeg,png'
        ]);
        if($validator->fails()){
        	return response()->json(['errors'=>$validator->errors()]);
        }
        $ext = $img->getClientOriginalExtension();
        $img_name = "author-".uniqid().".$ext";
        $img->move(public_path('uploads'),$img_name);
        $author=Author::create(['name'=>$name,'bio'=>$bio,'img'=>$img_name]);
        return response()->json(['success'=>'Author created Successfully','author'=>$author]);
    }
    public function update($id,Request $request){
    	$validator=Validator::make($request->all(),[
        	'name'=>'required|string|max:100',
        	'bio'=>'required|string',
        	'img'=>'nullable|image|mimes:jpg,jpeg,png'
        ]);
        if($validator->fails()){
        	return response()->json(['errors'=>$validator->errors()]);
        }
    	$author = Author::find($id);
        $img_name = $author->img;
        if($request->img !== null){
            $img = $request->img;
            $ext = $img->getClientOriginalExtension();
            $img_name = "author-".uniqid().".$ext";
            $img->move(public_path('uploads'),$img_name);
            if($author->img !== null){
            	unlink(public_path("uploads/$author->img"));
        	}
        }
        $author->update(['name'=>$request->name,'bio'=>$request->bio,'img'=>$img_name]);
        return response()->json(['success'=>'Author updated Successfully','author'=>$author]);
    }
    public function delete($id){
       $author = Author::find($id);
       $img = $author->img;
       if($img !== null){
       	unlink(public_path("uploads/$img"));
   	   }
       $author->delete();
       return response()->json(['success'=>'Author deleted Successfully']);
    }
}
