<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\role;
use App\Models\user;
use App\Models\coupon;
use App\Models\banner;
use App\Models\configration;
use App\Models\contactus;
use App\Models\product;
use App\Models\user_detail;
use App\Models\user_order_detail;
use Illuminate\Http\Request;

class main extends Controller
{
    //categorie
    public function addcategorie()
    {
        return view('admin.addcategorie');
    }
    public function categorie_insert(Request $req)
    {
        $valid = $req->validate([
            'title' => 'required|min:3|max:30',
            'description' => 'required|min:3|max:500',
        ]);
        if ($valid) {
            $data = new categorie();
            $data->title = $req->title;
            $data->description = $req->description;
            $data->save();
            return redirect('showcategorie');
        } else {
            return back()->with("error", "some error is their");
        }
        return "add successfully.";
    }
    public function showcategorie()
    {
        $data = categorie::all();
        return view('admin.showcategorie', compact('data'));
    }
    public function delete_categorie($id)
    {
        $data = categorie::find($id)->delete();
        return redirect('showcategorie');
    }
    public function editcategorie($id)
    {
        $data = categorie::all()->where('id', $id)->first();
        return view('admin.editcategorie', compact('data'));
    }
    public function update(Request $req)
    {
        $validate = $req->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validate) {
            $data = categorie::where('id', $req->pid)->update([
                'title' => $req->title,
                'description' => $req->description,
            ]);
        }
        return redirect('/showcategorie');
    }

    //users
    public function adduser()
    {
        $sel = role::all();
        return view('admin.adduser', compact('sel'));
        // return view('admin.adduser');
    }
    public function user_insert(Request $req)
    {
        $valid = $req->validate([
            'first_name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:30',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);
        if ($valid) {
            $data = new user();
            $data->first_name = $req->first_name;
            $data->last_name = $req->last_name;
            $data->email = $req->email;
            $data->password = $req->password;
            $data->role_id = $req->role;
            $data->status = $req->status;
            $data->save();
            return redirect('showuser');
        } else {
            return back()->with("error", "some error is their");
        }
        return "add successfully.";
    }
    public function showuser()
    {
        // return view('admin.showuser');
        $data = user::all();
        return view('admin.showuser', compact('data'));
    }
    public function delete_user($id)
    {
        // return $id;
        $data = user::find($id)->delete();
        return redirect('showuser');
    }
    public function edituser($id)
    {
        $sel = role::all();
        $data = user::all()->where('id', $id)->first();
        return view('admin.edituser', compact('sel', 'data'));
    }
    public function update_user(Request $req)
    {
        $validate = $req->validate([
            'first_name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:30',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);
        if ($validate) {
            $data = user::where('id', $req->pid)->update([
                'first_name' => $req->first_name,
                'last_name' => $req->last_name,
                'email' => $req->email,
                'role_id' => $req->role,
                'status' => $req->status,
            ]);
        }
        return redirect('/showuser');
    }
    //coupon
    public function addcoupon()
    {
        return view('admin.addcoupon');
    }
    public function coupon_insert(Request $req)
    {
        $valid = $req->validate([
            'coupon_code' => 'required',
            'quantity' => 'required|min:1|max:10',
            'coupon_value' => 'required',
        ]);
        if ($valid) {
            $data = new coupon();
            $data->coupon_code = $req->coupon_code;
            $data->quantity = $req->quantity;
            $data->coupon_value = $req->coupon_value;
            $data->save();
            return redirect('showcoupon');
        } else {
            return back()->with("error", "some error is their");
        }
        return "add successfully.";
    }
    public function showcoupon()
    {
        $data = coupon::all();
        return view('admin.showcoupon', compact('data'));
    }
    public function delete_coupon($id)
    {
        $data = coupon::find($id)->delete();
        return redirect('showcoupon');
    }

    //banner
    public function addbanner()
    {
        return view('admin.addbanner');
    }
    public function banner_insert(Request $req)
    {
        $valid = $req->validate([
            'caption' => 'required|min:3|max:30',
            'image' => 'required'
        ]);
        if ($valid) {
            $caption = $req->caption;
            $file = $req->file('image');
            $dest = public_path('/uploads');
            // $filename =  $req->image->getClientOriginalName();
            $filename = "Image-"  . time() . "." . $file->extension();
            $file->move(public_path('/uploads/'), $filename);
            $data = new banner();
            $data->caption = $req->caption;
            $data->image = $filename;
            $res = $data->save();
            if ($res) {
                return redirect('showbanner');
            } else {
                return back()->with("error", "Banner not addded.");
            }
        } else {
            return back()->with("success", "image not uploaded.");
        }
    }
    public function showbanner()
    {
        $data = banner::all();
        return view('admin.showbanner', compact('data'));
    }
    public function delete_banner($id)
    {
        $data = banner::find($id)->delete();
        return redirect('showbanner');
    }
    public function editbanner($id)
    {
        $data = banner::all()->where('id', $id)->first();
        return view('admin.editbanner', compact('data'));
    }
    public function update_banner(Request $req)
    {
        $valid = $req->validate([
            'caption' => 'required|min:3|max:30',
            'image' => 'required'
        ]);
        if ($valid) {
            $file = $req->file('image');
            $dest = public_path('/uploads');
            // $filename =  $req->image->getClientOriginalName();
            $filename = "Image-"  . time() . "." . $file->extension();
            $file->move(public_path('/uploads/'), $filename);
            $data = banner::where('id', $req->pid)->update([
                'caption' => $req->caption,
                'image' => $filename,
            ]);
        }
        return redirect('/showbanner');
    }
    //configration
    public function showconfig()
    {
        // return view("admin.showconfig");
        $data = configration::all();
        return view('admin.showconfig', compact('data'));
    }
    public function editconfig($id)
    {
        $data = configration::all()->where('id', $id)->first();
        return view('admin.editconfig', compact('data'));
    }
    public function update_configemail(Request $req)
    {
        $validate = $req->validate([
            'admin_email' => 'required',
        ]);
        if ($validate) {
            $data = configration::where('id', $req->pid)->update([
                'admin_email' => $req->admin_email,
            ]);
        }
        return redirect('/showconfig');
    }
    //product
    public function showproduct()
    {
        // return view('admin.showproduct');
        $data = product::all();
        return view('admin.showproduct', compact('data'));
    }
    public function addproduct()
    {
        $sel = categorie::all();
        return view('admin.addproduct', compact('sel'));
        // return view('admin.addproduct');
    }
    public function product_insert(Request $req)
    {
        $valid = $req->validate([
            'product_name' => 'required|min:3|max:30',
            'description' => 'required|min:3|max:1000',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'required',
            'categorie' => 'required',
            'status' => 'required',
        ]);
        if ($valid) {
            $product_name = $req->product_name;
            $description = $req->description;
            $brand = $req->brand;
            $quantity = $req->quantity;
            $price = $req->price;
            $categorie = $req->categorie;
            $status = $req->status;
            $file = $req->file('image');
            $dest = public_path('/uploads');
            $filename = "Image-"  . time() . "." . $file->extension();
            $file->move(public_path('/uploads/'), $filename);
            $data = new product();
            $data->product_name = $req->product_name;
            $data->description = $req->description;
            $data->brand = $req->brand;
            $data->quantity = $req->quantity;
            $data->price = $req->price;
            $data->image = $filename;
            $data->categorie_id = $req->categorie;
            $data->status = $req->status;
            $res = $data->save();
            if ($res) {
                return redirect('showproduct');
            } else {
                return back()->with("error", "product not addded.");
            }
        } else {
            return back()->with("success", "image not uploaded.");
        }
    }
    public function delete_product($id)
    {
        $data = product::find($id)->delete();
        return redirect('showproduct');
    }
    public function editproduct($id)
    {
        $sel = categorie::all();
        $data = product::all()->where('id', $id)->first();
        return view('admin.editproduct', compact('sel', 'data'));
    }
    public function update_product(Request $req)
    {
        $valid = $req->validate([
            'product_name' => 'required|min:3|max:30',
            'description' => 'required|min:3|max:100',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'required',
            'categorie' => 'required',
            'status' => 'required'
        ]);
        if ($valid) {
            $file = $req->file('image');
            $dest = public_path('/uploads');
            // $filename =  $req->image->getClientOriginalName();
            $filename = "Image-"  . time() . "." . $file->extension();
            $file->move(public_path('/uploads/'), $filename);
            $data = product::where('id', $req->pid)->update([
                'product_name' => $req->product_name,
                'description' => $req->description,
                'brand' => $req->brand,
                'quantity' => $req->quantity,
                'price' => $req->price,
                'image' => $filename,
                'categorie_id' => $req->categorie,
                'status' => $req->status,
            ]);
        }
        return redirect('/showproduct');
    }
    public function productview($id)
    {
        // $data = product::find($id);
        // return redirect('/productview');
        $data = product::all()->where('id', $id)->first();
        return view('admin.productview', compact('data'));
    }
    //contact us
    public function contactus()
    {
        $data = contactus::all();
        return view('admin.contactus', compact('data'));
    }
    public function delete_contact($id)
    {
        $data = contactus::find($id)->delete();
        return redirect('contactus');
    }
    //userdetails
    public function userdetails()
    {
        $data = user_detail::all();
        return view('admin.userdetails', compact('data'));
    }
    public function delete_userdetails($id)
    {
        $data = user_detail::find($id)->delete();
        return redirect('userdetails');
    }
    //userorderdetails
    public function userorderdetails()
    {
        $data = user_order_detail::all();
        return view('admin.userorderdetails', compact('data'));
    }
    public function delete_userorderdetails($id)
    {
        $data = user_order_detail::find($id)->delete();
        return redirect('userorderdetails');
    }
}
