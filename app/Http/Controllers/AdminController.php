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
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Mail;

class AdminController extends Controller
{
   public function home(){
		$users = User::take(25)->paginate(25);
		return view('Admin/adm_user',compact('users'));
	}
	function sendlogin(Request $request) {
		$data = $request->only(['email', 'password']);
		$validate = Validator::make($data, [
			'email' => 'required',
			'password' => 'required',
		],[
			'email.required' => 'Խնդրում ենք լրացնել մուտքանունը:',
			'email.email' => 'Սխալ Մուտքանուն:',
			'password.required' => 'Խնդրում ենք լրացնել գաղտնաբառը:',
	 	]);
		if ($validate->fails()) {
			return redirect()->back()->withInput()->withErrors($validate->errors());
		}
		$user = User::where('email',$request->email)->where('password',$request->password)->first();
		if($user){
			auth()->login($user);
			return redirect('admin');
		}
		else{
			Session::flash('error','Սխալ մուտքանուն կամ գաղտնաբառ');
			return redirect()->back();
		}
		
	}
	public function adm_logout(){
		Auth::logout();
		return redirect('/');
	}
	public function edititems(Request $request){
		// if($request->password){$request['password'] = Hash::make($request['password']);}
		$data = $request->all();
		$modelName = $data["tblName"];
		$model = "App\Models".'\\'.$modelName;
		$newdata=$data;
		$seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789');
		unset($newdata['trID'],$newdata['tblName'],$newdata['_token']);
		if($request->hasfile('image')){
			$file = $request->file('image');
			shuffle($seed);
			$code = '';
			foreach (array_rand($seed, 8) as $k) $code .= $seed[$k];
			$newfilename = time().$code.'.'.$file->getClientOriginalExtension();
			$model::where('id',$data['trID'])->update(['image'=>$newfilename]);
			$pathTable = public_path().'/files/'.$modelName;
			if (!file_exists($pathTable)) {File::makeDirectory($pathTable);}
			$pathimage = $pathTable.'/';
			$request->file('image')->move($pathimage, $newfilename);
			unset($newdata['image']);
		}
		if($request->hasfile('smallimage')){
			$file = $request->file('smallimage');
			shuffle($seed);
			$code = '';
			foreach (array_rand($seed, 8) as $k) $code .= $seed[$k];
			$newfilename = time().$code.'.'.$file->getClientOriginalExtension();
			$model::where('id',$data['trID'])->update(['smallimage'=>$newfilename]);
			$pathTable = public_path().'/files/'.$modelName;
			if (!file_exists($pathTable)) {File::makeDirectory($pathTable);}
			$pathimage = $pathTable.'/';
			$request->file('smallimage')->move($pathimage, $newfilename);
			unset($newdata['smallimage']);
		}
		if($request->hasfile('audio')){
			$file = $request->file('audio');
			shuffle($seed);
			$code = '';
			foreach (array_rand($seed, 8) as $k) $code .= $seed[$k];
			$newfilename = time().$code.'.'.$file->getClientOriginalExtension();
			$model::where('id',$data['trID'])->update(['audio'=>$newfilename]);
			$pathTable = public_path().'/files/'.$modelName;
			if (!file_exists($pathTable)) {File::makeDirectory($pathTable);}
			$pathaudio = $pathTable.'/';
			$request->file('audio')->move($pathaudio, $newfilename);
			unset($newdata['audio']);
			// return redirect()->back();
		} 
		// if($newdata['avatar']==null) unset($newdata['avatar']);
		// if($newdata['cover']==null) unset($newdata['cover']);
		foreach ($newdata as $k => $v) {
			if($v!='notadd'){
				$model::where('id',$data['trID'])->update([$k=>$v]);
			}
		}
		return redirect()->back();
	}
	public function deleteitem(Request $request){
		$data = $request->all();
		$modelName = $data["tblName"];
		$model = "App\Models".'\\'.$modelName;
		if($modelName == 'Tour'){
			$pathtour = public_path().'/files/Tour/'.Auth::user()->id.'/tour_'.$data['id'];
			File::deleteDirectory($pathtour);
		}
		$model::where('id',$data['id'])->delete();
	}
	public function adm_view(){
		$views = View::all();
		return view('Admin/adm_view',compact('views'));
	}
	public function adm_about(){
		$abouts = About::all();
		return view('Admin/adm_about',compact('abouts'));
	}
	public function adm_user(){
		$users = User::take(25)->paginate(25);
		return view('Admin/adm_user',compact('users'));
	}
	public function adm_works(){
		$works = Work::all();
		return view('Admin/adm_works',compact('works'));
	}
	public function adm_slider(){
		$sliders = Slider::all();
		return view('Admin/adm_slider',compact('sliders'));
	}
	public function adm_library(){
		$libraries = Library::take(25)->paginate(25);
		return view('Admin/adm_library',compact('libraries'));
	}
	public function login(){
		return view('Admin/login');
	}
	public function add_table_field(Request $request){
		$data = $request->all();
		$newdata = array_slice($data, 2);
		$modelName = $data['tblname'];
		$model = "App\Models".'\\'.$modelName;
		$seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789');
		$field = new $model;
		if($request->hasfile('image')){
			$file = $request->file('image');
			shuffle($seed);
			$code = '';
			foreach (array_rand($seed, 8) as $k) $code .= $seed[$k];
			$newfilename = time().$code.'.'.$file->extension();
			$field->image = $newfilename;
			$field->save();
			$field_id = $field->id;
			$pathTable = public_path().'/files/'.$modelName;
			if (!file_exists($pathTable)) {File::makeDirectory($pathTable);}
			$pathimage = $pathTable.'/';
			$file->move($pathimage, $newfilename);
			unset($newdata['image']);
			// return redirect()->back();
		}
		if($request->hasfile('smallimage')){
			shuffle($seed);
			$file = $request->file('smallimage');
			$code = '';
			foreach (array_rand($seed, 8) as $k) $code .= $seed[$k];
			$newfilename = time().$code.'.'.$file->extension();
			$field->smallimage = $newfilename;
			$field->save();
			$field_id = $field->id;
			$pathTable = public_path().'/files/'.$modelName;
			if (!file_exists($pathTable)) {File::makeDirectory($pathTable);}
			$pathimage = $pathTable.'/';
			$file->move($pathimage, $newfilename);
			unset($newdata['smallimage']);
			// return redirect()->back();
		}
		if($request->hasfile('audio')){
			$file = $request->file('audio');
			shuffle($seed);
			$file = $request->file('smallimage');
			$code = '';
			$newfilename = time().$code.'.'.$file->extension();
			$field->audio = $newfilename;
			$field->save();
			$field_id = $field->id;
			$pathTable = public_path().'/files/'.$modelName;
			if (!file_exists($pathTable)) {File::makeDirectory($pathTable);}
			$pathaudio = $pathTable.'/';
			$file->move($pathaudio, $newfilename);
			unset($newdata['audio']);
			// return redirect()->back();
		}
		foreach ($newdata as $k => $v) {
			$field->$k = $v;
		}
		$field->save();
		return redirect()->back();
	}
	public function adm_contacts(){
		$contacts = Contact::all();
		return view('Admin/adm_contacts',compact('contacts'));
	}
	public function adm_audio(){
		$audios = Audio::all();
		return view('Admin/adm_audio',compact('audios'));
	}
	public function adm_contacts_top(){
		$contacts_top = Contact_top::all();
		return view('Admin/adm_contacts_top',compact('contacts_top'));
	}
	public function adm_footer(){
		$footers = Footer::all();
		return view('Admin/adm_footer',compact('footers'));
	}
	public function adm_gallery(){
		$galleries = Gallery::take(25)->paginate(25);
		$works = Work::all();
		return view('Admin/adm_gallery',compact('galleries','works'));
	}
	public function adm_home_1(){
		$homes_1 = Home_1::all();
		return view('Admin/adm_home_1',compact('homes_1'));
	}
	public function adm_home_2(){
		$homes_2 = Home_2::all();
		return view('Admin/adm_home_2',compact('homes_2'));
	}
	public function adm_info(){
		$infos = Info::all();
		return view('Admin/adm_info',compact('infos'));
	}
	public function adm_library_2(){
		$libraries_2 = Library_2::all();
		return view('Admin/adm_library_2',compact('libraries_2'));
	}
	public function adm_social(){
		$socials = Social::all();
		return view('Admin/adm_social',compact('socials'));
	}
}
