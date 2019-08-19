<?php

namespace App\Http\Controllers\Auth;

use App\models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;

class RegisterController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	use RegistersUsers;
	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name'     => ['required', 'string', 'max:255'],
			'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],

		]);
	}

	protected function create(array $data)
	{
		// $avatar = $data['avatar'];
		// dd($avatar);
		// $filename = time().'.'.$avatar;
		// Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
		$request  = request();
		$avatar   = $request->file('avatar');

		$filename = time() . '.' . $avatar->getClientOriginalExtension();
		Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

		return User::create([
			'name'     => $data['name'],
			'email'    => $data['email'],
			'password' => Hash::make($data['password']),
			'avatar'   => $filename,

		]);
	}
}
