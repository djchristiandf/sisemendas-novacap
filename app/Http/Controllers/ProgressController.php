<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progress = DB::table('progress')
                ->orderBy('name', 'asc')
                ->get();

        return view('progress.index', ['progress' => $progress]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $progress = new Progress();
        return view('progress.create', compact('progress'));
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
        Progress::create($request->all());


        return redirect()->route('progress.index')->with('message', 'Progresso salvo com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progress = Progress::findOrFail($id);
        return view('progress.show', compact('progress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progress = Progress::findOrFail($id);
        return view('progress.show', compact('progress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $progress = Progress::findOrFail($id);
        $progress->updated($request->all());

        return redirect()->route('progress.index')->with('message', 'Progresso atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $progress = Progress::findOrFail($id);
        $progress->delete();

        return back()->with('message', 'Progresso excluido com sucesso.');
    }
}
