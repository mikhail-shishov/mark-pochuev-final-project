<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function index(): View {
        $posts = Post::whereNotNull('published_at')->orderByDesc('published_at')->paginate(10);

        return view('pages.index', compact('posts'));
    }

    public function show(Post $post): View {
        return view('pages.post', compact('post'));
    }

    public function about(): View {
        return view('pages.about');
    }

    public function contact(): View {
        return view('pages.contact');
    }

    public function contactSubmit(Request $request): RedirectResponse {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        return back()->with('success', 'Your message has been sent!');
    }
}
