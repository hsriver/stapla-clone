<?php

namespace App\Http\Controllers;

use App\Category;
use App\Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function showCreateForm()
    {
        $category = Auth::user()->category;
        return view('Materials.create', ['category' => $category]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'material_name' => 'required|max:25',
        ]);

        $material = new Material();
        $material->category_id = $request->category_id;
        $material->material_name = $request->material_name;
        //画像の保存
        if ($request->image) {
            $path = $request->file('image')->store('public/material');
        //画像パスの保存
        $read_path = str_replace('public/', '', $path);
        $material->image = $read_path;
        } else {
            $material->image = "";
        }
        // $path = $request->file('image')->store('public/material');
        // //画像パスの保存
        // $read_path = str_replace('public/', '', $path);
        // $material->image = $read_path;

        $material->save();

        return redirect()->route('log.create');
    }
}
