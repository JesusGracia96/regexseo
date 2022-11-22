<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Like;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class ImagesController extends Controller
{
    public function index() {
        $images = Image::where('authorized', '=', '1')
            ->leftjoin('users', 'users.id', '=', 'images.userid')
            ->leftjoin('likes', 'likes.imageid', '=', 'images.id')
            ->select('images.id', 'images.name','images.title', 'images.description', 'users.email', DB::raw("count(likes.imageid) as count"))
            ->orderBy('images.created_at', 'desc')
            ->groupBy('images.id', 'images.name','images.title', 'images.description', 'images.likes', 'users.email',)
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

    public function favorites(){
        $images = Image::leftjoin('likes', 'images.id', '=', 'likes.imageid')
            ->where('likes.userid', '=', Auth::id())
            ->leftjoin('users', 'images.userid', '=', 'users.id')
            ->select('images.id','images.name','images.title', 'images.description','users.email',DB::raw("count(likes.imageid) as count"))
            ->groupBy('images.id','images.name','images.title', 'images.description','users.email')
            ->orderBy('likes.created_at', 'desc')
            ->get();
        
        return view('favorites', ['images' => $images]);
    }

    public function addFavorite(Request $request){
        $id = explode('-', $request->imgId);
        $response = [];
        if(Like::where('imageid', '=', $id[2])->where('userid', '=', Auth::id())->count() > 0){
            $favorite = Like::where('imageid', '=', $id[2])->where('userid', '=', Auth::id())->first(); 
            $favorite->forceDelete();   
        }else {
            $favorite = Like::firstOrNew(['imageid' => $id[2], 'userid' => Auth::id()]);
            $favorite->imageid = $id[2];
            $favorite->userid = Auth::id();
            $favorite->save();
            $response[] = "liked";
        }
        $likeCount = Like::where('imageid', '=', $id[2])->count();
        $response[] = $likeCount;
        
        echo json_encode($response);
    }
}
