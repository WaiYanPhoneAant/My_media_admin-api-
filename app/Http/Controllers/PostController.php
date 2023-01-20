<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //return to view template
    public function index(){
        $category=Category::get();
        $posts=Post::OrderBy('id','desc')->paginate(4);
        return view('admin.post.index',compact('posts','category'));
    }
    //postCreate
    public function postCreate(Request $request)
    {
        # code...

        $this->postValidator($request->toArray());
        $file=$request->file('image');

        if($file){
            $fileName=uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/postImage',$fileName);
            $data=$this->getPostData($request,$fileName);
        }else{
            $data=$this->getPostData($request,Null);
        }

        Post::create($data);
        return returnSuccess($data,'Successfully create post');
    }
    private function getPostData($data,$fileName){
        return [
            'title'=>$data->title,
            'description'=>$data->description,
            'image'=>$fileName,
            'category_id'=>$data->category_id,
        ];
    }
    private function postValidator($data)
    {
        # code...
        return Validator::make($data,[
            'title'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'image'=>'mimes:jpg,bmp,png,jpeg,webp'
        ])->validate();
    }
}
