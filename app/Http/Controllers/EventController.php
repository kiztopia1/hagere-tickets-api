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

        $event= [
            'name' => $request->name,
            'date' => $request->date,
            'price' => $request->price,
            'user_id' => auth()->user()->id
        ];
        return Event::create($event);
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
    public function search_by_tag(string $tag)
    {
        return Event::where('tags', 'like', '%'.$tag.'%' )->get();
    }
}
