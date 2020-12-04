<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function saveJob($id)
    {
        $jobId = Job::find($id);
        $jobId->favourites()->attach(auth()->user()->id);
        return redirect()->back();
    }

    public function unSaveJob($id)
    {
        $jobId = Job::find($id);
        $jobId->favourites()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
