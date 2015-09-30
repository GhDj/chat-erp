<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Chats;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Log;

use App\User;

class ChatController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$chats = Chats::latest()->get();
		return view('chat.index', compact('chats'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('chat.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.


		$token    = csrf_token();
		$name 	  = $request->input('id_u1');
		$name2 	  = $request->input('id_u2');
		$email    = $request->input('message');
		$aze 	  = false;
		$aze2	  = false;
		$arrayX = array(
			'_token'   => $token,
			'id_u1'	   => $name,
			'id_u2'    => $name2,
			'message'  => $email,
			'u1_ty'    => $aze,
			'u2_ty'    => $aze2
			);
		Chats::create($arrayX);
		return redirect('chat');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$chat = Chats::findOrFail($id);
		return view('chat.show', compact('chat'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$chat = Chats::findOrFail($id);
		return view('chat.edit', compact('chat'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.
		$chat = Chats::findOrFail($id);
		$chat->update($request->all());
		return redirect('chat');
	}

	public function retrieveChatMessages()
    {
    	$username = Input::get('user1');
    	$username2 = Input::get('user2');





    	$message = Chats::where( function ($query) use($username, $username2){
    		$query->where('id_u1', '=', $username)->orwhere('id_u1', '=', $username2);
    	})
    	->where( function ($query1) use($username, $username2){
    		$query1->where('id_u2', '=', $username)->orwhere('id_u2', '=', $username2);
    	})->get();




    	return $message;

    	
    	




    	Log::info($message);
    

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Chats::destroy($id);
		return redirect('chat');
	}

}
