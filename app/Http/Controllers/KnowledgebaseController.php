<?php

namespace App\Http\Controllers;

use App\Models\Knowledgebase;
use App\Http\Requests\StoreKnowledgebaseRequest;
use App\Http\Requests\UpdateKnowledgebaseRequest;
use Illuminate\Http\Request;

class KnowledgebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.knowledgebase.index', [
            'title' => 'Kelola Knowledgebase',
            'knowledgebases'  => Knowledgebase::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKnowledgebaseRequest $request)
    {
        //
        Knowledgebase::create([
            'isi_kb'  => $request->isi_kb
        ]);
        notify()->success('Knowledgebase berhasil ditambakan!');
        return redirect()->to('/kb');
    }

    /**
     * Display the specified resource.
     */
    public function show(Knowledgebase $knowledgebase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Knowledgebase $knowledgebase, string $id)
    {
        //
        $cek = Knowledgebase::findOrFail($id);
        return view('admin.knowledgebase.edit', [
            'title' => 'Edit Knowledgebase',
            'kb'   =>  $cek
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKnowledgebaseRequest $request, Knowledgebase $knowledgebase, string $id)
    {
        //
        $cek = Knowledgebase::findOrFail($id);
        $cek->update([
            'isi_kb' =>   $request->isi_kb
        ]);
        notify()->success('Knowledgebase berhasil diedit!');
        return redirect()->to('/kb');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Knowledgebase $knowledgebase, Request $request)
    {
        //
        $cek = Knowledgebase::findOrFail($request->id);
        $cek->delete();
        notify()->success('Knowledgebase berhasil dihapus!');
        return redirect()->to('/kb');
    }
}
