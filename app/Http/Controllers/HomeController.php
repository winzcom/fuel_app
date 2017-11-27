<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


use App\About;
use App\GeneralSetting;
use App\Home;
use App\Partner;
use Illuminate\Http\Request;
use App\Menu;
use Mail;

use Session;

use App\Http\Requests;

class HomeController extends Controller
{
    public function __construct()
    {
        $data = [];
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
    }

    public function menu($id)
    {
        $menu = Menu::findOrFail($id);
        $data['site_title'] = $this->site_title;
        $data['general'] = GeneralSetting::first();
        $data['menu_name'] = $menu->name;
        $data['menu_description'] = $menu->description;
        $data['menu'] = Menu::all();
        return view('home.menu',$data);
    }
    public function getHome()
    {
        $data['site_title'] = $this->site_title;
        $data['general'] = GeneralSetting::first();
        $data['home'] = Home::first();
        $data['partner'] = Partner::all();
        $data['menu'] = Menu::all();
        return view('home.home',$data);
    }
    public function getAboutUs()
    {
        $data['site_title'] = $this->site_title;
        $data['general'] = GeneralSetting::first();
        $data['about'] = About::first();
        $data['menu'] = Menu::all();
        return view('home.about-us',$data);
    }
    public function getContact()
    {
        $data['site_title'] = $this->site_title;
        $data['general'] = GeneralSetting::first();
        $data['menu'] = Menu::all();
        return view('home.contact',$data);
    }

    public function postContact(Request $request)
    {
     

            $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            ]);

            if ($validator->fails()) {

            Session::flash('message','All Fields Are Required');        
            Session::flash('type', 'danger');  
            return redirect()->back();
            }else{


$gen = GeneralSetting::first();


        $to = $gen->email;

       $subject = Input::get('subject');
       $msg = Input::get('message');
       $name = Input::get('name');
       $email = Input::get('email');

       $headers = "From: $name <$email> \r\n";
       $headers .= "Reply-To: $name <$email> \r\n";
       $headers .= "MIME-Version: 1.0\r\n";
       $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = "
<html>
<head>
<title>email</title>
</head>
<body>
<p>$msg</p>
</body>
</html>
";  

if (mail($to, $subject, $message, $headers)) {

        Session::flash('message','Message Sent Successfully');        
        Session::flash('type', 'success');  
} else {

        Session::flash('message','Problem occure when Sending Message');        
        Session::flash('type', 'danger');  
}



return redirect()->back();

        }


}


}
