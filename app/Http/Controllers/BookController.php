<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
class BookController extends Controller
{
    public function index(){
    	//call the model to fetch all data 
    	//select * from books;
    	$books = Book::orderBy('id','DESC')->paginate(3); //$books = \App\Book::get();
    	return view('books.index',['books'=>$books]);
    	//return 'Hello Index';
    }
    // public function latest(){
    // 	$books=Book::select('name','desc','img','price','author_id','id','created_at')->
    // 	orderBy('id','DESC')->take(3)->get();
    // 	return view('books.latest',['books'=>$books]); 
    // }
    public function show($id){
    	$book=Book::find($id);
    	return view('books.show',['book'=>$book]); 
    }
    // public function search($word){
    // 	$books=Book::where('name','like',"%$word%")->get();
    // 	return view('books.search',['books'=>$books]); 
    // }
    public function create(){
    	$authors = Author::get();
        return view('books.create',['authors'=>$authors]); 
    }  
    public function store(Request $request){
        // dd($request->all());
        $request->validate(['name'=>'required|string|max:100',
                            'desc'=>'required|string',
                            'price'=>'required|numeric|max:999999:99',
                            'img'=>'required|image|mimes:jpg,jpeg,png',
                            'author_id'=>'required|exists:authors,id']);
        $name = $request->name;
        $desc = $request->desc;
        $price = $request->price;
        $aut=$request->author_id;
        $img = $request->img;
        $ext = $img->getClientOriginalExtension();
        $img_name = "book-".uniqid().".$ext";
        $img->move(public_path('uploads'),$img_name);
        Book::create(['name'=>$name,'desc'=>$desc,'price'=>$price,'author_id'=>$aut,'img'=>$img_name]);
        return redirect(route('allBooks'));
    }
    public function edit($id){
        $book = Book::find($id);
        $authors = Author::select('id','name')->get();
        return view('books.edit',['book'=>$book,'authors'=>$authors]); 
    }
    public function update(Request $request,$id){
        $request->validate(['name'=>'required|string|max:100',
        	'desc'=>'required|string',
        	'price'=>'required|numeric|max:999999:99',
        	'img'=>'nullable|image|mimes:jpg,jpeg,png',
        	'author_id'=>'required|exists:authors,id'
]);
        $book = Book::find($id);
        $img_name = $book->img;
        if($request->img !== null){
            $img = $request->img;
            $ext = $img->getClientOriginalExtension();
            $img_name = "book-".uniqid().".$ext";
            $img->move(public_path('uploads'),$img_name);
            if($book->img !== null){
		      unlink(public_path("uploads/$book->img"));
		    }
        }
        $book->update(['name'=>$request->name,'desc'=>$request->desc,'price'=>$request->price,'img'=>$img_name,'author_id'=>$request->author_id]);
        return back(); //return redirect(route('editbook',$id));
    }
    public function delete($id){
       $book = Book::find($id);
       $img = $book->img;
       if($img !== null){
       	unlink(public_path("uploads/$img"));
       }
       $book->delete();
        return back();
    }
}