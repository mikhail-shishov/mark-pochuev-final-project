<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Contact;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $posts = Post::whereNotNull('published_at')->orderByDesc('published_at')->paginate(10);

        if ($request->ajax()) {
            $html = '';
            foreach ($posts as $post) {
                $html .= '<div class="post-preview">
                            <a href="'.route('posts.show', $post).'">
                                <h2 class="post-title">'.e($post->title).'</h2>
                                <h3 class="post-subtitle">'.e($post->content).'</h3>
                            </a>
                            <p class="post-meta">
                                Posted on '.$post->published_at.'
                            </p>
                        </div>';
            }

            return response()->json([
                'html' => $html,
                'nextPageUrl' => $posts->nextPageUrl(),
            ]);
        }

        return view('pages.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        return view('pages.post', compact('post'));
    }

    public function about(): View
    {
//        return view('pages.about');
        $page = Page::where('slug', 'about')->firstOrFail();
        return view('pages.about', compact('page'));
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function contactSubmit(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Your message has been sent!');
    }
}
