<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class FileController extends Controller
// {
//     public function index()
//     {
//         return view('file.form');
//     }
//     public function store(Request $request)
//     {
//     $request->validate([
//         'picture' => 'file|required|mimes:jpeg,bmp,png,jpg'
//     ]);
//         $name = $request->file('picture')->store('pictures_path', ['disk' => 'public']);
//        // return $name;
//         return redirect()->route('file.form')->with('success','Yuklandi!');
//     }
// }
