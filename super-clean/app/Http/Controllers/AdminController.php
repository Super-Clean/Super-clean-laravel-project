<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quaries = Service::with('user')->get();
        return view('pages.admin_dashbord',compact('quaries'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//filter for the status
    {
//        return $request->input("status");
        $quaries = Service::where('is_approve', $request->input("status"))->with('user')->get();
//        return $quaries;
        return view('pages.admin_dashbord',compact('quaries'));
//        return view("pages.admin_dashbord");



    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $article = Article::where('id', $id)->with(['user','comments' => function($q) {$q->with('user'); }])->first();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//put to change is_approve
    {
        $Article= Service::where('id', $id)->update(['is_approve' => $request->input("is_approve")]);
        return redirect()->route('Admin.index');
//        return redirect()->back();

//        return $request->input("is_approve");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
