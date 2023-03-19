<?php

namespace App\Http\Controllers;

use App\Models\Pio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pios.index',[
            'pios'=> Pio::with('user')->latest()->get(),
        ]);
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
        $validated = $request->validate([
            //Aqui pones tus reglas(validate es un array assoc. usamos la concatenacion= se cumplen todas estas reglas).
            'title' => 'required|string|max:60',
            'message' => 'required|string|max:255', //regla de validación

        ]);
        //creamos la funcion pios() dentro del modelo de usuario
        //dd($validated);
        $request->user()->pios()->create($validated);
        return redirect(route('pios.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pio  $pio
     * @return \Illuminate\Http\Response
     */
    public function show(Pio $pio)
    { 
        return view('pios.comment',[
            'pio' => $pio,
        ]);

        // return redirect(route('pios.comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pio  $pio
     * @return \Illuminate\Http\Response
     */
    public function edit(Pio $pio)
    {
        //$this->authorize('update', $pio);
        return view('pios.edit',[
            'pio' => $pio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pio  $pio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pio $pio)
    {
        $this->authorize('update', $pio);
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        $pio->update($validated);
        return redirect(route('pios.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pio  $pio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pio $pio)
    {
        $this->authorize('delete',$pio);
        $pio->delete();
        return redirect(route('pios.index'));
    }
}
