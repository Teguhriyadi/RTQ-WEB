<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = [
            "data_kategori" => Kategori::get(),
            "data_blog" => Blog::get()
        ];

        return view("app.super_admin.blog.v_index", $data);
    }

    public function store(Request $request)
    {
    }
}
