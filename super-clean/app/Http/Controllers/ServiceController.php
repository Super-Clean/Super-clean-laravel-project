<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $quaries = Service::where('user_id', $user_id)->with('user')->orderBy('created_at', 'desc')->get();
        return view('pages.user_dashbord', compact('quaries'));
    }

    public function create()
    {
    }

    public function store()
    {

        $service = new Service();
        $service->service_category = request('service_category');
        $service->service_type = request('service_type');
        $service->no_of_hours = request('no_of_hours');
        $service->no_of_workers = request('no_of_workers');
        $service->price = request('price', 10);
        $service->address = request('address');
        $service->description = request('description', "");
        $service->date = request('date');
        $service->user_id = Auth::id();
        $service->save();
        return redirect()->route('service.index');
    }

    public function show($status)
    {
        return $status;
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function filter(Request $request)
    {
        $user_id = Auth::id();

//        $quaries = Service::where('user_id', $user_id)->with('user')->get();
        $quaries = Service::where('is_approve', $request->input("status"))->where('user_id', $user_id)->with('user')->get();
        return view('pages.user_dashbord', compact('quaries'));
    }

    public function destroy($id)
    {
      Service::findOrFail($id)->delete();
//        $Article = Article::where('id', $id)->delete();
        return redirect()->route('service.index');
    }

}
