@extends('layouts.app')
@section('content')
    @if (Route::has('login'))
            @auth
                <div class="container">
                    <script>
                        function myFunctionForP() {
                            var service_type = document.getElementById("service_type").value;
                            var h = document.getElementById("no_of_workers").value;
                            var p = document.getElementById("no_of_hours").value;
                            if (service_type === "Home") {
                                var price = 5 * h * p
                            } else if (service_type === "Office") {
                                var price = 4 * h * p
                            } else {
                                var price = 8 * h * p
                            }

                            document.getElementById("price").value = price;
                            document.getElementById("price1").innerHTML = price + " JOD";
                        }
                    </script>
                    <form method="post" action="{{route('service.store')}}">
                        @csrf
                        {{--                service_category--}}

                        <div class="form-group">
                            <h1 style="margin-top: 50px ;color: whitesmoke;padding: 10px 0px 10px 0px ;text-align: center;
                             background-color:#16293e; margin-bottom: 20px">PLACES CLEANING</h1>
                            <input type="hidden" name="service_category" value="Places">
                        </div>

                        {{--            service_type--------------}}
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="service_type">Service Type</label>
                            <div class="col-10">
                                <select onchange="myFunctionForP()" name="service_type" class="form-control"
                                        id="service_type" required>
                                    <option value="Home">Home</option>
                                    <option value="Office">Office</option>
                                    <option value="Garden">Garden</option>
                                </select>
                            </div>
                        </div>

                        {{--            address         --}}
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="address">City</label>
                            <div class="col-10">
                                <input name="city" disabled value="Amman" type="text" class="form-control" id="address"
                                       placeholder="address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="address">Address</label>
                            <div class="col-10">
                                <input name="address" type="text" class="form-control" id="address"
                                       placeholder="address"
                                       required>
                            </div>
                        </div>

                        {{--            date            --}}
                        <div class="form-group row">
                            <label for="date" class="col-2 col-form-label">Date and Time</label>
                            <div class="col-10">
                                <input name="date" class="form-control" type="datetime-local" id="date">
                            </div>
                        </div>
                        {{--            no_of_hours--}}

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="no_of_hours">How many hours ?</label>
                            <div class="col-10">
                                <input oninput="myFunctionForP()" name="no_of_hours" type="number" class="form-control"
                                       value=1 id="no_of_hours"
                                       placeholder="Default is 1 Hour">
                            </div>
                        </div>


                        {{--            no_of_workers--}}
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="no_of_workers">How many workers ?</label>
                            <div class="col-10">
                                <input oninput="myFunctionForP()" name="no_of_workers" value=1 type="number"
                                       class="form-control" id="no_of_workers"
                                       placeholder="Default is 1 Person">
                            </div>
                        </div>

                        {{--            price--}}
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="price">Price in JOD :</label>
                            <div class="col-10">
                                <input name="price" disabled value="5" type="text" class="form-control" id="price"
                                       placeholder="price">
                                <input name="price" type="hidden" class="form-control" id="price" placeholder="price">
                            </div>
                        </div>

                        {{--            description--}}
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="description">Notes</label>
                            <div class="col-10">
                                <textarea rows="3" name="description" type="text" class="form-control" id="description"
                                          placeholder="Do you have any notes ? Please  tell us .. "></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            @else
                <div class="container ">
                    <h1 style="text-align: center;">Please Login</h1>
                </div>
                <script>
                    setTimeout(function(){ location.replace("/login") }, 2000);
                </script>
            @endauth
    @endif

@endsection


