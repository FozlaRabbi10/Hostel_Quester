@extends('layouts.profile_layout')
@section('title_first')
    Home
@endsection
@section('title_second')
    Hostel List
@endsection
@section('content')
    <!-- SHOPING CART AREA START -->
    <div class="liton__shoping-cart-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-inner">
                        <div class="shoping-cart-table table-responsive">
                            <table class="table">
                                <tbody>
                                @foreach($mees as $record)
                                <tr>
                                    <td class="cart-product-image">
                                        <a href="#"><img src="{{ URL :: to($record -> photo) }}" alt="#"></a>
                                    </td>
                                    <td class="cart-product-info">
                                        <h4><a href="#">{{ $record -> name }}</a></h4>
                                    </td>
                                    <td class="cart-product-price">{{ $record -> contact_number }}</td>
                                    <td>
                                       <a class = "btn btn-sm btn-info" href = "{{ route('mees.view',['mees_id' => $record -> id]) }}">Details</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPING CART AREA END -->
@endsection
