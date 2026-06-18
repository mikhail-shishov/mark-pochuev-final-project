<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class AdminController extends Controller {
    public function index(): View {
        $posts = Post::orderByDesc('created_at')->take(5)->get();
        return view('admin.index', compact('posts'));
    }
}
