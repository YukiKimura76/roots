<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;
use Validator;  //この2行を追加！
use Auth;       //この2行を追加！

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'asc')->get();
        return view('message', [
            'message' => $message
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'sender_name' => 'required',
            'date' => 'required',
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/message')
                ->withInput()
                ->withErrors($validator);
        }
        // Eloquentモデル
        $messages = new Message;
        $messages->sender_name   = $request->sender_name;
        $messages->date = $request->date;
        $messages->save();
        return redirect('/message');
    }

    /**
     * Display the specified resource.
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(message $message)
    {
        $message->delete();       //追加
        return redirect('/message');  //追加
    }
}
