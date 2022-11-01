@extends('layouts.profile_layout')
@section('title_first')
    Home
@endsection
@section('title_second')
    Edit
@endsection
@section('content')
    <div class = "ltn__shop-details-area pb-10">
        <div class = "container">
            <div class = "row">
                <div class = "col-lg-12 col-md-12">
                    <div class = "ltn__shop-details-inner ltn__page-details-inner">
                        <form id = "editMees">
                            <h6>Hostel Description</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-item input-item-textarea">
                                        <input type="text" name="mees_name" placeholder="Hostel Name" value = "{{ $hostel -> name }}" required>
                                    </div>
                                </div>
                            </div>
                            <h6>Hostel Photo</h6>
                            <input type="file" id="myFile" name="filename" class="btn theme-btn-3 mb-10"><br>
                            <h6>Location & Contacts</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item input-item-textarea">
                                        <select name  = "mees_address">
                                            <option value = "{{ $hostel -> address }}" selected hidden>{{ $hostel -> address }}</option>
                                            @foreach($locations as $location)
                                                <option value = "{{ $location -> name }}">{{ $location -> name  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-textarea">
                                        <input type="text" name="mees_contact" placeholder="Contact Number" value = "{{ $hostel -> contact_number }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-item input-item-textarea">
                                        <input type="text" name="mees_lat" placeholder="Latitude (for Google Maps)" value = "{{ $hostel -> latitude }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-textarea">
                                        <input type="text" name="mees_long" placeholder="Longitude (for Google Maps)" value = "{{ $hostel -> longitude }}">
                                    </div>
                                </div>
                            </div>

                            <h6>Features</h6>
                            <h6>Interior Details</h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Equipped Kitchen
                                        @if(in_array("Equipped Kitchen",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "Equipped Kitchen">
                                        @else
                                            <input type="checkbox" name = "features[]" value = "Equipped Kitchen">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Media Room
                                        @if(in_array("Media Room",json_decode($hostel -> features)))
                                            <input type="checkbox" checked  name = "features[]" value = "Media Room">
                                        @else
                                            <input type="checkbox"  name = "features[]" value = "Media Room">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <h6 class = "mt-20">Room Type</h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <label class="checkbox-item">Single Bed
                                        @if(in_array("Single Bed",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "Single Bed">
                                        @else
                                            <input type="checkbox"  name = "features[]" value = "Single Bed">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="checkbox-item">Double Bed
                                        @if(in_array("Double Bed",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "Double Bed">
                                        @else
                                            <input type="checkbox"  name = "features[]" value = "Double Bed">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="checkbox-item">Triple Bed
                                        @if(in_array("Triple Bed",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "Triple Bed">
                                        @else
                                            <input type="checkbox" name = "features[]" value = "Triple Bed">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <h6 class="mt-20">Utilities</h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Central Air
                                        @if(in_array("Central Air",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "Central Air">
                                        @else
                                            <input type="checkbox" name = "features[]" value = "Central Air">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Electricity
                                        @if(in_array("Electricity",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "Electricity">
                                        @else
                                            <input type="checkbox" name = "features[]" value = "Electricity">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Heating
                                        @if(in_array("Heating",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "Heating">
                                        @else
                                            <input type="checkbox" name = "features[]" value = "Heating">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Natural Gas
                                        @if(in_array("Natural Gas",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "Natural Gas">
                                        @else
                                            <input type="checkbox" name = "features[]" value = "Natural Gas">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Ventilation
                                        @if(in_array("Ventilation",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "Ventilation">
                                        @else
                                            <input type="checkbox"  name = "features[]" value = "Ventilation">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">Water
                                        @if(in_array("Water",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "Water">
                                        @else
                                            <input type="checkbox"  name = "features[]" value = "Water">
                                        @endif
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <h6 class="mt-20">Other Features</h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <label class="checkbox-item">WiFi
                                        @if(in_array("WiFi",json_decode($hostel -> features)))
                                            <input type="checkbox" checked name = "features[]" value = "WiFi">
                                        @else
                                            <input type="checkbox" name = "features[]" value = "WiFi">
                                        @endif
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
            </div>
        </div>
    </div>
{{--    <div class="ltn__myaccount-tab-content-inner">--}}
{{--        <div class = "container">--}}
{{--            <div class = "row">--}}
{{--                <div class = "col-md-2"></div>--}}
{{--                <div class = "col-md-8">--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@push('js')
    <script>
        $("#editMees").on("submit",function(e){
            e.preventDefault();

            $.ajaxSetup({
                headers:
                    {
                        "X-CSRF-Token" : "{{ csrf_token() }}"
                    }
            });

            $.ajax({
                url : "{{ route('hostel.update',['hostel_id' => $hostel -> id]) }}",
                type : "post",
                processData:false,
                contentType : false,
                data : new FormData($("#editMees")[0]),
                success:() => {
                    alert("Record has been saved successfully");
                }
            })
        });
    </script>
@endpush
