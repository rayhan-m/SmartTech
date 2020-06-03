<?php

namespace App\Http\Controllers;

use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function BlogList()
    {
        $data = Blog::all();
        return view('admin.blog_list', compact('data'));
    }

    public function BlogStore(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:220',
            'image' => 'required',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->post_date = Carbon::now();
        $blog->post_by =Auth::user()->name;
        $blog->details = $request->details;
        $image = "";
        if ($request->file('image') != "") {
            $file = $request->file('image');
            $image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('backend/uploads/blog/', $image);
            $image = 'backend/uploads/blog/' . $image;
            $blog->image = $image;
        }
        $blog->save();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }

    public function BlogActive($id)
    {
        $blog = Blog::findOrfail($id);
        $blog->active_status = 1;
        $blog->update();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }
    public function BlogDeactive($id)
    {
        $blog = Blog::findOrfail($id);
        $blog->active_status = 0;
        $blog->update();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }
    public function BlogDelete($id)
    {
        $blog = Blog::findOrfail($id);
        $blog->delete();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }
    public function BlogUpdate(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:220',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $blog = Blog::findOrfail($request->id);
        $blog->title = $request->title;
        $blog->post_date = Carbon::now();
        $blog->post_by =Auth::user()->name;
        $blog->details = $request->details;
        $image = "";
        if ($request->file('image') != "") {
            $file = $request->file('image');
            $image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('backend/uploads/blog/', $image);
            $image = 'backend/uploads/blog/' . $image;
            $blog->image = $image;
        }
        $blog->save();
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }
}