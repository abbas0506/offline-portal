<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Models\Paper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThesisController extends Controller
{
    //
    public function mphil()
    {
        session([
            'thesis_type' => 'mphil_thesis'
        ]);

        $theses = Thesis::with('paper')
            ->whereHas('paper', fn($q) => $q->where('type', 'mphil_thesis'))
            ->get();
        return view('academic_research.thesis.index', compact('theses'));
    }
    public function phd()
    {
        session([
            'thesis_type' => 'phd_thesis'
        ]);

        $theses = Thesis::with('paper')
            ->whereHas('paper', fn($q) => $q->where('type', 'phd_thesis'))
            ->get();

        return view('academic_research.thesis.index', compact('theses'));
    }

    public function index()
    {
        if (session('thesis_type')) {
            $theses = Thesis::with('paper')
                ->whereHas('paper', fn($q) => $q->where('type', session('thesis_type')))
                ->get();
            return view('academic_research.thesis.index', compact('theses'));
        } else
            return view('academic_research.thesis.index', compact('warning', 'Thesis type unknown!'));
    }
    public function create()
    {
        if (session('thesis_type'))
            return view('academic_research.thesis.create');
        else
            return view('academic_research.thesis.index', compact('warning', 'Thesis type unknown!'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'abstract' => 'required|string',
            'authors' => 'required|string',
            'publication_date' => 'required|date',
            'keywords' => 'nullable|string',

            'degree_type' => 'required|string|max:255',
            'degree_program' => 'required|string|max:255',
            'key_findings' => 'nullable|string',
            'methodology' => 'nullable|string',
            'submission_date' => 'required|date',
            'supervisor' => 'nullable|string|max:255',
        ]);
        DB::beginTransaction();
        try {
            $paper = Paper::create([
                'title' => $request->title,
                'publication_date' => $request->publication_date,
                'abstract' => $request->abstract,
                'authors' => $request->authors,
                'keywords' => $request->keywords,
                'type' => $request->degree_type,
            ]);

            $thesis = new Thesis([
                'key_findings' => $request->key_findings,
                'degree_type' => $request->degree_type,
                'degree_program' => $request->degree_program,
                'key_findings' => $request->key_findings,
                'supervisor' => $request->supervisor,
                'methodology' => $request->methodology,
                'submission_date' => $request->submission_date,
                'doi' => $request->doi,
            ]);
            $paper->thesis()->save($thesis);

            DB::commit();
            return redirect()->route('thesis.index')
                ->with('success', 'Thesis created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('warning', $e->getMessage());
        }
    }

    public function show($id)
    {
        $thesis = Thesis::findOrFail($id);
        return view('academic_research.thesis.show', compact('thesis'));
    }

    public function edit($id)
    {
        $thesis = Thesis::findOrFail($id);
        return view('academic_research.thesis.edit', compact('thesis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'abstract' => 'required|string',
            'authors' => 'required|string',
            'publication_date' => 'required|date',
            'keywords' => 'nullable|string',

            // 'degree_type' => 'required|string|max:255',
            'degree_program' => 'required|string|max:255',
            'key_findings' => 'nullable|string',
            'methodology' => 'nullable|string',
            'submission_date' => 'required|date',
            'supervisor' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $thesis = Thesis::findOrFail($id);
            $thesis->paper->update([
                'title' => $request->title,
                'publication_date' => $request->publication_date,
                'abstract' => $request->abstract,
                'authors' => $request->authors,
                'keywords' => $request->keywords,
            ]);

            $thesis->update([
                'key_findings' => $request->key_findings,
                // 'degree_type' => $request->degree_type,
                'degree_program' => $request->degree_program,
                'key_findings' => $request->key_findings,
                'supervisor' => $request->supervisor,
                'methodology' => $request->methodology,
                'submission_date' => $request->submission_date,
                'doi' => $request->doi,
            ]);
            DB::commit();
            return redirect()->route('thesis.index')
                ->with('success', 'Thesis updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('warning', $e->getMessage());
        }
        return redirect()->route('thesis.index')->with('success', 'Thesis updated successfully.');
    }

    public function destroy($id)
    {
        $thesis = Thesis::findOrFail($id);
        $thesis->delete();
        return redirect()->route('thesis.index')->with('success', 'Thesis deleted successfully.');
    }
}
