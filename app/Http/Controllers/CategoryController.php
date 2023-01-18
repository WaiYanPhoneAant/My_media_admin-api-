<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //return to view template
    public function index(){
        $categories=Category::select('category_id as id','name','description')
        ->when(request('searchKey'),function($query)
        {
            $query->orWhere('name','like','%'. request('searchKey') .'%')
            ->orWhere('description','like','%'. request('searchKey') .'%');
        })->OrderBy('category_id','DESC')->paginate(3);
        $categories->appends(request()->all());
        return view('admin.category.index',compact('categories'));
    }

    // categoryCreate

    public function categoryCreate(Request $request){
        $this->CategoryDataValidator($request->toArray());
        Category::create($request->toArray());
        return back()->with(['success'=>'Successfully create category']);
    }

    // to delete category
    public function categoryDelete($id)
    {
        # code...
        $del=Category::where('category_id',$id)->delete();
        return returnSuccess($del,'Successfully deleted');
    }

    // to Update category
    public function categoryUpdate(Request $request,$id)
    {

        # code...
        $data=$this->UpdateCategoryData($request);
        $this->UpdateCategoryDataValidator($request->toArray(),$id);
        $update=Category::where('category_id',$id)->update($data);
        return returnSuccess($update,'Successfully Update');

    }




    // get data from update form
    private function UpdateCategoryData($request)
    {
        # code...
        return [
            'name'=>$request->Updatename,
            'description'=>$request->Updatedescription,

        ];
    }
    // update data validation
    private function CategoryDataValidator($request){

        return Validator::make($request,[
            'name' => 'required|unique:categories',
            'description'=>'required',

        ])->validate();
    }
    private function UpdateCategoryDataValidator($request,$id){

        return Validator::make($request,[
            'Updatename' => ['required',
                Rule::unique('categories', 'name')->ignore($id,'category_id'),
            ],
            'Updatedescription'=>'required',

        ],['unique'=>'This category name has already been taken.'])->validate();
    }

}
