<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Location;
use App\Mees;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MeesController extends Controller
{
    public function index()
    {
        $query_str = "";
        if(isset($_GET['place']))
            $query_str = $_GET['place'];

        $query_str = trim($query_str);
        $mees = Mees::where('address','like','%'.$query_str.'%')->get();
        return view('pages.mees',['mees' => $mees]);
    }
    public function store(Request $request)
    {
        $name = $request -> get('mees_name');
        $address = $request -> get('mees_address');
        $contact_number = $request -> get('mees_contact');
        $latitude = $request -> get('mees_lat');
        $longitude = $request -> get('mees_long');
        $features = $request -> get('features');
        $image = $request -> file('filename');
        $photo_path = "";

        if($image)
        {
            $image_name = Str :: random(10);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'uploads/';
            $image_url = $upload_path.$image_full_name;
            $image -> move($upload_path,$image_full_name);
            $photo_path = $image_url;
        }

        Mees::create([
            'name' => $name,
            'user_id' => auth() -> user() -> id,
            'address' => $address,
            'contact_number' => $contact_number,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'photo' => $photo_path,
            'features' => json_encode($features)
        ]);

    }
    public function view($mees_id)
    {
        $mees = Mees::find($mees_id);
        $data = ["mees" => $mees];
        return view('pages.mees_view',$data);
    }
    public function edit($hostel_id)
    {
        $hostel = Mees::find($hostel_id);
        $locations = Location::orderBy('name','asc')->get();
        $data = ["hostel" => $hostel,"locations" => $locations];
        return view('pages.mess_edit',$data);
    }
    public function update($hostel_id,Request $request)
    {
        $hostel = Mees::find($hostel_id);
        $name = $request -> get('mees_name');
        $address = $request -> get('mees_address');
        $contact_number = $request -> get('mees_contact');
        $latitude = $request -> get('mees_lat');
        $longitude = $request -> get('mees_long');
        $features = $request -> get('features');
        $image = $request -> file('filename');
        $photo_path = $hostel -> photo;

        if($image)
        {
            $image_name = Str :: random(10);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'uploads/';
            $image_url = $upload_path.$image_full_name;
            $image -> move($upload_path,$image_full_name);
            $photo_path = $image_url;
        }

        $hostel -> update([
            'name' => $name,
            'address' => $address,
            'contact_number' => $contact_number,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'photo' => $photo_path,
            'features' => json_encode($features)
        ]);
    }
}
