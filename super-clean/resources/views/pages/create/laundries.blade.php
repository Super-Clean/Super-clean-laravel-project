@extends('layouts.app')
@section('content')
    @if (Route::has('login'))
            @auth
                <div class="container">
                    <script>
                        function myFunction() {
                            var service_type = document.getElementById("service_type").value;
                            var no_of_workers = document.getElementById("no_of_workers").value;
                   ;

                            if (service_type === "Clothes") {
                                var price = 1 * no_of_workers

                            } else if (service_type === "Carpet") {
                                var price = 7 * no_of_workers
                            } else {
                                var price = 3 * no_of_workers
                            }

                            document.getElementById("price").value = price;
                            document.getElementById("price1").innerHTML = price +"JOD";

                        }
                    </script>
                    <form method="post" action="{{route('service.store')}}">
                        @csrf
                        {{--                service_category--}}

                        <div class="form-group">
                            <h1>Laundries</h1>
                            <input type="hidden" name="service_category" value="Laundries">
                        </div>

                        {{--            service_type--------------}}
                        <div class="form-group">
                            <label for="service_type"></label>
                            <select onchange="myFunction()" name="service_type" class="form-control" id="service_type" required>
                                <option value="Clothes">Clothes</option>
                                <option value="Carpet">Carpet</option>
                                <option value="Blanket">Blanket</option>

                            </select>
                        </div>
                        {{--            address--}}
                        <div class="form-group">
                            <label for="address">address</label>
                            <input name="address" type="text" class="form-control" id="address" placeholder="address" required>
                        </div>
                        {{--            date    --}}
                        <div class="form-group row">
                            <label for="date" class="col-2 col-form-label" required>Date and time</label>
                            <div class="col-10">
                                <input name="date" class="form-control" type="datetime-local"  id="date">
                            </div>
                        </div>
                        <input type="hidden" name="no_of_hours" value=1>
                        {{--            no_of_workers--}}
                        <div class="form-group">
                            <label for="no_of_workers">How many pieces?</label>
                            <input oninput="myFunction()" name="no_of_workers" value=1 type="number" class="form-control" id="no_of_workers"
                                   placeholder="Default is 1 Person">
                        </div>


                        {{--            description--}}
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="description">Notes</label>
                            <div class="col-10">
                    <textarea rows="3" name="description" type="text" class="form-control" id="description"
                              placeholder="Do you have any notes ? Please  tell us .. "></textarea>
                            </div>
                        </div>
                        {{--            price--}}
                        <div class="form-group">
                            <label for="price">price</label>
                            <input  name="price" type="hidden" class="form-control" id="price" placeholder="price">
                            <h6 style="display: inline-block" id="price1">1JOD</h6>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            @else
                <div class="container ">
                    <h1>Please Login </h1>
                    <a href="{{ route('login') }}">Login</a>
                    <h6>OR</h6>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                </div>

            @endauth
    @endif
@endsection


