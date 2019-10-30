@extends('layouts.app')
@section('content')
    @if (Route::has('login'))

        <div class="top-right links">
            @auth

                <div class="container">
                    <!-- services -->
                    <section class="services-w3ls">
                        <div class="container py-xl-5 py-lg-3">
                            <div class="row">
                                <div class="col-md-4 p-sm-0">
                                    <div class="icons-w3ls text-white p-4">
                                        <i class="fas fa-home  py-4"></i>
                                        <h5 class="text-uppercase"><a href="/create/places">Places Cleaning</a></h5>
                                    </div>
                                </div>
                                <div class="col-md-4 p-sm-0 my-md-0 my-5">
                                    <div class="icons-w3ls text-white p-4 mid-sec-agile" style="height: 167px">
                                        <h5 class="text-uppercase pb-2 text-center"><a style="color: white"
                                                                                       href="/create/cars">Cars
                                                Cleaning</a></h5>
                                        <i class="fas fa-car py-4"></i>
                                    </div>

                                </div>
                                <div class="col-md-4 p-sm-0">
                                    <div class="icons-w3ls text-white p-4">
                                        <i class="fas fa-braille py-4"></i>
                                        <h5 class="text-uppercase"><a href="/create/laundries">Laundries Cleaning</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- //services -->
                    {{--                    <a class="btn btn-primary mx-2" href="/create/cars" role="button">Cars</a>--}}
                    {{--                    <a class="btn btn-danger mx-2" href="/create/laundries" role="button">Laundries</a>--}}
                    {{--                    <a class="btn btn-success mx-2" href="/create/places" role="button">Places</a>--}}
                    <div class="row">
                        <h1 class="col" style="margin-bottom: 20px">Booking Status</h1>
                        <form class="col" method="post" action="{{route('service.filter')}}">
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
                            <button style="display: none" id="submit_f" type="submit" class="btn btn-primary">Submit
                            </button>
                        </form>
                    </div>
                </div>
                <div class="container">
                    @if ($quaries->count()>0)
                        @foreach ($quaries as $quary)
                            <div class="col-12  card shadow  border-left border-<?php
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
                                            <h6>City : Amman</h6>
                                            <h6 style=" text-transform: capitalize">Address : {{$quary->address}}</h6>
                                            <h6 style=" text-transform: capitalize">Category
                                                :{{$quary->service_category}}</h6>
                                            <h6 style=" text-transform: capitalize"> Types
                                                :{{$quary->service_type}}</h6>
                                            <h6 style=" text-transform: capitalize">Description
                                                :{{$quary->description}}</h6>

                                        </div>
                                        <div class="col">
                                            <h6><i class=" fa fa-calculator" style="font-size:24px"> :</i>
                                                {{$quary->date}}</h6>
                                            @if($quary->service_category==='Laundries')

                                                <h6><i class="fa fa-hashtag" style="font-size:24px"></i>
                                                    {{$quary->no_of_workers}} Pieces</h6>
                                            @elseif($quary->service_category==='Places')
                                                <h6><i class="fa fa-clock-o" style="font-size:24px"> :</i>
                                                    {{$quary->no_of_hours}} Hours</h6>
                                                <h6><i class="fa fa-group" style="font-size:24px"> :</i>
                                                    {{$quary->no_of_workers}} Persons</h6>
                                            @else

                                            @endif

                                            <h6><i class="fa fa-money-bill-alt" style="font-size:24px"> :</i>
                                                {{$quary->price}} JOD</h6>
                                            <small style="font-weight: bold">Create at : {{$quary->created_at}}</small>
                                            @if($quary->is_approve === "waiting")
                                                <form style="position: absolute;    bottom: 5px;    right: 10px;" class="float-right " method='post' action='/service/{{$quary->id}}'>
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger mb-2">Delete</button>
                                                </form>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @else
                    @endif
                    <script>
                        function subCat() {
                            document.getElementById("submit_f").click();
                            console.log('{{$filter}}')
                            // $(document).ready(()=>{
                            //     $('#decline').attr("selected",true);
                            //     // $('#status').val( 'decline' );
                            // });
                        }
                    </script>
                    @else
                        <div class="container ">
                            <h1 style="text-align: center;">Please Login </h1>
                        </div>

                    @endauth
                </div>
    @endif

@endsection


