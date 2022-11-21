<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class ImagesController extends Controller
{
    public function index() {
        $images = Image::where('authorized', '=', '1')
            ->select('images.id', 'images.name','images.title', 'images.description', 'images.likes', 'users.email')
            ->leftjoin('users', 'users.id', '=', 'images.userid')
            ->orderBy('images.created_at', 'desc')
            ->get();

        return view('index', ['images' => $images]);
    }

    public function upload(){
        return view('upload');
    }

    public function save(Request $request) {
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,svg|max:5120',
            'title' => 'required',
            'description' => 'required'
        ]);

        $imageName = Str::uuid()->toString() . "." . $request->image->extension();

        $request->image->storeAs('images', $imageName);

        $image = new Image();
        $image->name = $imageName;
        $image->title = $request->title;
        $image->description = $request->description;
        if(Auth::user()){
            $image->userId = Auth::id();
            $image->authorized = 1;
        }else {
            $image->userId = null;
        }
        $image->save();

        return redirect('/')->with('message', 'Image uploaded, if you are not registered you must wait for the image to be validated');
    }

    public function moderation(){
        $images = Image::where('authorized', '=', '0')->get();
        return view('moderation', ['images' => $images]);
    }

    public function allow(Request $request){
        $id = explode('-', $request->imgId);
        $image = Image::find($id[2]);
        $image->authorized = 1;
        $image->save();
        return ['response' => true];
    }
}
