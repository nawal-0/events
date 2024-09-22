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
}
