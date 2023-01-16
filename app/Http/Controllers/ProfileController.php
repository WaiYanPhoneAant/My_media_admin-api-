<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class ProfileController extends Controller
{
    //return to view template
    public function index(){
        return view('admin.profile.index');
    }

    // updating account info
    public function Accupdate(Request $request){
        $data=$this->UpdateData($request);
        $this->AdminDataValidator($data);
        User::where('id',Auth::user()->id)->update($data);
        return back()->with(['success'=>'Update Success']);
    }


    // return to password Change Page
    public function PasswordChangePage(){
        return view('admin.profile.passwordChange');
    }
    //change Password
    public function PasswordChange(Request $request)
    {
        # code...
        $this->PasswordValidate($request);
        $user=User::where('id',Auth::user()->id)->first();
        if(Hash::check($request->oldPassword, $user->password)){
            $newPw=Hash::make($request->newPassword);
            User::where('id',Auth::user()->id)->update(['password'=>$newPw]);
            return back()->with(['success'=>'password Changed Successfully']);
        }else{
            return back()->with([
                'wrongPw'=>'old password is wrong'
            ]);
        }
    }



    // get data from update form
    private function UpdateData($request)
    {
        # code...
        return [
            'name'=>$request->adminName,
            'email'=>$request->adminEmail,
            'phone'=>$request->adminPhone,
            'gender'=>$request->adminGender,
            'address'=>$request->adminAddress,

        ];
    }

    // update data validation
    private function AdminDataValidator($request){

        return Validator::make($request,[
            'name'=>'required',
            'email' => 'required|unique:users,email,'.Auth::user()->id,
            'phone'=>'integer'
        ])->validate();
    }

    //Validation For Password Change

    private function PasswordValidate($reqeust){
        return Validator::make($reqeust->toArray(),[
            'oldPassword'=>'required',
            'newPassword'=>'required|min:8',
            'confirmPassword'=>'required|same:newPassword'
        ])->validate();
    }
}
