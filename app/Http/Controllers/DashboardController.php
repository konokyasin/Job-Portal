<?php

namespace App\Http\Controllers;

use App\Job;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('admin.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.read', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|min:3|unique:posts',
            'description' => 'required|min:20',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', 'public');

            Post::create([
                'title' => $title = $request->get('title'),
                'slug' => Str::slug($title),
                'description' => $request->get('description'),
                'image' => $path,
                'status' => $request->get('status'),
            ]);

        }
        return redirect('/dashboard')->with('success', 'Post created successfully!!');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:20',
            'image' => 'mimes:jpeg,jpg,png'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', 'public');

            Post::where('id', $id)->update([
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'image' => $path,
                'status' => $request->get('status'),
            ]);

        }
        $this->updateAllExceptImage($request,$id);
        return redirect()->back()->with('success','Post updated successfully!!');

    }

    public function updateAllExceptImage(Request $request,$id){
        return Post::where('id',$id)->update([
            'title'=>$title=$request->get('title'),
            'description'=>$request->get('description'),
            'status'=>$request->get('status')
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('danger', 'Post move to trash!!');
    }

    public function deletePermanently($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();
        $post->deleteImage();
        return redirect()->back()->with('danger', 'Post Deleted Permanently!!');
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.trash', compact('posts'));
    }

    public function restore($id)
    {
        Post::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Post Restored successfully!!');
    }

    public function toggle($id)
    {
        $post = Post::find($id);
        $post->status = ! $post->status;
        $post->save();
        return redirect()->back()->with('success', 'Post status changed successfully!!');
    }

    public function getAllJobs()
    {
        $jobs = Job::latest()->get();
        return view('admin.jobs', compact('jobs'));
    }

    public function changeJobStatus($id)
    {
        $job = Job::find($id);
        $job->status = ! $job->status;
        $job->save();
        return redirect()->back()->with('success', 'Job status changed successfully!!');
    }

}
