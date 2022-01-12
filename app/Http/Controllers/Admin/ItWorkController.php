<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkRequest;
use App\Models\ItWork;
use Illuminate\Http\Request;

class ItWorkController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $it_works=ItWork::orderBy('id','desc')->paginate(10);
        return view('admin.it_work.it_work',compact('it_works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.it_work.add_it_work');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkRequest $request)
    {
        ItWork::create($request->all());
        return redirect()->route('it_works')->with('message','Add Successfully');
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
        $it_work=ItWork::find($id);
        return view('admin.it_work.update_it_work',compact('it_work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWorkRequest $request, $id)
    {
        $it_work=ItWork::find($id);
        $it_work->update($request->all());
        return redirect()->route('it_works')->with('message','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $it_works=ItWork::find($id);
        $it_works->delete();
        return back()->with('message','Delete Successfully');
    }
    public function destroyall(Request $request)
    {
        $ids = $request->ids;
        ItWork::whereIn('id', $ids)->delete();
        return redirect()->back()->with('message','Delete Successful');
    }
    public function search(Request $request){
        if ($request->ajax()) {
        $output = '';
        $it_works=ItWork::where('title','like','%'.$request->search.'%')
        ->orwhere('content','like','%'.$request->search.'%')->get();
        foreach ($it_works as $key => $it_work) {
                        
                            $output .= '<tr>
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value=""></td>
                            <td>'.$it_work->id.'</td>
                            <td>'.$it_work->title.'</td>
                            <td>'.$it_work->content.'</td>
                            <td><a href="/admin/it_works/'.$it_work->id.'/edit"><button class="btn btn-primary"><i class="fas fa-user-edit"></i></button></a></td>
                            <td>
                                    <form action="/admin/it_works/'.$it_work->id.'" method="post">
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

}
