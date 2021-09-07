<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::where('status', 1)->get();
        return view('profiles.alert', compact('categories'));
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
            'category_id' => 'required',
            // 'user_id' => 'required'
        ]);

        $selected= $request->category_id;
        // dd($selected);
        $all = Alert::all();
        // foreach ($all as $verif) {
        //     if (isset($verif->category_id)) {
        //         return back()->with('warning', "la categorie << " . $verif->category->name . " >> reçoit déja des alerts");
        //     }
        // }

        foreach ($selected as $select) {
            Alert::create([
                'user_id' => Auth::user()->id,
                'category_id' => $select
            ]);    
        }
        return back()->with('success', "vous allez désormais recevoir des notifications d'emplois pour ces categories");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function show(Alert $alert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function edit(Alert $alert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alert $alert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alert $alert)
    {
        //
    }
}
