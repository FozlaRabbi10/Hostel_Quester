@extends('layouts.profile_layout')
@section('title_first')
    Home
@endsection
@section('title_second')
    My Account
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="ltn__tab-menu-list mb-50">
                <div class="nav">
                    <a class = "active show" data-bs-toggle="tab" href="#ltn_tab_1_2">Profiles <i class="fas fa-user"></i></a>
                    @if(auth() -> user() -> user_type === "Owner")
                    <a data-bs-toggle="tab" href="#ltn_tab_1_5">My Hostel <i class="fa-solid fa-list"></i></a>
                    @elseif(auth() -> user() -> user_type === "Admin")
                        <a data-bs-toggle="tab" href="#ltn_tab_1_5">All Hostel <i class="fa-solid fa-list"></i></a>
                    @endif
                    @if(auth() -> user() -> user_type !== "Customer")
                    <a data-bs-toggle="tab" href="#ltn_tab_1_7">Add New Hostel <i class="fa-solid fa-map-location-dot"></i></a>
                    @endif
                    @if(auth() -> user() -> is_admin == 1)
                        <a data-bs-toggle="tab" href="#locations">Locations<i class="fa-solid fa-map-location-dot"></i></a>
                        <a data-bs-toggle="tab" href="#add_new_location">Add New Location<i class="fa-solid fa-map-location-dot"></i></a>
                    @endif
                    <a href="{{ route('user.logout') }}">Logout <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="tab-content">

                <div class="tab-pane fade active show" id="ltn_tab_1_2">
                    <div class="ltn__myaccount-tab-content-inner">
                        <!-- comment-area -->
                        <div class="ltn__comment-area mb-50">
                            <div class="ltn-author-introducing clearfix">
                                <div class="author-info">
                                    <h2>{{ auth() -> user() -> name }}</h2>
                                    <div class="footer-address">
                                        <ul>
                                            <li>
                                                <div class="footer-address-icon">
                                                    <i class="fa fa-mail-bulk"></i>
                                                </div>
                                                <div class="footer-address-info">
                                                    <p><a href="#">{{ auth() -> user() -> email }}</a></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="ltn_tab_1_5">
                    <div class="ltn__myaccount-tab-content-inner">
                        <div class="ltn__my-properties-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Hostel</th>
                                    <th scope="col"></th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mess_records as $mees)
                                    <tr>
                                        <td class="ltn__my-properties-img">
                                            <a href="#"><img src="{{ URL :: to($mees -> photo) }}" alt="#"></a>
                                        </td>
                                        <td>
                                            <div class="ltn__my-properties-info">
                                                <h6 class="mb-10"><a href="#">{{ $mees -> name }}</a></h6>
                                                <small><i class="fa fa-location-dot"></i> {{ $mees -> address }}</small>
                                            </div>
                                        </td>
                                        <td><a href="{{ route('hostel.edit',['hostel_id' => $mees -> id]) }}">Edit</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="ltn_tab_1_7">
                    <div class="ltn__myaccount-tab-content-inner">
                        <form id = "newMees">
                            <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                            <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                            <h6>Hostel Description</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-item input-item-textarea">
                                        <input type="text" name="mees_name" placeholder="Mees Name" required>
                                    </div>
                                </div>
                            </div>
                            <h6>Hostel Photo</h6>
                            <input type="file" id="myFile" name="filename" class="btn theme-btn-3 mb-10" required><br>
                            <h6>Location & Contacts</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item input-item-textarea">
                                       <select name  = "mees_address">
                                           @foreach($locations as $location)
                                               <option value = "{{ $location -> name }}">{{ $location -> name  }}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-textarea">
                                        <input type="text" name="mees_contact" placeholder="Contact Number" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-item input-item-textarea">
                                        <input type="text" name="mees_lat" placeholder="Latitude (for Google Maps)" value = "24.3665125">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-textarea">
                                        <input type="text" name="mees_long" placeholder="Longitude (for Google Maps)" value = "88.6410695">
                                    </div>
                                </div>
                            </div>

                            <h6>Features</h6>
                            <h6>Interior Details</h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Equipped Kitchen
                                        <input type="checkbox" name = "features[]" value = "Equipped Kitchen">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Media Room
                                        <input type="checkbox"  name = "features[]" value = "Media Room">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <h6 class = "mt-20">Room Type</h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <label class="checkbox-item">Single Bed
                                        <input type="checkbox" name = "features[]" value = "Single Bed">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="checkbox-item">Double Bed
                                        <input type="checkbox" name = "features[]" value = "Double Bed">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="checkbox-item">Triple Bed
                                        <input type="checkbox" name = "features[]" value = "Triple Bed">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <h6 class="mt-20">Utilities</h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Central Air
                                        <input type="checkbox" name = "features[]" value = "Central Air">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Electricity
                                        <input type="checkbox" name = "features[]" value = "Electricity">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Heating
                                        <input type="checkbox" name = "features[]" value = "Heating">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Natural Gas
                                        <input type="checkbox" name = "features[]" value = "Natural Gas">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Ventilation
                                        <input type="checkbox" name = "features[]" value = "Ventilation">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Water
                                        <input type="checkbox" name = "features[]" value = "Water">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <h6 class="mt-20">Other Features</h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">WiFi
                                        <input type="checkbox" name = "features[]" value = "WiFi">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="btn-wrapper text-center--- mt-30">
                                <button type = "submit" class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="ltn_tab_1_9">
                    <div class="ltn__myaccount-tab-content-inner">
                        <div class="account-login-inner">
                            <form action="#" class="ltn__form-box contact-form-box">
                                <h5 class="mb-30">Change Password</h5>
                                <input type="password" name="password" placeholder="Current Password*">
                                <input type="password" name="password" placeholder="New Password*">
                                <input type="password" name="password" placeholder="Confirm New Password*">
                                <div class="btn-wrapper mt-0">
                                    <button class="theme-btn-1 btn btn-block" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class = "tab-pane fade" id = "locations">
                    <div class = "ltn__myaccount-tab-content-inner">
                        <div class="ltn__my-properties-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Location</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $cnt = 0; @endphp
                                @foreach($locations as $location)
                                    @php $cnt++ @endphp
                                    <tr>
                                        <td>
                                            <div class="ltn__my-properties-info">
                                                <h6 class="mb-10 font-weight-normal">{{ $cnt }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ltn__my-properties-info">
                                                <h6 class="mb-10"><a href="#">{{ $location -> name }}</a></h6>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class = "tab-pane fade" id = "add_new_location">
                    <div class = "ltn__myaccount-tab-content-inner">
                        <form id = "new_location_form">
                            <h6>Location Name</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-item input-item-textarea">
                                        <input type="text" name="location_name" placeholder="Location Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-wrapper text-center--- mt-30">
                                <button type = "submit" class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

