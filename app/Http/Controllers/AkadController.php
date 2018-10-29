<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T101;
use App\T003;
use App\T004;
use App\User;
use App\T105;
use App\T104;
use redirect;

class AkadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $no = 1;
      $transaksi = T101::join('t002s', 't002s.ktp', '=', 't101s.referral_from')
      ->select([
        't101s.*',
        't002s.name'
      ])
      ->where('status', '=', 'SP3K')
      ->get();
      $t002s = User::all();

      return view('transaksi.akad', compact('transaksi', 't002s', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $akad = new T105;
      $akad->code_customer = $request['code_customer'];
      $akad->tanggal = $request['tanggal'];
      $akad->kprs = $request['kprs'];
      $akad->notaris = $request['notaris'];
      $akad->ph = $request['ph'];
      $akad->save();
      $id = $request['id'];
      $update = T101::find($id);
      $update->status = "AKAD";
      $update->update();
        return redirect()->back()->with('msg', 'Data disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
