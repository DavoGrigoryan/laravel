<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
class PostController extends Controller
{
    public function index(){
        return view('front.addPost');
    }

    public function store(Request $request){
        $userId=Auth::user()->id;

        $this->validate($request,[
            'title'    =>  ['required', 'string', 'max:80'],
            'text'    =>  ['required', 'string'],
            'image'   => ['sometimes','image','mimes:jpg,png,jpeg,svg','max:5000'],
        ]);
        $image=$request->image;
        if($image){
            $imageUploaded=request()->file('image');
            $imageName=time().'.'.$imageUploaded->getClientOriginalExtension();
            $imagePath=public_path('/images/');
            $imageUploaded->move($imagePath,$imageName);
            Post::create([
                'userId'  => $userId,
                'title'   => $request->title,
                'text'    => $request->text,
                'image'   => $imageName,
            ]);
            return redirect('/user-page');
        }
    }

    public function edit($id){
        $post=Post::find($id);
        return view('front.editPage',compact('post'));
    }

    public function update(Request $request,$id){
        $post=Post::find($id);
        $this->validate($request,[
            'title'    =>  ['required', 'string', 'max:80'],
            'text'    =>  ['required', 'string'],
            'image'   => ['sometimes','image','mimes:jpg,png,jpeg,svg','max:5000'],
        ]);

        $data=$request->all();
        $post->title=$data['title'];
        $post->text=$data['text'];

        $image=$request->image;
        if($image){
            $imageUploaded=request()->file('image');
            $imageName=time().'.'.$imageUploaded->getClientOriginalExtension();
            $imagePath=public_path('/images/');
            $imageUploaded->move($imagePath,$imageName);
            $post->image=$imageName;
            $post->save();
            return redirect('/user-page');
        }
    }
    public function destroy($id){
        Post::destroy($id);
        return redirect('/user-page');
    }
}
