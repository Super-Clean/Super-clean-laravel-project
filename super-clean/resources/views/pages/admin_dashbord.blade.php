@extends('layouts.app')
@section('content')
    <div class="container">
        @if (Route::has('login'))
            @auth
                @if (Auth::user()->name==="naaman")
                    <div class="row">
                        <h1 class="col" style="margin-bottom: 20px">ADMIN DASHBOARD</h1>

                    <form class="col" method="post" action="{{route('Admin.store')}}">
                        @csrf
                            <div onchange="subCat()" class="col-5 form-group float-right form-inline">
                                <label style="margin-right:20px " for="service_type">Filter</label>
                                <select name="status" value="{{$filter}}" class="form-control" id="status" required>
                                    <option <?php if ($filter === "All status") {
                                        echo 'selected ';
                                    } ?>value="All status">All status</optionse>
                                    <option <?php if ($filter === "waiting") {
                                        echo 'selected ';
                                    } ?>value="waiting">Waiting
                                    </option>
                                    <option <?php if ($filter === "approved") {
                                        echo 'selected ';
                                    } ?>value="approved">Approved
                                    </option>
                                    <option <?php if ($filter === "decline") {
                                        echo 'selected ';
                                    } ?>value="decline">Decline
                                    </option>
                                </select>
                        </div>
                        <button style="display: none" id="submit_f" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    <div class="container">
                        @foreach ($quaries as $quary)
                            <div style="border-width:2px" class="col-12  card shadow  border-left border-<?php
                            if ($quary->is_approve === "waiting")
                                echo 'warning';
                            elseif ($quary->is_approve === "approved")
                                echo 'success';

                            else
                                echo 'danger';
                            ?>  mb-2">
                                <div style="margin-top: 10px">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="text-center bg-<?php
                                            if ($quary->is_approve === "waiting")
                                                echo 'warning text-black';
                                            elseif ($quary->is_approve === "approved")
                                                echo 'success text-white';
                                            else
                                                echo 'danger text-white';
                                            ?>" style=" text-transform: capitalize">{{$quary->is_approve}}</h3>
                                            <h6 style=" text-transform: capitalize">user name : {{$quary->user->name}}</h6>
                                            <h6>Email : {{$quary->user->email}}</h6>
                                            <h6>Phone : {{$quary->user->phone}}</h6>
                                            <hr>
                                            <h6 style=" text-transform: capitalize">Category :{{$quary->service_category}}</h6>
                                            <h6 style=" text-transform: capitalize">Type of service :{{$quary->service_type}}</h6>
                                            <h6 style=" text-transform: capitalize">Description :{{$quary->description}}</h6>

                                        </div>
                                        <div class="col">
                                            <h6>City : Amman</h6>
                                            <h6 style=" text-transform: capitalize"><i class="fa fa-map-marker" style="font-size:24px"> : </i>{{$quary->address}}</h6>
                                            <h6><i class=" fa fa-calculator" style="font-size:24px"> :</i>
                                                {{$quary->date}}</h6>
                                            @if($quary->service_category==='Laundries')

                                                <h6><i class="fa fa-hashtag" style="font-size:24px"></i>
                                                    {{$quary->no_of_workers}} Pieces</h6>
                                            @elseif($quary->service_category==='Places')
                                                <h6><i class="fa fa-clock-o" style="font-size:24px"> :</i>
                                                    {{$quary->no_of_hours}} hours</h6>
                                                <h6><i class="fa fa-group" style="font-size:24px"> :</i>
                                                    {{$quary->no_of_workers}} persons</h6>
                                            @else

                                            @endif
                                            <h6><i class="fa fa-money-bill-alt" style="font-size:24px"> :</i>
                                                {{$quary->price}} JOD</h6>
                                            <small style="font-weight: bold">Create at : {{$quary->created_at}}</small>

                                            <div class="row justify-content-xl-around align-items-end mt-2 mb-2">
                                                @if($quary->is_approve==="waiting")
                                                    <form style=" margin:auto; display: inline-block" method="post"
                                                          action="{{route('Admin.update',['id' => $quary->id])}}">
                                                        @csrf
                                                        @method("put")
                                                        <input name="is_approve" type="hidden" value="approved">
                                                        <button type="submit" class="btn btn-success">Approve</button>
                                                    </form>
                                                    <form style="margin:auto; display: inline-block" method="post"
                                                          action="{{route('Admin.update',['id' => $quary->id])}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input name="is_approve" type="hidden" value="decline">
                                                        <button type="submit" class="btn btn-danger">Decline</button>
                                                    </form>
                                                @elseif($quary->is_approve==="approved")
                                                    <form style="margin:auto; display: inline-block" method="post"
                                                          action="{{route('Admin.update',['id' => $quary->id])}}">
                                                        @method('PUT')
                                                        @csrf
                                                        <input name="is_approve" type="hidden" value="waiting">
                                                        <button type="submit" class="btn btn-warning">On Waiting</button>
                                                    </form>
                                                    <form style=" margin:auto; display: inline-block" method="post"
                                                          action="{{route('Admin.update',['id' => $quary->id])}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input name="is_approve" type="hidden" value="decline">
                                                        <button type="submit" class="btn btn-danger">Decline</button>
                                                    </form>
                                                @else
                                                    <form style="margin:auto; display: inline-block" method="post"
                                                          action="{{route('Admin.update',['id' => $quary->id])}}">
                                                        @method('PUT')
                                                        @csrf
                                                        <input name="is_approve" type="hidden" value="waiting">
                                                        <button type="submit" class="btn btn-warning">On Waiting</button>
                                                    </form>

                                                    <form style="margin:auto; display: inline-block" method="post"
                                                          action="{{route('Admin.update',['id' => $quary->id])}}">
                                                        @csrf
                                                        @method("put")
                                                        <input name="is_approve" type="hidden" value="approved">
                                                        <button type="submit" class="btn btn-success">Approve</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <script>
                        console.log('{{$filter}}')

                        function subCat() {
                            document.getElementById("submit_f").click();
                            console.log('{{$filter}}')
                        }
                    </script>
                @endif
            @else
                <div class="container ">
                    <h1 style="color: red">ONLY Admins Can Access Please Login </h1>
                </div>
            @endauth
    @endif
    </div>

@endsection




