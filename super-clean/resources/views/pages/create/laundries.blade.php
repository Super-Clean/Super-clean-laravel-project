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
                            <h1 style="margin-top: 50px ;color: whitesmoke;padding: 10px 0px 10px 0px ;text-align: center;
                             background-color:#16293e; margin-bottom: 20px">LAUNDRIES CLEANING</h1>
                            <input type="hidden" name="service_category" value="Laundries">
                        </div>

                        {{--            service_type--------------}}
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="service_type">Service Type</label>
                            <div class="col-10">
                            <select onchange="myFunction()" name="service_type" class="form-control" id="service_type" required>
                                <option value="Clothes">Clothes</option>
                                <option value="Carpet">Carpet</option>
                                <option value="Blanket">Blanket</option>

                            </select>
                        </div>                        </div>

                        {{--            address--}}
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
                        {{--            no_of_workers--}}
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="no_of_workers">How many pieces?</label>
                            <div class="col-10">
                            <input oninput="myFunction()" name="no_of_workers" value=1 type="number" class="form-control" id="no_of_workers"
                                   placeholder="Default is 1 Person">
                        </div></div>

                        {{--            price      --}}
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="price">Price in JOD :</label>
                            <div class="col-10">
                                <input name="price" disabled value="1" type="text" class="form-control" id="price"
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


