<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
        $data=$this->postDataCreate($request);
        Post::create($data);
        return returnSuccess($data,'Successfully create post');
    }

    // delete post
    public function postDelete($id)
    {
        # code...
        $file=Post::select('image')->where('id',$id)->first();
        $this->postFileDeletion($file);
        $delete=Post::where('id',$id)->delete();
        return returnSuccess($delete,'Successfully Deleted');
    }

    // redirect post edit page
    public function postEdit($id){
        $category=Category::get();

        $posts=Post::where('id',$id)->first();
        return view('admin.post.editPost',compact('posts','category'));
    }

    //post update
    public function postUpdate(Request $request,$id){
        $data=$this->postDataCreate($request);
        if($request->image){
            $dbfile=Post::select('image')->where('id',$id)->first();
            $this->postFileDeletion($dbfile);
        }else{
            unset($data['image']);
        }

        Post::where('id',$id)->update($data);
        return returnSuccess($data,'Successfully update post');
    }



    //$data and file create
    private function postDataCreate($request){
        $this->postValidator($request->toArray());
        $file=$request->file('image');
        if($file){
            $fileName=uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/postImage',$fileName);
            return $data=$this->getPostData($request,$fileName);
        }else{
            return $data=$this->getPostData($request,Null);
        }
    }

    //file deletion
    public function postFileDeletion($file)
    {
        # code...
        if(File::exists(public_path().'/postImage/'.$file->image)){
            File::delete(public_path().'/postImage/'.$file->image);
        }
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
