<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Training;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::where('start_date', '>=', now()->subDays(1)->format('Y-m-d'))
            ->orderBy('start_date')
            ->get()
            ->map(function ($training) {
                return [
                    'id' => $training->id,
                    'city' => $training->city,
                    'slug' => $training->slug,
                    'article_url' => url('/events/' . $training->slug), 
                    'schedule' => $training->schedule_details ?? [],
                ];
            });

        return response()->json($trainings);
    }
}
