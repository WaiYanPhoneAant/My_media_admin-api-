 <?php

//  All of my helper function is here

 function returnSuccess($cond,$mesg="Successful"){
    if($cond){
        return back()->with(['success'=>$mesg]);

    }else{
        return abort('404');
    }
}
