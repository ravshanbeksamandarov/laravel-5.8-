<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SiteController extends Controller
{
    public function home()
    {
        return view('home');
        // $shops = [
        //     ['name' => 'John Doe', 'type' => 'Stom'],
        //     ['name' => 'Buster Keaton', 'type' => 'Lor'],
        //     ['name' => 'Zafar', 'type' => 'Test'],
        //     ['name' => 'Nodir', 'type' => 'Test 2'],
        // ];
        // return view('home', compact('shops')); //['doctors' => $doctors] <=> compact('doctors')
    }

    public function shop()
    {
        return view('shop');
    }

    public function single()
    {
        return view('single');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function blog()
    {
        // $posts = Post::orderBy('id', 'DESC')->paginate(3);
        $posts = Post::latest()->paginate(3);
        $links = $posts->links();

        return view('blog', compact('posts', 'links'));
    }

    public function blogs($id)
    {
        $post = Post::findOrFail($id);

        $post->increment('views');

        $most_viewed = Post::orderBy('views', 'DESC')->limit(3)->get();

        return view('blogs', [
            'post' => $post,
            'most_posts' => $most_viewed
            ]);
    }

    // public function blogs()
    // {
    //     return view('blogs');
    // }

    public function card()
    {
        return view('card');
    }

}
