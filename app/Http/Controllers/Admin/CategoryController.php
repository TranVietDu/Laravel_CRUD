<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('id','desc')->get();
        return view('admin.category.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=new Category();
        $category->category=$request->category;
        $category->save();
        return redirect()->route('categories')->with('message','Add Successfully');
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
        $category=Category::find($id);
        return view('admin.category.update_category',compact('category'));
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
        $category=Category::find($id);
        $category->category=$request->category;
        $category->save();
        return redirect()->route('categories')->with('message','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return back()->with('message','Delete Successfully');
    }
    public function destroyall(Request $request)
    {
        $ids = $request->ids;
        Category::whereIn('id', $ids)->delete();
        return redirect()->back()->with('message','Delete Successful');
    }
    public function search(Request $request){
        if ($request->ajax()) {
        $output = '';
        $categories=Category::where('category','like','%'.$request->search.'%')->get();
        foreach ($categories as $key => $category) {
                        
                            $output .= '<tr>
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value=""></td>
                            <td>'.$category->id.'</td>
                            <td>'.$category->category.'</td>
                            <td><a href="/admin/categories/'.$category->id.'/edit"><button class="btn btn-primary"><i class="fas fa-user-edit"></i></button></a></td>
                            <td>
                                    <form action="/admin/categories/'.$category->id.'" method="post">
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
        public function viewProduct($id){
            $products=Category::find($id)->products;
            return view('admin.category.product',compact('products'));
        }
}
