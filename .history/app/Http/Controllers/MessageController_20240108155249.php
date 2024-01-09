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
        //
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
             'item_name' => 'required|min:3|max:255',
            'item_number' => 'required | min:1 | max:3',
                'item_amount' => 'required | max:6',
                'published'   => 'required',
        ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // Eloquentモデル
        $messages = new Message;
        $messages->sender_name   = $request->sender_name;
        $messages->date = $request->date;
        $messages->save();
        return redirect('/');
  
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
        //
    }
}
