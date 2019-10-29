@extends('layouts.app')
@section('content')
    <div class="container">

   <form method="post" action="{{route('service.filter')}}">
       @csrf
      <div class="form-group">
            <label for="status">Status</label>
         <select name="status" class="form-control" id="status" required>
            <option value="waiting">waiting</option>
              <option value="approved">approved</option>
               <option value="decline">decline</option>
            </select>
      </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

    <div class="container">
        @foreach ($quaries as $quary)
            <div class="col-10  card shadow  border-left border-<?php
            if ($quary->is_approve === "waiting")
                echo 'warning';
            elseif ($quary->is_approve === "approved")
                echo 'success';
            else
                echo 'danger';
            ?>  mb-2">
                <div style="margin-top: 10px">
                    {{--
                    <div class="progress-bar bg-mb-2" role="progressbar" style="width: 100%" --}}
                    {{-- aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Waiting--}}
                    {{--
                </div>
                --}}
                    <div class="row">
                        <div class="col">
                            <h3 class="text-center bg-<?php
                            if ($quary->is_approve === "waiting")
                                echo 'warning text-black';
                            elseif ($quary->is_approve === "approved")
                                echo 'success text-white';

                            else
                                echo 'danger text-white';
                            ?>">{{$quary->is_approve}}</h3>
                            <h6>City : Amman</h6>
                            <h6>Address : {{$quary->address}}</h6>
                            <h6>Category :{{$quary->service_category}}</h6>
                            <h6>Type of service :{{$quary->service_type}}</h6>
                            <h6>Description :{{$quary->description}}</h6>

                        </div>
                        <div class="col">
                            <h6><i class=" fa fa-calculator" style="font-size:24px"> :</i>
                                {{$quary->date}}</h6>

                            <h6><i class="fa fa-clock-o" style="font-size:24px"> :</i>
                                {{$quary->no_of_hours}} hours</h6>
                            <h6><i class="fa fa-group" style="font-size:24px"> :</i>
                                {{$quary->no_of_workers}} persons</h6>
                            <h6><i class="fa fa-money" style="font-size:24px"> :</i>
                                {{$quary->price}} JOD</h6>
                            <small style="font-weight: bold">Create at : {{$quary->created_at}}</small>

                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection


