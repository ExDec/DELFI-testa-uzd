<?php

namespace App\Http\Controllers;
use App\Klienti;

use Illuminate\Http\Request;

class KlientiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klienti = Klienti::all()->toArray();
        return view('klienti.index', compact('klienti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klienti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $klients = $this->validate(request(), [
          'name' => 'required',
          'email' => 'required',
		  'phone' => 'required',
		  'reg_nr' => 'required'
        ]);
        Klienti::create($klients);
        return redirect('klienti')->with('success', 'Klients pievienots');
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
        $klients = Klienti::find($id);
        return view('klienti.edit',compact('klients','id'));
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
        $klients = Klienti::find($id);
        $this->validate(request(), [
          'name' => 'required',
          'email' => 'required',
		  'phone' => 'required',
		  'reg_nr' => 'required'
        ]);
        $klients->name = $request->get('name');
		$klients->email = $request->get('email');
        $klients->phone = $request->get('phone');
		$klients->reg_nr = $request->get('reg_nr');
        $klients->save();
        return redirect('klienti')->with('success','Klienta dati atjaunoti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klients = Klienti::find($id);
        $klients->delete();
        return redirect('klienti')->with('success','Klienta dati dzēsti');
    }
}
