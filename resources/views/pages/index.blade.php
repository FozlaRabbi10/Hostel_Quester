@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 align-self-center">
            <div class="slide-item-car-dealer-form">
                <div class="ltn__car-dealer-form-tab">
                    <div class="ltn__tab-menu  text-uppercase">
                        <div class="nav">
                            <a class="active show" data-bs-toggle="tab" href="#ltn__form_tab_1_1"><i class="fas fa-home"></i>Search Hostel</a>

                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                            <div class="car-dealer-form-inner">
                                <form action="{{ route('mees.index') }}" method = "get" class="ltn__car-dealer-form-box row">
                                    <div class="ltn__car-dealer-form-item ltn__custom-icon col-lg-12 col-md-12">
                                        <select name = "place">
                                            @foreach($locations as $location)
                                                <option value = "{{ $location  -> name }}">{{ $location  -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="car-price-filter-range col-lg-12">
                                        <div class="btn-wrapper text-center">
                                            <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> -->
                                            <button type="submit"  class="btn theme-btn-1 btn-effect-1 text-uppercase">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
