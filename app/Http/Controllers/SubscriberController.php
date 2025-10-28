<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;
use App\Models\Event;

class SubscriberController extends Controller
{
    public function subscribe(Event $event, Request $request) {
        if (auth()->user()->id !== $event['user_id']) {
            $saveResult['event_id'] = $event->id;
            $saveResult['user_id'] = auth()->id();
            Subscribe::create($saveResult);
        }
        return redirect('/');
    }
}
