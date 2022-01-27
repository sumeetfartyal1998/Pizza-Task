<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use App\Models\menu;
use App\Models\cart;
use Illuminate\Support\Facades\DB;



class Main extends Controller
{
    public function register(Request $req){
        $validateData=$req->validate([
            'name'=>'required|regex:/^[a-zA-Z ]+$/',
            'email'=>"required|regex:/^(([\-\w]+)\.?)+@(([\-\w]+)\.?)+\.[a-zA-Z]{2,4}$/",
            'pass'=>'required|regex:/^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9!@#$%&*]{6,20}$/',
            'cpass'=>'required|same:pass',
            'phone'=>'required|min:10',
            'address'=>'required'
        ],[
            'phone.min'=>'Please enter a valid number'
        ]);
        if($validateData){
            $data=new register();
            $data->name=$validateData['name'];
            $data->email=$validateData['email'];
            $data->pass=$validateData['pass'];
            $data->phone=$validateData['phone'];
            $data->address=$validateData['address'];
            $data->save();
            return back()->with('success','Registered Successfully! You can now login using the registered details.');
        }else{
            return back()->with('errMsg','Not Registered');
        }
    }
    public function login(Request $req){
        $validateData=$req->validate([
            'email'=>'required',
            'pass'=>'required'
        ],[
            'email.required'=>'Email field is required',
            'pass.required'=>'Password field is required'
        ]);
        if($validateData){
            $email=register::where(['email'=>$req->email])->get();
            if(count($email)>0){
                if($req->pass==$email[0]->pass){
                    $req->session()->put('id',$req->email);
                    return redirect('menu');
                }else{
                    return back()->with('errMsg','Password is incorrect for this email.');
                }
            }else{
                return back()->with('errMsg','No such email exists.');
            }
        }
    }
    public function menu(){
        $items=menu::all();
        return view('menu',['items'=>$items]);
    }

    public function addtocart(Request $req){
        if(session()->has('id')){
            $useritem=cart::where(['item_id'=>$req->item_id])->get();
            if(count($useritem)==0){
                $data=register::where(['email'=>session()->get('id')])->get();
                $cart=new cart();
                $cart->user_id=$data[0]->id;
                $cart->item_id=$req->item_id;
                $cart->quantity=1;
                $cart->save();
                return back();
            }else{
                $userid=$useritem[0]->user_id;
                $itemid=$useritem[0]->item_id;
                $quantity=$useritem[0]->quantity+1;
                $arr=['user_id'=>$userid,'item_id'=>$itemid,'quantity'=>$quantity];
                $data=register::where(['email'=>session()->get('id')])->get();
                cart::where(['user_id'=>$data[0]->id,'item_id'=>$useritem[0]->item_id])->update($arr);
                return back();
            }
            
        }else{
            return redirect('login');
        }
    }

    static function cartItem(){
        $data=register::where(['email'=>session()->get('id')])->get();
        return cart::where(['user_id'=>$data[0]->id])->count();
    }

    public function cart(){
        $data=register::where(['email'=>session()->get('id')])->get();
        $userId=$data[0]->id;
        
        $items=DB::table('carts')
        ->join('menus','carts.item_id','=','menus.id')
        ->where('carts.user_id',$userId)
        ->select('menus.*','carts.quantity')
        ->get();
        return view('cart')->with(['items'=>$items]);
    }

    public function checkout(Request $req){
        $validateData=$req->validate([
            'cred'=>'required|regex:/^[0-9]{16}$/'
        ]);
        if($validateData){
            return view('success');
        }
    }

    public function logout(){
        session()->forget('id');
        return redirect('');
    }
}
