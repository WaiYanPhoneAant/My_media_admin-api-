<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
        //return to view template
        public function index(){
            $users=User::select('id','name','email','phone','address','gender')
                    ->when(request('searchKey'),function($query){
                        $query->orWhere('name','like','%'. request('searchKey') .'%')
                        ->orWhere('email','like','%'. request('searchKey') .'%')
                        ->orWhere('phone','like','%'. request('searchKey') .'%')
                        ->orWhere('gender','like','%'. request('searchKey') .'%')
                        ->orWhere('address','like','%'. request('searchKey') .'%');
                    })->paginate(10);
            $users->appends(request()->all());
            return view('admin.list.index',compact('users'));
        }
        public function DeleteAccount($id)
        {
            $totalUser=count($this->index()->users);
            if($id==Auth::user()->id){
                return back()->with(['error'=>'Sorry you cannot delete your account ']);
            }else{
               if ($totalUser>1) {
                # code...
                $delete=User::where('id',$id)->delete();
                if($delete){
                    return back()->with(['success'=>'Account Delete Success']);
                }else{
                    return abort('404');
                }
               }else{
                return back()->with(['error'=>'Latest user can\'n delete']);
               }
            }

        }
}
