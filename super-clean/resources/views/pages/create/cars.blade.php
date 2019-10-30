@extends('layouts.app')
@section('content')
    @if (Route::has('login'))
        @auth
            <script>
                function myFunctionForCar() {
                    var service_type = document.getElementById("service_type").value;

                    if (service_type === "Sedan") {
                        var price = 5
                    } else if (service_type === "4X4") {
                        var price = 6
                    } else {
                        var price = 7
                    }
                    document.getElementById("price").value = price;
                    document.getElementById("price1").innerHTML = price + " JOD";
                }
            </script>
            <div class="container">

                <form method="post" action="{{route('service.store')}}">
                    @csrf
                    {{--                service_category--}}
                    <div class="form-group">
                        <h1 style="margin-top: 50px ;color: whitesmoke;padding: 10px 0px 10px 0px ;text-align: center;
                             background-color:#22a6f5; margin-bottom: 20px">CARS CLEANING</h1>
                        <input type="hidden" name="service_category" value="Cars">
                    </div>
                    {{--            service_type--------------}}
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="service_type">Service Type</label>
                        <div class="col-10">
                            <select onchange="myFunctionForCar()" name="service_type" class="form-control"
                                    id="service_type" required>
                                <option value="Sedan">Sedan</option>
                                <option value="4X4">4X4</option>
                                <option value="Van">Van</option>
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

                    <input type="hidden" name="no_of_hours" value=1>
                    <input type="hidden" name="no_of_workers" value=1>

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


