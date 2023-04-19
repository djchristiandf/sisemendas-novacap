<?php

namespace App\Http\Controllers;

use App\Models\Parliamentary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParliamentaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parliamentarians = Parliamentary::First()->paginate(10);

        return view('parliamentarians.index', compact('parliamentarians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parliamentary = new Parliamentary();
        return view('parliamentarians.create', compact('parliamentary'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        //2 ways
        Parliamentary::create($request->all());


        return redirect()->route('parliamentarians.index')->with('message', 'Parlamentar salvo com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parliamentary  $parliamentary
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parliamentary = Parliamentary::findOrFail($id);
        return view('parliamentarians.show', compact('parliamentary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parliamentary  $parliamentary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parliamentary = Parliamentary::findOrFail($id);
        return view('parliamentarians.edit', compact('parliamentary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parliamentary  $parliamentary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $parliamentary = Parliamentary::findOrFail($id);
        $parliamentary->updated($request->all());

        return redirect()->route('parliamentarians.index')->with('message', 'Parlamentar atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parliamentary  $parliamentary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parliamentary = Parliamentary::findOrFail($id);
        $parliamentary->delete();

        return back()->with('message', 'Parlamentar excluído com sucesso.');
    }
}
