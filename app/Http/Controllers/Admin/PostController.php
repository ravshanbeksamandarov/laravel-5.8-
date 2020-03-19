<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Image;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short' => 'required',
            'content' => 'required|min:50',
            'img' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        $name = $request->file('img')->store('posts', ['disk' => 'public']);

        $full_path = storage_path('app/public/'.$name);
        $full_thumb_path = storage_path('app/public/thumbs/'.$name);
        $thumb = Image::make($full_path);

        //Proporsiya bilan qirqib olish;
        // $thumb->resize(300,300, function($constraint)
        // {
        //     $constraint->aspectRatio();
        // })->save($full_thumb_path);

        //Kvadrat qilib qirqib olish;
        $thumb->fit(350, 350, function($constraint)
        {
            $constraint->aspectRatio();
        })->save($full_thumb_path);

        $data = [
            'title' => $request->title,
            'short' => $request->short,
            'content' => $request->content,
            'img' => $name,
            'thumb' => 'thumbs/'.$name
        ];
         Post::create($data);

       // Post::create($request->post());


        return redirect()->route('admin.posts.index')->with(['success' => "Xabar qo'shildi!"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::findOrFail($id);
        // dd($update);

         return view("admin.posts.edit",compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'short' => 'required',
            'content' => 'required|min:50',
            'img' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);
        if ($request->file('img')) {

            Storage::disk('public')->delete([
                $post->img,
                $post->thumb
            ]);

            $name = $request->file('img')->store('posts', ['disk' => 'public']);
            $thumb_name = 'thumbs/'.$name;

            $full_path = storage_path('app/public/'.$name);
            $full_thumb_path = storage_path('app/public/'.$thumb_name);
            $thumb = Image::make($full_path);
            //Kvadrat qilib qirqib olish;
            $thumb->fit(350, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($full_thumb_path);
        }
        else {
            $name = $post->img;
            $thumb_name = $post->thumb;
        }
        $post->update([
            'title' => $request->post('title'),
            'short' => $request->post('short'),
            'content' => $request->post('content'),
            'img' => $name,
            'thumb' => $thumb_name
        ]);
        return redirect()->route('admin.posts.index')->with(['success' => "Xabar yangilandi!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Post::findOrFail($id);

        $model->delete();

        return redirect()->route('admin.posts.index')->with(['delete' => "Xabar o'chirildi"]);
    }
}
