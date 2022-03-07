<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();

        return view('messages.index', compact('messages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titel' => 'required',
            'content' => 'required',
        ]);

        Message::create($request->all());

        return redirect()->route('messages.index')
            ->with('success', 'Messages created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $request->validate([
            'titel' => 'required',
            'content' => 'required',

        ]);
        $message->update($request->all());

        return redirect()->route('messages.index')
            ->with('success', 'Message updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('messages.index')
            ->with('success', 'Project deleted successfully');
    }
}
