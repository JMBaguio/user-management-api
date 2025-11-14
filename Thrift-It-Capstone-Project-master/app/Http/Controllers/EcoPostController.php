<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEcoPostRequest;
use Illuminate\Http\Request;
use App\Services\EcoPostService;
use Illuminate\Support\Facades\Auth;


class EcoPostController extends Controller
{
    protected $service;

    public function __construct(EcoPostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $posts = $this->service->listPosts()->load('user');
        return view('eco-posts.index', compact('posts'));
    }

    public function create()
    {
        return view('eco-posts.create');
    }

    public function store(StoreEcoPostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
       
        $this->service->createPost($data);

        return redirect()->route('eco-posts.index')->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = $this->service->getPost($id);
        return view('eco-posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = $this->service->getPost($id);
        return view('eco-posts.edit', compact('post'));
    }

    public function update(StoreEcoPostRequest $request, $id)
    {
        $data = $request->validated();
        $this->service->updatePost($id, $data);
        return redirect()->route('eco-posts.index')->with('success', 'Post updated successfully!');
    }
    
    public function destroy($id)
    {
        $this->service->deletePost($id);
        return redirect()->route('eco-posts.index')->with('success', 'Post deleted successfully!');
    }
}
