<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\login;
use App\Models\workassign;
use App\Models\addwork;

use DB;
class userauthcontroller extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    function register()
    {
        return view('auth.register');
    }
    function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:logins2',
            'password'=>'required|min:8|max:12',
            'role'=>'required|in:ADM,USR',
            'doj'=>'required',
            'img'=>'required',

            ]);

        $login = new login();
        $login->name = $request->name; 
        $login->email = $request->email; 
        $login->password = Hash::make($request->password); 
        $login->role = $request->role; 
        $login->doj = $request->doj; 
        $login->img = $request->img; 

        $query=$login->save();

        if($query)
            return back()->with('success', 'You have been sucessfully registered');
            else
            return back()->with('fail','Something went wrong');
        }

        function check(Request $request){
            $request->validate([
                'email'=>'required|email',
                'password'=>'required|min:8|max:12',
            ]);
            $login_admin=login::where('email','=',$request->email)->where('role','=','ADM')->first();
            $login_user=login::where('email','=',$request->email)->where('role','=','USR')->first();

            if($login_admin)
            {
                if(Hash::check($request->password,$login_admin->password))
                      {
                        $request->session()->put('LoggedUser',$login_admin->id);
                        return redirect('profile');
                      }
                else
                      {
                          return back()->with('fail','Invalid Password');
  
                      }     
            }           
        
            elseif($login_user)
            {        
                if(Hash::check($request->password,$login_user->password))
                    {
                        $request->session()->put('LoggedUser',$login_user->id);
                        return redirect('profileuser');
                    }
                
                else
                    {
                        return back()->with('fail','Invalid Password');

                    }
                
            }
            else{
                return back()->with('fail','No account found for this email');
            
        }}

        function profile()
        {
            $this->middleware('check');
             $log=login::where('id','=',Session('LoggedUser'))->first();


            $logins = DB::select('select * from logins2');
            return view('admin.profile',['logins'=>$logins,'log'=>$log]);

          //  if(Session()->has('LoggedUser')){
            //    $login=login::where('id','=',Session('LoggedUser'))->first();
             //   $data=[
               //     'LoginUserInfo'=>$login
                //];
            }
        
        function profileuser()
        {   
         //   $login=workassign::where('id','=',Session('LoggedUser'))->first();

            $works = DB::select('select * from work_assign');
return view('user.profileuser',['works'=>$works]);
            
            /*
            if(Session()->has('LoggedUser')){
            $work=workassign::where('email','=',Session('LoggedUser'))->get();
            $data=[
                'LoginUserInfo'=>$work
            ];
        }
           
           return view('user.profileuser', $data);
        */   
        }
           // if(Session()->has('LoggedUser')){
             //   $login=login::where('id','=',Session('LoggedUser'))->first();
               // $data=[
                 //   'LoginUserInfo'=>$login
                //];
            

          /*  function showWorkassigned(Request $request){

                $work=workassign::where('email','=',Session('LoggedUser'))->first();

                $users = DB::select('select * from work_assign');
                return view('stud_view',['users'=>$users]);
            }
            */
        

        function logout(){
            if(session()->has('LoggedUser')){
                session()->pull('LoggedUser');
                return redirect('/login');
            }
        }

        function assign(){

            return view('user.assignwork');
        }

        function work(Request $request){

            $request->validate([
                'email'=>'required|email',
                'company'=>'required',
                'worktype'=>'required',
                'description'=>'required',
    
            ]);
    
            $work = new workassign();
            $work->email= $request->email; 
            $work->company_name = $request->company; 
            $work->work_type = $request->worktype; 
            $work->description = $request->description; 
    
            $query=$work->save();
            $login_user=login::where('email','=',$work->email)->where('role','=','USR')->first();

            if($query && $login_user)
                return back()->with('success', 'Work Sucessfully Assigned');
                else
                return back()->with('fail','Entered email not belongs to any user');
            }
            

            function edit($id)
            {
             $data = login::find($id);
            return view('edit2',['data'=>$data]);
            //,compact('data'));
        }
             function update(Request $request)
             {
                $userUpdate = [
                    'id'    =>  $request->id,
                    'name'          =>  $request->name,
                    'email'         =>  $request->email,
                    'role'     =>  $request->role,
                    'img'  =>  $request->img
                ];
                // return dd($userUpdate);
              $query=  DB::table('logins2')->where('id',$request->id)->update($userUpdate);

                if($query)
            return back()->with('success', 'User Sucessfully Updated');
            else
            return back()->with('fail','Something went wrong');
        
             }

/*
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'role' => 'requiredin:ADM,USR'
                ]);
                login::where('id',$id)->update($request->all());
                return redirect()->back()->with('success','Update Successfully');
            }
            */
    function destroy($id)
    {
//        $request->delete();
$login = login::find($id);
$login->delete();
return redirect('/profile')->with('success', 'Data is successfully deleted');

//return view('delete', ['login' => $login], compact('login'));
  //      return redirect()->route('profile');
            //    $login=login::where('id','=',$id->id)->first();
              //       $login->delete();
 
       // return redirect('/profile')->with('success', 'Data is successfully deleted');
    }

    function add()
    {
return view('addwork2');
    }

    function added(Request $request)
    {
        $request->validate([
            'name'=>'required',         
            'email'=>'required|email',
            'date'=>'required',
            'worktype'=>'required',
            'comments'=>'required',

        ]);

        $add = new addwork();
        $add->name= $request->name; 
        $add->email= $request->email; 
        $add->date = $request->date; 
        $add->worktype = $request->worktype; 
        $add->comments = $request->comments; 

        $query=$add->save();

        if($query)
            return back()->with('success', 'Work Sucessfully Added');
            else
            return back()->with('fail','Something Went Wrong');
        }
        
        function status(){
            

            $addworks = DB::select('select * from addworks');
            return view('status',['addworks'=>$addworks]);
        }
    }
        
    




        
    

