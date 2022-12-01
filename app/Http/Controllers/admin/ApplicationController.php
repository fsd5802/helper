<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Application::get();
        return view('admin.application.index',compact('data'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($locale,$id)
    {
        $application = Application::where('id',$id)->first();
        return view('admin.application.show',compact('application'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application=Application::findorfail($id);
        $application->delete();
        return redirect()->back();
    }

    public function download($locale,Request $request){
        $document=Application::findorfail($request->id);
        $pathToFile=$document->cv;
        return response()->download($pathToFile);
        }
}
