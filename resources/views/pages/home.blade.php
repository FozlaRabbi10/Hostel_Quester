@extends('layouts.app')

@section('body')
    <div class = "row justify-content-center" style="margin-top: 100px">
        <div class = "col-md-4">
            <div class = "slider">
                @for($items = 1; $items <= 10; $items++)
                <div class="card shadow-sm">
                    <img class="card-img" src="{{ asset('img/cloud.jpg') }}" alt="">
                    <div class="card-body text-center">
                        <h5 class="card-title  text-center font-weight-bolder">Motihar Chatrabas {{ $items }}</h5>
                        <p class = "text-center font-weight-bolder">Contact : 01969311081</p>
                        <a href="#" class="btn btn-success text-center">More Details</a>
                    </div>
                </div>
                @endfor

            </div>
        </div>
    </div>
@endsection
