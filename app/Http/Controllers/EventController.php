<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->where('date', '>=', date('Y-m-d'))->filter(request(['search']))->paginate(6);
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
        return redirect()->back();
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

    public function regEvents() {
        $events = auth()->user()->events()->where('date', '>=', date('Y-m-d'))->paginate(6);
        return view('regevents', ['events' => $events]);
    }

    public function myEvents() {
        $events = auth()->user()->createdEvents()->paginate(6);
        return view('myevents', ['events' => $events]);
    }

    public function delete($id) {
        $event = Event::find($id);
        $event->delete();
        return redirect()->back();
    }
}
