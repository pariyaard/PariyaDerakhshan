<?php

namespace App\Http\Controllers;

use App\Models\Bericht;
use Illuminate\Http\Request;

class BerichtController extends Controller
{
    public function index()
    {
        $berichts = Bericht::all();

        return view('berichts.index', compact('berichts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('berichts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Bericht::create($request->all());

        return redirect()->route('berichts.index')
            ->with('success', 'Berichten created successfully.');
    }


    public function show(Bericht $project)
    {
        return view('berichts.show', compact('berichts'));
    }

    public function edit(Bericht $project)
    {
        return view('berichts.edit', compact('bericht'));
    }

    public function update(Request $request, Bericht $bericht)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $bericht->update($request->all());

        return redirect()->route('berichts.index')
            ->with('success', 'Project updated successfully');
    }

    public function destroy(Bericht $bericht)
    {
        $bericht->delete();

        return redirect()->route('berichts.index')
            ->with('success', 'Bericht deleted successfully');
    }
}
