<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('home', ['events' => $events]);
    }

    public function register($id) {
        $event = Event::find($id);
        $event->users()->attach(auth()->user()->id);
        return redirect('/home');
    }

    public function unregister($id) {
        $event = Event::find($id);
        $event->users()->detach(auth()->user()->id);
        return redirect('/home');
    }

    public function create(Request $request) {
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->location = $request->location;
        $event->user_id = auth()->user()->id;
        $event->save();
        return redirect('/home');

    }
}
