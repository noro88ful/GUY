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
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class ShowController extends Controller
{
	public function showabout(){
		$abouts = About::all();
		return view('about_me',compact('abouts'));
	}
	public function showlibrary(){
		$libraries = Library::all()[0];
		$libraries_2 = Library_2::all();
		$sliders = Slider::all();
		return view('library',compact('libraries','libraries_2','sliders'));
	}
	public function showworks(){
		$filters = Work::all();
		$sliders = Slider::all();
		$works = Gallery::inRandomOrder()->take(15)->get();
		return view('my_works',compact('works','filters','sliders'));
	}
	public function showview(Request $request){
		$id = $request->id;
		$sliders = Slider::all();
		$works = Gallery::where('filter',$id)->take(24)->paginate(24);
		return view('view',compact('works','sliders'));
	}
	public function showcontact(){
		$contacts = Contact::all();
		$contacts_top = Contact_top::all()[0];
		return view('contact_1',compact('contacts','contacts_top'));
	}
}

