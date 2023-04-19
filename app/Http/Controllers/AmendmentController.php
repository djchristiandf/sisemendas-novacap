<?php

namespace App\Http\Controllers;

use App\Models\Amendment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmendmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all amendment
        $parliamentarians = DB::table('parliamentarians')
                ->orderBy('name', 'asc')
                ->get();
        // $companies = companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies','');
        $amendments = Amendment::latestFirst()->paginate(10);

        //dd($amendments);

        return view('amendments.index', compact('amendments', 'parliamentarians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amendment = new Amendment();
        return view('amendments.create', compact('amendment'));
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
            'parliamentary' => 'required',
            'amendment' => 'required',
            'caption' => 'required',
            'work_program' => 'required',
            'nature_of_expense' => 'required',
            'price' => 'required',
        ]);

        //2 ways
        Amendment::create($request->all());


        return redirect()->route('amendments.index')->with('message', 'A emenda foi salva com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amendment  $amendment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $amendment = Amendment::findOrFail($id);
        return view('amendments.show', compact('amendment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amendment  $amendment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $amendment = Amendment::findOrFail($id);
        return view('amendments.edit', compact('amendment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Amendment  $amendment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'parliamentary' => 'required',
            'amendment' => 'required',
            'caption' => 'required',
            'work_program' => 'required',
            'nature_of_expense' => 'required',
            'price' => 'required',
        ]);
        $amendment = Amendment::findOrFail($id);
        $amendment->updated($request->all());

        return redirect()->route('amendments.index')->with('message', 'Emenda atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amendment  $amendment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amendment = Amendment::findOrFail($id);
        $amendment->delete();

        return back()->with('message', 'Emenda excluida com sucesso.');
    }
}
