<?php

namespace App\Http\Controllers;

use App\Models\Viability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viability = DB::table('viability')
                ->orderBy('name', 'asc')
                ->get();

        return view('viability.index', ['viability' => $viability]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viability = new Viability();
        return view('viability.create', compact('viability'));
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
        Viability::create($request->all());


        return redirect()->route('viability.index')->with('message', 'Viabilidade salva com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Viability  $viability
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viability = Viability::findOrFail($id);
        return view('viability.show', compact('viability'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Viability  $viability
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viability = Viability::findOrFail($id);
        return view('viability.show', compact('viability'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Viability  $viability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $viability = Viability::findOrFail($id);
        $viability->updated($request->all());

        return redirect()->route('viability.index')->with('message', 'Viabilidade atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Viability  $viability
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viability = Viability::findOrFail($id);
        $viability->delete();

        return back()->with('message', 'Viabilidade excluida com sucesso.');
    }
}
