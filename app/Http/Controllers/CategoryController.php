<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        Category::create([
            'judul' => $request->title
        ]);
        return redirect()->route('admin.category.index');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update(['title' => $request->title]);
        return redirect()->route('admin.category.index');
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
       if($category->post()->exists()){
            return redirect()->back()->with('alert', 'Yang anda hapus sedang di gunakan oleh post');
       }else{
            $category->delete();
            return redirect()->route('admin.category.index');
       }
    }
}
