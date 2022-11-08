<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = upload_img($request->file('image'), 'image');
        } else {
            unset($data['image']);
        }
        $general = Product::create($data);

        return $general ? redirect(getRoute('product.index'))->with(['success' => trans('general.slider.slider_saved')]) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($local, $id)
    {
        $data = Product::findorfail($id);
        return view('admin.product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($local, $id)
    {
        $data = Product::findOrfail($id);
        return view('admin.product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($local, ProductRequest $request, $id)
    {
        $data =  $request->all();
        $general = Product::findOrfail($id);
        if ($request->hasFile('image')) {
            $data['image'] = upload_img($request->file('image'), 'image');
        } else {
            $data['image'] =  $general->image;
        }
        $general->fill($data)->save();
        return $general ? redirect(getRoute('product.index'))->with(['success' => trans('general.slider.slider_updated')]) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($local, $id)
    {
        $general = Product::findOrfail($id);
        $general->translations()->delete();
        $general->delete();
        return redirect(getRoute('product.index'))->with(['success' => trans('general.slider.slider_deleted')]);
    }
}
