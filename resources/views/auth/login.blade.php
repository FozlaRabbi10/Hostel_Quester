@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 align-self-center">
            <div class="slide-item-car-dealer-form">
                <div class="ltn__car-dealer-form-tab">
                    <div class="ltn__tab-menu  text-uppercase">
                        <div class="nav">
                            <a class="active show" data-bs-toggle="tab" href="#ltn__form_tab_1_1"><i class="fas fa-home"></i>Login</a>

                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                            <div class="car-dealer-form-inner">
                                <form action="{{ route('login') }}" method="post" class="ltn__car-dealer-form-box row">
                                    @csrf
                                    <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-6 col-md-6">
                                        <input type = "text" name = "email" class = "@error('email') is-invalid @enderror"  placeholder="Email" value = "{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                    </div>
                                    <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-car col-lg-6 col-md-6">
                                        <input type = "password" name = "password" class = "@error('password') is-invalid @enderror"  placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                    </div>
                                    <div class="car-price-filter-range col-lg-12">
                                        <div class="btn-wrapper text-center">
                                            <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> -->
                                            <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Login</button>
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
