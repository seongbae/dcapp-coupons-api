<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function validateCoupon(Request $request)
    {
        $this->validate($request, [
            'uniqueid' => 'required',
            'businessid' => 'required',
            'couponid' => 'required'
        ]);
        
        $uniqueid = $request->input('uniqueid');
        $businessid = $request->input('businessid');
        $couponid = $request->input('couponid');

        $coupon = Coupon::where('uniqueid',$uniqueid)
                        ->where('businessid', $businessid)
                        ->where('couponid', $couponid)
                        ->first();

        if ($coupon)
            return response()->json($coupon, 200);
        else
        {
            $coupon = Coupon::create($request->all());
            return response()->json($coupon, 201);
        }        
    }

    // public function showCoupon($id)
    // {
    //     return response()->json(Coupon::find($id));
    // }

    // public function create(Request $request)
    // {
    //     $author = Coupon::create($request->all());

    //     return response()->json($author, 201);
    // }

    // public function update($id, Request $request)
    // {
    //     $author = Coupon::findOrFail($id);
    //     $author->update($request->all());

    //     return response()->json($author, 200);
    // }

    // public function delete($id)
    // {
    //     Coupon::findOrFail($id)->delete();
    //     return response('Deleted Successfully', 200);
    // }
}