<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     */

    public function index()
    {
        $products=Product::orderBy('id','desc')->get();
        return view('admin.product.product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.product.add_product',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('product_image', $new_image);

            $product = new Product();
            $product->category_id = $request->category_id;
            $product->product_image = $new_image;
            $product->product_name = $request->product_name;
            $product->product_address = $request->product_address;
            $product->product_price = $request->product_price;
            $product->save();
            return redirect()->route('products')->with('message','Add Successfully');
        }
        else{
            return redirect()->route('products.create');
        }
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
        $product=Product::find($id);
        $categories=Category::all();
        return view('admin.product.update_product',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product=Product::find($id);
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('product_image', $new_image);
            $product->category_id = $request->category_id;
            $product->product_image = $new_image;
            $product->product_name = $request->product_name;
            $product->product_address = $request->product_address;
            $product->product_price = $request->product_price;
            $product->save();
            return redirect()->route('products')->with('message','Update Successfully');
        }
        else{
            $product->category_id = $request->category_id;
            $product->product_name = $request->product_name;
            $product->product_address = $request->product_address;
            $product->product_price = $request->product_price;
            $product->save();
            return redirect()->route('products')->with('message','Update Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return back()->with('message','Delete Successfully');
    }
    public function destroyall(Request $request)
    {
        $ids = $request->ids;
        Product::whereIn('id', $ids)->delete();
        return redirect()->back()->with('message','Delete Successful');
    }
    public function search(Request $request){
        if ($request->ajax()) {
        $output = '';
        $products=Product::where('product_name','like','%'.$request->search.'%')->get();
        foreach ($products as $key => $product) {
                        
                            $output .= '<tr>
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value=""></td>
                            <td>'.$product->id.'</td>
                            <td><img src="'.url('product_image/'.$product->product_image).'" width="100px" class="img-flush" alt=""></td>
                            <td>'.$product->product_name.'</td>
                            <td>'.$product->category->category.'</td>
                            <td>'.$product->product_address.'</td>
                            <td>'.$product->price.'</td>
                            <td><a href="/admin/products/'.$product->id.'/edit"><button class="btn btn-primary"><i class="fas fa-user-edit"></i></button></a></td>
                            <td>
                                    <form action="/admin/products/'.$product->id.'" method="post">
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
