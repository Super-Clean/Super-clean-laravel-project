@extends('layouts.app')
@section('content')

    <script>
        function myFunctionForCar() {
            var service_type = document.getElementById("service_type").value;
            console.log('no_of_workers', service_type);

            if (service_type === "Sedan") {
                var price = 5
            } else if (service_type === "4X4") {
                var price = 6
            } else {
                var price = 7
            }
            console.log(price);
            document.getElementById("price").value = price;
            document.getElementById("price1").innerHTML = price + " JOD";
        }
    </script>
    <div class="container">

    <form method="post" action="{{route('service.store')}}">
        @csrf
        {{--                service_category--}}
        <div class="form-group">
            <h1>Cars</h1>
            <input type="hidden" name="service_category" value="Cars">
        </div>
        {{--            service_type--------------}}
        <div class="form-group">
            <label for="service_type">Car Types</label>
            <select onchange="myFunctionForCar()" name="service_type" class="form-control" id="service_type" required>
                <option value="Sedan">Sedan</option>
                <option value="4X4">4X4</option>
                <option value="Van">Van</option>
            </select>
        </div>
        {{--            address        --}}
        <div class="form-group">
            <label for="address">address</label>
            <input name="address" type="text" class="form-control" id="address" placeholder="address" required>
        </div>
        {{--            date--}}
        <div class="form-group row">
            <label for="date" class="col-2 col-form-label" required>Date and time</label>
            <div class="col-10">
                <input name="date" class="form-control" type="datetime-local"  id="date">
            </div>
        </div>

        <input type="hidden" name="no_of_hours" value=1>
        <input type="hidden" name="no_of_workers" value=1>


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
            <label for="price">Price :</label>
            <input name="price" type="hidden" id="price">
            <h6 style="display: inline-block" id="price1"></h6>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

@endsection


