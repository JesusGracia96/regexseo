<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller
{
    public function index() {
        $images = Image::all()->count();
        

        return view('index', ['images' => $images]);
    }
}
