<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Rooms;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view(){
        if(session('role') == 'user'){
            return view('welcome');
        }
        
    }
    public function index(){
        if(session('role') == 'user'){
            $rooms = Rooms::select('*')->where('is_available', 1)->get();
            return view('user/index', compact('rooms'));
        }    
    }

    public function room($id){
        $id = decrypt($id);
        $flag = Rooms::find('*')->where('id', $id)->get();
    }

    public function modal(){
        return view('modal/contect');
    }
    public function show($id)
    {   
        $decryptedId = decrypt($id);
        $room = Rooms::find($decryptedId);
        return response()->json(['room' => $room]);
    }

    public function book($id, Request $request){
        if ($request->isMethod('GET')) {
            // dd($id);
            $decryptedId = decrypt($id);
            $room = Rooms::find($decryptedId);
            $uid = session('id');
            $user = UserInfo::find($uid);
            // dd(view('user/bookingform', compact('room', 'user')));
            return view('user.bookingform',  compact('room', 'user'));
        }   
        else{
            if(session('role') == 'user'){
                // dd($request->all());
                $decryptedId = decrypt($id);
                $room = Rooms::find($decryptedId);
                // dd(1, $room);
                $uid = session('id');
                $query = Booking::where('room_id', $decryptedId)->where('status', 'booked')->get();
                // $sql = $query->toSql();
                // $bindings = $query->getBindings();
                // dd($sql, $bindings);
                if($query->isEmpty()){
                    
                    $booking = new Booking();
                    $booking->user_id = $uid;
                    $booking->room_id = $decryptedId;
                   
                    $booking->phone = request('phone');
                 
                    $booking->departure_date = request('departureDate');
                    $booking->additional_info = request('additionalInfo');
                    $booking->status = 'booked';
                    $booking->save();
                    Rooms::where('id', $decryptedId)->update(['is_available' => 0]);

                    
                    return response()->json([
                        'title' => 'Success',
                        'text' => 'Successfully Booked',
                        'icon' => 'success',
                         
                ]);
                }
                else{
                    return response()->json([
                        'title' => 'Error',
                        'text' => 'Room Not available',
                        'icon' => 'error', ]);
                }
                
            }   
        }
        
    }

}
