<?php

namespace App\Http\Controllers;

use App\NewsLetter;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class NewsLetterController extends Controller
{
    public function SubscribeStore(Request $request){

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:news_letters',
            ]);

            if ($validator->fails()) {
                Toastr::error('Email Already Used', 'Failed');
                return redirect()->back();
                
            }

        try{
            $Newsletter = new NewsLetter();
            $Newsletter->email=$request->email;
            $Newsletter->save();
            Toastr::success('Subscribe successfully', 'Success');
                return redirect()->back();

        }catch(\Exception $e){
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
        }
    }

    // Start NewsLatter 

public function News_Latter()
    {
        $data = NewsLetter::get();
        return view('admin.news_latter', compact('data'));
    }

    public function NewsLatterStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:news_letters',
            ]);

            if ($validator->fails()) {
                Toastr::error('Email Already Used', 'Failed');
                return redirect()->back();
            }
        try{
            $Newsletter = new NewsLetter();
            $Newsletter->email=$request->email;
            $Newsletter->save();
            Toastr::success('Subscribe successfully', 'Success');
            return redirect()->back();
        }catch(\Exception $e){
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
        }
    }

    public function NewsLatterActive($id)
    {
        $Newsletter = NewsLetter::findOrfail($id);
        $Newsletter->active_status = 1;
        $Newsletter->update();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }
    public function NewsLatterDeactive($id)
    {
        $Newsletter = NewsLetter::findOrfail($id);
        $Newsletter->active_status = 0;
        $Newsletter->update();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }
    public function NewsLatterDelete($id)
    {
        $Newsletter = NewsLetter::findOrfail($id);
        $Newsletter->delete();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }
    public function NewsLatterUpdate(Request $request)
    {
        // return $request;
        //validation
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $Newsletter = NewsLetter::findOrfail($request->id);
        $Newsletter->email = $request->email;
        $Newsletter->save();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }

}