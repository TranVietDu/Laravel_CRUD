<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','desc')->get();
        return view('admin.user.user_manage',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect()->route('users')->with('message','Add user successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.user.update_user',compact('user'));
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
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->save();
        return redirect()->route('users')->with('message','Update user successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('users')->with('message','Delete user successfully');;
    }
    public function destroyall(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id', $ids)->delete();
        return redirect()->back()->with('messge','Delete Successful');
    }
    public function search(Request $request){
        if ($request->ajax()) {
        $output = '';
        $users=User::where('name','like','%'.$request->search.'%')
                    ->orwhere('email','like','%'.$request->search.'%')->get();
        foreach ($users as $key => $user) {
                        
                            $output .= '<tr>
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value=""></td>
                            <td>'.$user->id.'</td>
                            <td>'.$user->name.'</td>
                            <td>'.$user->email.'</td>
                            <td>'.$user->role.'</td>
                            <td><a href="/admin/users/'.$user->id.'/edit"><button class="btn btn-primary"><i class="fas fa-user-edit"></i></button></a></td>
                            <td>
                                    <form action="/admin/users/'.$user->id.'" method="post">
                                    '.csrf_field().'
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                                    </form>
                               </td>
                            </tr>';
                        }
                    }
                    return Response($output);
        }

        public function getRecyclebin(){
            $users=User::onlyTrashed()->get();
            return view('admin.user.recycle_bin_user',compact('users'));
        }
        public function restore($id){
            $user=User::onlyTrashed()->find($id);
            $user->restore();
            return redirect()->route('users.recyclebin')->with('message','Restore successfully');
        }
        public function permanentlyDelete($id){
            $user=User::onlyTrashed()->find($id);
            $user->forceDelete();
            return redirect()->route('users.recyclebin')->with('message','Permanently delete successfully');
        }
}
