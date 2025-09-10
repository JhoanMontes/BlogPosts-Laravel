<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {

        if ($request->get('for-my')) {
            $user = $request->user();

         
            $user_ids = $user->friends()->pluck('id')->push($user->id);



            $posts = Post::whereIn('user_id', $user_ids)->latest()->with('user')->get();

        } else {
            $posts = Post::latest()->with('user')->get();

        }

        return view('dashboard', compact('posts'));
    }

    public function profile(User $user)
    {
        $posts = $user->posts()->latest()->get();

        return view('profile', compact('user', 'posts'));

    }

    public function status(Request $request)
    {
        $requests = $request->user()->pendingTo()->get();
        $sent = $request->user()->pendingFrom()->get();
        $friends = $request->user()->friends();
        return view('status', compact('requests', 'sent', 'friends'));

    }
}
