<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
class MessageController extends Controller
{
    public function send(Request $request){
    	$date = $request->validate([
    		'name'=>'required|string|max:100',
    		'msg'=>'required|string',	
    	]);
    	Message::create($date);
    	return response()->json([
    		'success'=>'your message send successfully'
    	]);
    }
}
