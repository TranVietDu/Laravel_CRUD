<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePricingRequest;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function index()
    {
        $pricing_plans=PricingPlan::orderBy('id','desc')->get();
        return view('admin.pricing_plan.pricing_plan',compact('pricing_plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pricing_plan.add_pricing_plan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePricingRequest $request)
    {
        PricingPlan::create($request->all());
        return redirect()->route('pricing_plans')->with('message','Add Successfully');
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
        $pricing_plan=PricingPlan::find($id);
        return view('admin.pricing_plan.update_pricing_plan',compact('pricing_plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePricingRequest $request, $id)
    {
        $pricing_plan=PricingPlan::find($id);
        $pricing_plan->update($request->all());
        return redirect()->route('pricing_plans')->with('message','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pricing_plan=PricingPlan::find($id);
        $pricing_plan->delete();
        return back()->with('message','Delete Successfully');
    }
    public function destroyall(Request $request)
    {
        $ids = $request->ids;
        PricingPlan::whereIn('id', $ids)->delete();
        return redirect()->back()->with('message','Delete Successful');
    }
    public function search(Request $request){
        if ($request->ajax()) {
        $output = '';
        $pricing_plans=PricingPlan::where('package','like','%'.$request->search.'%')
        ->orwhere('price','like','%'.$request->search.'%')->get();
        foreach ($pricing_plans as $key => $pricing_plan) {
                        
                            $output .= '<tr>
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value=""></td>
                            <td>'.$pricing_plan->id.'</td>
                            <td>'.$pricing_plan->price.'</td>
                            <td>'.$pricing_plan->package.'</td>
                            <td>'.$pricing_plan->content_1.'</td>
                            <td>'.$pricing_plan->content_2.'</td>
                            <td>'.$pricing_plan->content_3.'</td>
                            <td>'.$pricing_plan->content_4.'</td>
                            <td>'.$pricing_plan->content_5.'</td>
                            <td>'.$pricing_plan->content_6.'</td>
                            <td><a href="/admin/pricing_plans/'.$pricing_plan->id.'/edit"><button class="btn btn-primary"><i class="fas fa-user-edit"></i></button></a></td>
                            <td>
                                    <form action="/admin/pricing_plans/'.$pricing_plan->id.'" method="post">
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
