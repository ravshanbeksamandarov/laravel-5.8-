<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Buy;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_size = env('ADMIN_PAGE_SIZE', 5);
        $buys = Buy::latest()->paginate($page_size);
        $links = $buys->links();

        return view('admin.buys.index', compact('buys', 'links'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buys.create');
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
            'name'   => 'required',
            'money'   => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        $name = $request->file('image')->store('buys', ['disk' => 'public']);

        $full_path = storage_path('app/public/'.$name);
        $full_thumb_path = storage_path('app/public/thumb/'.$name);
        $thumb = Image::make($full_path);
        $thumb->fit(350, 350, function($constraint)
        {
            $constraint->aspectRatio();
        })->save($full_thumb_path);

        $data = [
            'name'   => $request->post('name'),
            'money'   => $request->post('money'),
            'image' => $name,
            'thumb' => 'thumb/'.$name,
        ];
        Buy::create($data);

       // Post::create($request->post());


        return redirect()->route('admin.buys.index')->with(['success' => "Ma`lumot qo'shildi!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buy = Buy::findOrFail($id);

        return view('admin.buys.show', compact('buy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buy = Buy::findOrFail($id);
        // dd($update);
        return view("admin.buys.edit", compact('buy'));
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
        $buy = Buy::findOrFail($id);

        $request->validate([
            'name'   => 'required',
            'money'   => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg',
        ]);
        if ($request->file('image')) {

            Storage::disk('public')->delete([
                $buy->image,
                $buy->thumb
            ]);

            $name = $request->file('image')->store('buys', ['disk' => 'public']);
            $thumb_name = 'thumb/'.$name;

            $full_path = storage_path('app/public/'.$name);
            $full_thumb_path = storage_path('app/public/'.$thumb_name);
            $thumb = Image::make($full_path);
            //Kvadrat qilib qirqib olish;
            $thumb->fit(350, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($full_thumb_path);
        }
        else {
            $name = $buy->img;
            $thumb_name = $buy->thumb;
        }
        $buy->update([
            'name'   => $request->post('name'),
            'money'   => $request->post('money'),

            'image' => $name,
            'thumb' => $thumb_name,
        ]);
        return redirect()->route('admin.buys.index')->with(['success' => "Ma`lumot yangilandi!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Buy::findOrFail($id);

        $model->delete();

        return redirect()->route('admin.buys.index')->with(['delete' => "Ma`lumot o'chirildi"]);
    }
}
