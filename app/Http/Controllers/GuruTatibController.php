<?php

namespace App\Http\Controllers;

use App\Exports\eksporPoin;
use App\Imports\imporPoin;
use App\Models\guru_kelas_tatib;
use App\Models\guru_tatib;
use App\Models\nilai_tatib;
use App\Models\tas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class GuruTatibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function inputPoin()
    {
        $gkts = guru_kelas_tatib::where('guru_id', Auth::user()->id)->get();

        $poins = nilai_tatib::where('guru_id', Auth::user()->id)->get();

        $ta = tas::where('aktif', 1)->first();

        return view('poin.inputPoin', compact('gkts', 'poins', 'ta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function exportPoin(Request $request)
    {
        return Excel::download(new eksporPoin($request->kelas_id), 'poin.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function importPoin(Request $request)
    {
        $request->validate([
            "file" => "required|mimes:xlsx"
        ]);
        $file = $request->file('file');

        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $path = $request->file->move(public_path('excel'), $fileName);

        Excel::import(new imporPoin, $path);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(guru_tatib $guru_tatib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(guru_tatib $guru_tatib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, guru_tatib $guru_tatib)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delPoin($id)
    {
        nilai_tatib::where('id', $id)->delete();

        return back();
    }
}
