<?php

namespace App\Http\Controllers;
use App\Pasutijumi;
use App\Klienti;

use Illuminate\Http\Request;

class PasutijumiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function index()
    {
        $pasutijumi = Pasutijumi::all()->toArray();
        return view('pasutijumi.index', compact('pasutijumi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$klienti = Klienti::pluck('name', 'id');
		return view('pasutijumi.create')->with(compact('klienti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pasutijums = $this->validate(request(), [
          'name' => 'required',
          'client' => 'required',
		  'info' => 'required',
		  'price' => 'required|numeric'
        ]);
        Pasutijumi::create($pasutijums);
        return redirect('pasutijumi')->with('success', 'Pasūtījums pievienots');
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
        $pasutijums = Pasutijumi::find($id);
		$klienti = Klienti::pluck('name', 'id');
        return view('pasutijumi.edit',compact('pasutijums','id', 'klienti'));
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
        $pasutijums = Pasutijumi::find($id);
        $this->validate(request(), [
          'name' => 'required',
          'client' => 'required',
		  'info' => 'required',
		  'price' => 'required|numeric'
        ]);
        $pasutijums->name = $request->get('name');
		$pasutijums->client = $request->get('client');
        $pasutijums->info = $request->get('info');
		$pasutijums->price = $request->get('price');
        $pasutijums->save();
        return redirect('pasutijumi')->with('success','Pasūtījuma dati atjaunoti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasutijums = Pasutijumi::find($id);
        $pasutijums->delete();
        return redirect('pasutijumi')->with('success','Pasūtījuma dati dzēsti');
    }
}
