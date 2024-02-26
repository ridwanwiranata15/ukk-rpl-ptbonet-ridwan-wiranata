<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        //ambil data galleri dengan judul slide
        $gallery = Post::where('judul', 'Slider')->first()->galery->where('status', 'aktif')->first();
        $sliders = $gallery->images;

        // ambil data post galleri sekolah kecuali slider
        $posts = Post::whereHas('kategori', function($query){
            $query->where('judul', 'Galeri Sekolah');
        })->where('judul','!=', 'Slider')->get();

        //ambil data post agenda sekolah

        $agendas = Post::whereHas('kategori', function($query){
            $query->where('judul', 'Agenda Sekolah');
        })->get();

        //ambil data post informasi terkini

        $informations = Post::whereHas('kategori', function($query){
            $query->where('judul', 'Informasi terkini');
        })->first();

        //ambil data post peta
        $map = Post::whereHas('kategori', function($query){
            $query->where('judul', 'peta');
        })->first();
        return view('home', [
            'sliders' => $sliders,
            'posts' => $posts,
            'agendas' => $agendas,
            'information' => $informations,
            'map' => $map
        ]);
    }
}
