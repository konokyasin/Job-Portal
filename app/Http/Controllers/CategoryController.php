<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id)
    {
        $jobs = Job::where('category_id', $id)->paginate(10);
        $categoryName = Category::where('id', $id)->first();
        return view('jobs.jobs-category', compact('jobs', 'categoryName'));
    }
}
