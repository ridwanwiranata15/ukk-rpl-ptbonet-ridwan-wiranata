<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Post;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        Gallery::create([
            'post_id' => $request->post,
            'position' => $request->position,
            'status' => $request->status
        ]);
        return redirect()->route('admin.gallery.index');
    }
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit', compact('gallery'), ['posts' => Post::all()]);
    }
    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->update([
            'post_id' => $request->post,
            'position' => $request->position,
            'status' => $request->status
        ]);
        return redirect()->route('admin.gallery.index');
    }
    public function delete($id)
    {
        $gallery = Gallery::find($id);
        if($gallery->images()->exists()){
            return redirect()->back()->with('alert', 'Yang anda hapus sedang di gunakan oleh image');
       }else{
            $gallery->delete();
            return redirect()->route('admin.category.index');
       }
    }
}
