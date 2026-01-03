<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Training;


class EventController extends Controller
{
    public function show($slug)
    {
        $training = Training::where('slug', $slug)->firstOrFail();
        return view('event-show', compact('training'));
    }
}
