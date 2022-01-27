<?php

namespace App\Http\Controllers;
use App\Models\contactus;
use App\Models\coupon;
use App\Models\user_detail;
use App\Models\user_order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class contactcontroller extends Controller
{
    public function contact(Request $request){
        $validator=Validator::make($request->all(),[
            'name'  => 'required|string',
            'email'  => 'required|string|email',
            'number'    => 'required|string|min:10',
            'message'   => 'required|string',        
        ]);
        if($validator->fails()){
            return response()->json(["message"=>$validator->errors()]);
        }
        else {
            $contact=contactus::insert([
                'name' => $request->name,
                'email' => $request->email,
                'number'   => $request->number,
                'message'  => $request->message,
                
            ]);
            return response()->json([
                'message'=>'Will Contact you soon.',
                'contact'=>$contact
            ]);
        }
    }
    public function adduserdetails(Request $req)
    {
           $val=$req->validate([
                'firstname'=>'required',
                'lastname'=>'required',
                'email'=>'required|email',
                'phonenumber'=>'required|max:10|min:10',
                'address'=>'required',
                'city'=>'required',
                'state'=>'required',
                'pincode'=>'required',
             
            ]);
            if($val)
            {
                $data=new user_detail();
                $data->firstname=$req->firstname;
                $data->lastname=$req->lastname;
                $data->email=$req->email;
                $data->phonenumber=$req->phonenumber;
                $data->address=$req->address;
                $data->city=$req->city;
                $data->state=$req->state;
                $data->pincode=$req->pincode;
                $res=$data->save();
                if($res)
                {
                    return response()->json(['msg','User details added Successfully']);
                }
                else
                return response()->json('msg','User details not added ');
            }
    }

    public function adduserorder(Request $req)
    {
           $val=$req->validate([
                'useremail'=>'required|email',
                'product_id'=>'required',
                'product_name'=>'required',
                'price'=>'required',
                'quantity'=>'required',
                'total'=>'required',
             
            ]);
            if($val)
            {
                $data=new user_order_detail();
                $data->useremail=$req->useremail;
                $data->product_id=$req->product_id;
                $data->product_name=$req->product_name;
                $data->price=$req->price;
                $data->quantity=$req->quantity;
                $data->total=$req->total;
                $res=$data->save();
                if($res)
                {
                    return response()->json(['msg','User details added Successfully']);
                }
                else
                return response()->json('msg','User details not added ');
            }
    }
    public function applycoupon(Request $req)
    {
        $coupon=coupon::where('coupon_code',$req->coupon_code)->first();
        if(!$coupon)
        {
            return response()->json(['msg'=>'Invalid Coupon code']);
        }
    
        return response()->json(['msg'=>'Coupon Applied successfully',"coupon_value"=>$coupon->coupon_value]);
        // $data=coupon::all();   
    }
    public function showuserorder(Request $request){
        $orders=user_order_detail::all();
        return response()->json(["orders" => $orders]);
    }
}
