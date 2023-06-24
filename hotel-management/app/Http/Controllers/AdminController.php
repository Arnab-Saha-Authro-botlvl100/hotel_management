<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Rooms;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        // $bookings = Booking::all();
        $bookings = Booking::with('user', 'room')->get();
        // dd($booking);
        return view('admin.index', compact('bookings'));
    }

    public function addroom(Request $request){
        if($request->method() == 'GET'){
            $rooms = Rooms::all();
            return view('admin.addroom', compact('rooms'));
        }
        else{
          
            $imageName = $request->input('image_name');

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);
            $imageFile = $request->file('image');

            $imageFile->move(public_path('images'), $imageName);
            // $path = 'images/' . $imageName;

            $room = new Rooms();
            $room->code = $request->input('code');
            $room->size = $request->input('size');
            $room->bed = $request->input('bed');
            $room->person = $request->input('person');
            $room->seaview = $request->input('seaview');
            $room->vip = $request->input('vip');
            $room->price = $request->input('price');
            $room->image = $imageName;
            $room->is_available = 1;
            
            if($room->save()){
                return response()->json([
                    'title' => 'Success',
                    'text' => 'Added Successfully',
                    'icon' => 'success',
                    'url' => 'index'
                ]);
            }
            else{
                return response()->json([
                    'title' => 'Error',
                    'text' => 'Cannot Add',
                    'icon' => 'error',
                    'url' => 'index'
                ]);
            }
           
        }
    }


    public function editroom($id, Request $request){
        // dd($id);
        $id = decrypt($id);
        if($request->isMethod('GET')){
            $room = Rooms::find($id);
            // dd($room);  
            return view('admin.editroom', compact('room'));
        }
        else{
            $room = Rooms::find($id); 
            if($room){
                $imageName = $request->input('image_name');
                // dd($imageName);
                if(empty($imageName)){
                    $room->code = $request->input('code');
                    $room->size = $request->input('size');
                    $room->bed = $request->input('bed');
                    $room->person = $request->input('person');
                    $room->seaview = $request->input('seaview');
                    $room->vip = $request->input('vip');
                    $room->price = $request->input('price');
                    // dd($room->save());
                    $room->save(); 
                    $rooms = Rooms::all();
                    session()->flash('alert', 'Edited successfully');
                    return view('admin.addroom', compact('rooms'));
                }
                else{
                    $imageFile = $request->file('image');
                    $imageFile->move(public_path('images'), $imageName);
    
                    $room->code = $request->input('code');
                    $room->size = $request->input('size');
                    $room->bed = $request->input('bed');
                    $room->person = $request->input('person');
                    $room->seaview = $request->input('seaview');
                    $room->vip = $request->input('vip');
                    $room->price = $request->input('price');
                    $room->image = $imageName;
                    $room->save();
                    $rooms = Rooms::all();
                    session()->flash('alert', 'Edited successfully');
                    return view('admin.addroom', compact('rooms'));
                }
            }
            return response()->json([
                'title' => 'ERROR',
                'text' => 'Room Not Found', 
                'icon' => 'error',
                'url' => 'admin/index'
            ]);
           
        }
    }

    public function deleteroom($id){
        $id = decrypt($id);
        $room = Rooms::find($id);
        $room->is_available = 0;
        $room->save();
        $rooms = Rooms::all();
        session()->flash('alert', 'Deleted successfully');
        return view('admin.addroom', compact('rooms'));
    }
}
