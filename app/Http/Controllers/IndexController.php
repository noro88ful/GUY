<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Audio;
use App\Models\Contact;
use App\Models\Contact_top;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\Home_1;
use App\Models\Home_2;
use App\Models\Info;
use App\Models\Library;
use App\Models\Library_2;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Work;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
	public function showindex(){
		$homes_1 = Home_1::all();
		$homes_2 = Home_2::all();
		$sliders = Slider::all();
		return view('index',compact(
			'homes_1',
			'homes_2',
			'sliders',
		));
	}
}
