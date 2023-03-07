<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'date' => "required|date_format:Y-m-d",
            'price' => 'required|numeric|min:0'
        ]);
        return Event::create($request->all());
    }

    
    public function show(string $id)
    {
        return Event::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $event->update($request->all());
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return Event::destroy($id);
    }

    public function search(string $name)
    {
        return Event::where('name', 'like', '%'.$name.'%' )->get();
    }
}
