<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function deleteEvent(Event $event){
        if (auth()->user()->id === $event['user_id']) {
            $event->delete();
        }
        return redirect('/');
    }
    public function updateEvent(Event $event, Request $request) {
        if (auth()->user()->id !== $event['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'happen_date' => 'required',
            'location' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['location'] = strip_tags($incomingFields['location']);
        $incomingFields['happen_date'] = strip_tags($incomingFields['happen_date']);
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
            'happen_date' => 'required',
            'location' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['location'] = strip_tags($incomingFields['location']);
        $incomingFields['happen_date'] = strip_tags($incomingFields['happen_date']);
        $incomingFields['user_id'] = auth()->id();
        
        Event::create($incomingFields);
        return redirect('/');
    }
}
