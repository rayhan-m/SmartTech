<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HtmlController extends Controller
{
    public function index(){
        $blogs = Blog::where('active_status',1)->latest()->get();
        $products=Product::where('active_status',1)->orderBy('id', 'ASC')->get();
        $nwe_products=Product::where('active_status',1)->where('product_status',1)->orderBy('id', 'DESC')->get();
        return view('index',compact('products','nwe_products', 'blogs'));
    }
    public function BlogDetails($id){
        $blog= Blog::findOrfail($id);
        $categories=Category::where('active_status',1)->orderBy('id', 'ASC')->get();
        return view('blog_details',compact('blog','categories'));
    }
    public function BlogList(){
        $categories=Category::where('active_status',1)->orderBy('id', 'ASC')->get();
        $blogs= Blog::where('active_status',1)->get();
        return view('blog_list',compact('blogs','categories'));
    }
    public function ProductDetails($id){
        $categories=Category::where('active_status',1)->orderBy('id', 'ASC')->get();
        $product_details= Product::findOrfail($id);
        return view('product_details',compact('product_details','categories'));
    }
    public function ProducList($id){
        $categories=Category::where('active_status',1)->orderBy('id', 'ASC')->get();
        $cat_name= Product::findOrfail($id);
        $product_list= Product::where('active_status',1)->where('category_id',$id)->orderBy('id', 'ASC')->get();
        return view('product_list',compact('product_list','categories','cat_name'));
    }
    public function SearchProducList(Request $request){
        $request->validate([
            'key' => 'required',
        ]);

        $categories=Category::where('active_status',1)->orderBy('id', 'ASC')->get();
        // $cat_name= Product::findOrfail($id);
        $product_list= Product::where('active_status', 1)
                ->where('name', 'like', '%' . $request->key . '%')
                ->orWhere('feature', 'like', '%' . $request->key . '%')
                ->orWhere('details', 'like', '%' . $request->key . '%')->get();
        return view('search_product_list',compact('product_list','categories'));
    }
    
    public function AboutUs(){
        return view('about_us');
    }
    public function Contact(){
        return view('contact');
    }
    public function UserProfile(){
        $profile=User::find(Auth::user()->id);
        return view('user_profile',compact('profile'));
    }
    public function updateImage(Request $request)
    {
        //  dd($request);
        //  return $request;

        $request->validate([
            'image' => 'required',
        ]);
        $profile = User::find(Auth::user()->id);
        // $file_path= $general_setting->logo;
        // unlink($file_path);
        $image = "";
        if ($request->file('image') != "") {
            $file = $request->file('image');
            $image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('backEnd/uploads/customer/', $image);
            $image = 'backEnd/uploads/customer/' . $image;
            $profile->image = $image;
        }
        $profile->save();

        Toastr::success('Operation successful', 'Success');
        return redirect()->back();

    }
    public function updateprofile(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $profile = User::find(Auth::user()->id);
        
        $profile->name=$request->name;
        $profile->email=$request->email;
        $profile->phone=$request->phone;
        $profile->save();

        Toastr::success('Profile Updated Successfully', 'Success');
        return redirect()->back();
    }

    public function password_update(Request $request){

	$validator = Validator::make($request->all(), [
		'current_password' => 'required',
		'new_password' => 'required|same:confirm_password|min:6|different:current_password',
		'confirm_password' => 'required',
	]);
	if ($validator->fails()) {
		return redirect()->back()
			->withErrors($validator)
			->withInput();
	}
	try {

            $user = Auth::user();
            if (Hash::check($request->current_password, $user->password)) {

                $user->password = Hash::make($request->new_password);
                $result = $user->save();

                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect()->back();
                } else {
                    Toastr::error('Operation Failed', 'Failed');
                    return redirect()->back();
                }
            } else {
                Toastr::error('Current password not match!', 'Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
}
}