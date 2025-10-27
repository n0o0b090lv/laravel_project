<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function updateEvent(Event $event, Request $request) {
        if (auth()->user()->id !== $event['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'date' => 'required',
            'location' => 'required',
            'time' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['date'] = strip_tags($incomingFields['date']);
        $incomingFields['location'] = strip_tags($incomingFields['location']);
        $incomingFields['time'] = strip_tags($incomingFields['time']);
        $incomingFields['user_id'] = auth()->id();

        $event->update($incomingFields);
        return redirect('/');
    }
    public function showEditScene(Event $event) {
        if (auth()->user()->id !== $event['user_id']) {
            return redirect('/');
        }
        return view('edit-event',  ['event' => $event]);
    }
    public function createEvent(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'date' => 'required',
            'location' => 'required',
            'time' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['date'] = strip_tags($incomingFields['date']);
        $incomingFields['location'] = strip_tags($incomingFields['location']);
        $incomingFields['time'] = strip_tags($incomingFields['time']);
        $incomingFields['user_id'] = auth()->id();
        Event::create($incomingFields);
        return redirect('/');
    }
}
