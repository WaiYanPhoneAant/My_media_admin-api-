<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //return to view template
    public function index(){
        $categories=Category::select('category_id as id','name','description')
        ->when(request('searchKey'),function($query){
            $query->orWhere('name','like','%'. request('searchKey') .'%')
            ->orWhere('description','like','%'. request('searchKey') .'%');
        })->OrderBy('category_id','DESC')->paginate(3);
        $categories->appends(request()->all());
        return view('admin.category.index',compact('categories'));
    }

    // categoryCreate

    public function categoryCreate(Request $request){
        $data=$this->categoryData($request);
        $this->CategoryDataValidator($data);
        Category::create($data);
        return back()->with(['success'=>'Successfully create category']);
    }

    // to delete category
    public function categoryDelete($id)
    {
        # code...
        $del=Category::where('category_id',$id)->delete();
        if($del){
            return back()->with(['success'=>'Successfully delete category']);

        }else{
            return abort('404');
        }
    }
    // get data from update form
    private function categoryData($request)
    {
        # code...
        return [
            'name'=>$request->name,
            'description'=>$request->description,

        ];
    }

    // update data validation
    private function CategoryDataValidator($request){

        return Validator::make($request,[
            'name' => 'required|unique:categories',
            'description'=>'required',
        ])->validate();
    }

}
