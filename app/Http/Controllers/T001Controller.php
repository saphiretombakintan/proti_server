<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\T001;
use App\T003;
use App\T101;
use App\Transformers\T002Transformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class T001Controller extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth:t001');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$t003s = T003::all();
		$utj= T101::where('status', '=', 'BOOKED')->count('status');
		$berkas= T101::where('status', '=', 'BERKAS')->count('status');
		$sp3k= T101::where('status', '=', 'SP3K')->count('status');
		$akad= T101::where('status', '=', 'AKAD')->count('status');
		$rateutj = $utj / 10 * 100;
		$rateberkas = $berkas / 10 * 100;
		$ratesp3k = $sp3k / 10 * 100;
		$rateakad = $akad / 10 * 100;
		return view('dashboard', compact('t003s','utj','berkas','rateberkas','sp3k','akad','ratesp3k','rateakad','rateutj'));
	}

	public function allUnits() {
		return view('welcome');
	}

	public function marketings(User $t002) {
		$t002s = $t002->all();

		return fractal()
			->collection($t002s)
			->transformWith(new T002Transformer)
			->addMeta([
				'data-count' => $t002->count(),
			])
			->toArray();
	}

	public function updateUser(T002 $t002, $code) {
		$t002s = $t002::where('code', $code)->get();

		return fractal()
			->collection($t002s)
			->transformWith(new T002Transformer)
			->toArray();
	}

	public function updateData(Request $req, User $t002, $code) {
		$this->validate($req, [
			'email' => 'required|email|unique:t002s',
			'name' => 'required',
			'address' => 'required',
			'phone' => 'required|unique:t002s',
			'ktp' => 'required',
			'npwp' => 'required',
		]);

		$t002s = $t002::where('code', $code)->update([
			'email' => $req->email,
			'name' => $req->name,
			'address' => $req->address,
			'phone' => $req->phone,
			'ktp' => $req->ktp,
			'npwp' => $req->npwp,
		]);

		return fractal()
			->collection($t002s)
			->transformWith(new T002Transformer)
			->toArray();
	}

	public function register(Request $request, T001 $t001) {

		$this->validate($request, [
			'phone' => 'required|unique:t002s',
			'name' => 'required',
			'email' => 'required|email|unique:t002s',
			'ktp' => 'required',
			'password' => 'required|min:6',
		]);

		$t001s = $t001->create([
			'phone' => $request->phone,
			'email' => $request->email,
			'name' => strtoupper($request->name),
			'ktp' => $request->ktp,
			'password' => bcrypt($request->password),
			'api_token' => bcrypt($request->email),
		]);

		return fractal($t001s, new T002Transformer())
			->respond(201, []);
	}

	public function registerUpload(Request $req, User $t002, $code) {
		$img = $req->file('image_ktp');
		$filename = 'ktp_' . time() . '.' . $img->getClientOriginalExtension();
		$path = $img->storeAs('images_ktp', $filename);

		$t002s = $t002::where('code', $code)->update([
			'image_ktp' => $filename,
		]);
	}

	public function login(Request $request, User $t002) {
		if (!Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
			return response()->json(['error' => 'Error'], 404);
		}
		$t002s = $t002->find(Auth::user()->id);
		return fractal($t002s, new T002Transformer())
			->respond(200, []);

	}

	public function getSaldo(User $t002, $code_u) {
		$t002s = $t002::where('code', $code_u)->get();

		return fractal()
			->collection($t002s)
			->transformWith(new T002Transformer)
			->addMeta([
				'total_saldo' => $t002::where('code', $code_u)->sum('saldo'),
			])
			->toArray();

	}
	public function dashboard(){
		$utj= T101::where('status', '==', 'booked')->sum('price_unit');
		return view ('dashboard', compact('utj'));

	}
}
