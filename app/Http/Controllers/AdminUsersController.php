<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\User;
use App\Role;
use App\Photo;
use Storage;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view ('admin.users.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
         $status = 0 ; 
         $photo_id = 0 ;
        if ($request->is_active == 'on') 
        {
            $status = 1;

        }
          
        
         if ($file = $request->file('photo'))
         {
            $name = time().$file->getClientOriginalName();
          // Storage::disk('local')->put($file, $name
          $file->move('images' , $name) ;
                     //$path = $request->photo->storeAs('images', $name);
            $photo = Photo::create(['path'=> $name]);
            $photo_id = $photo->id;
            
         }

        $user =  User::create(['name'=>$request->name , 'email'=>$request->email , 'password'=>$request->password , 'role_id'=>$request->role_id , 
            'is_active' =>$status  , 'photo_id' => $photo_id]);

        return redirect('/admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view ('admin.users.edit' , compact('user' , 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $input = $request->all();

        if ($request->is_active == 'on') 
        {
            $input['is_active'] = 1;

        }
        else { $input['is_active'] = 0;}
          

        

           if ($file = $request->file('photo_id'))
         {
            $name = time().$file->getClientOriginalName();
          // Storage::disk('local')->put($file, $name
            $file->move('images' , $name) ;
                     //$path = $request->photo->storeAs('images', $name);
            $photo = Photo::create(['path'=> $name]);
            $input['photo_id'] = $photo->id;
            
         }

         $user->update($input);

         return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      unlink(public_path() . "/images" . $user->photo->path);
      $user->delete();
      
    }
}
