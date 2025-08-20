<?php

namespace App\Http\Controllers;

use App\Models\JournalPaper;
use App\Models\Paper;
use Illuminate\Http\Request;

class JournalPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($paperId)
    {
        //
        $paper = Paper::findOrFail($paperId);
        return view('journal_papers.create', compact('paper'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $paperId)
    {
        //
        $data = $request->all();
        $data['paper_id'] = $paperId;
        JournalPaper::create($data);
        return redirect()->route('papers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JournalPaper $journalPaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JournalPaper $journalPaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JournalPaper $journalPaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JournalPaper $journalPaper)
    {
        //
    }
}
