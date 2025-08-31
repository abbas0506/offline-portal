<?php

namespace App\Http\Controllers;

use App\Models\JournalPaper;
use App\Models\Paper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JournalPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journalPapers = JournalPaper::all();
        return view('academic_research.journal_papers.index', compact('journalPapers'));
    }

    public function create()
    {
        return view('academic_research.journal_papers.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'publication_date' => 'date|nullable',
        ]);

        DB::beginTransaction();
        try {
            $paper = Paper::create([
                'title' => $request->title,
                'publication_date' => $request->publication_date,
                'abstract' => $request->abstract,
                'authors' => $request->authors,
                'keywords' => $request->keywords,
                'type' => 'journal_paper',
            ]);

            $journalPaper = new JournalPaper([
                'journal_name' => $request->journal_name,
                'volume' => $request->volume,
                'issue' => $request->issue,
                'doi' => $request->doi,
                'issn' => $request->issn,
            ]);
            $paper->journalPapers()->save($journalPaper);

            DB::commit();
            return redirect()->route('journal-papers.index')
                ->with('success', 'Journal Paper created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('warning', $e->getMessage());
        }
    }

    public function show(JournalPaper $journalPaper)
    {
        return view('academic_research.journal_papers.show', compact('journalPaper'));
    }

    public function edit(JournalPaper $journalPaper)
    {
        return view('academic_research.journal_papers.edit', compact('journalPaper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JournalPaper $journalPaper)
    {
        //
        $request->validate([
            'title' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $journalPaper->paper->update([
                'title' => $request->title,
                'publication_date' => $request->publication_date,
                'abstract' => $request->abstract,
                'authors' => $request->authors,
                'keywords' => $request->keywords,
            ]);

            $journalPaper->update([
                'journal_name' => $request->journal_name,
                'volume' => $request->volume,
                'issue' => $request->issue,
                'doi' => $request->doi,
                'issn' => $request->issn,
            ]);
            DB::commit();
            return redirect()->route('journal-papers.index')
                ->with('success', 'Paper updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('warning', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $journalPaper = JournalPaper::findOrFail($id);
            $journalPaper->delete();

            return redirect()->route('journal-papers.index')->with('success', 'Journal paper deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('journal-papers.index')->with('error', $e->getMessage());
        }
    }
}
