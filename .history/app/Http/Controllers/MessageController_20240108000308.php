<?php

namespace App\Http\Controllers;

use App\Models\message;
use GuzzleHttp\Psr7\Message as Psr7Message;
use Illuminate\Http\Request;

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
        // Eloquentモデル
        $messages = new Psr7Message;
        $messages->item_name   = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->published   = $request->published;
        $books->save(); 
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