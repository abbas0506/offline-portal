<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\ReviewPaper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviewPapers = ReviewPaper::all();
        return view('academic_research.review_papers.index', compact('reviewPapers'));
    }

    public function create()
    {
        return view('academic_research.review_papers.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'abstract' => 'required|string',
            'authors' => 'required|string',
            'publication_date' => 'required|date',
            'keywords' => 'nullable|string',
            'journal_name' => 'required|string',
            'review_scope' => 'nullable|string',
            'doi' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $paper = Paper::create([
                'title' => $request->title,
                'publication_date' => $request->publication_date,
                'abstract' => $request->abstract,
                'authors' => $request->authors,
                'keywords' => $request->keywords,
                'type' => 'review_paper',
            ]);

            $reviewPaper = new ReviewPaper([
                'journal_name' => $request->journal_name,
                'review_scope' => $request->review_scope,
                'doi' => $request->doi,
            ]);
            $paper->reviewPapers()->save($reviewPaper);

            DB::commit();
            return redirect()->route('review-papers.index')
                ->with('success', 'Review Paper created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('warning', $e->getMessage());
        }
    }

    public function show(reviewPaper $reviewPaper)
    {
        return view('academic_research.review_papers.show', compact('reviewPaper'));
    }

    public function edit(reviewPaper $reviewPaper)
    {
        return view('academic_research.review_papers.edit', compact('reviewPaper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reviewPaper $reviewPaper)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'abstract' => 'required|string',
            'authors' => 'required|string',
            'publication_date' => 'required|date',
            'keywords' => 'nullable|string',
            'journal_name' => 'required|string',
            'review_scope' => 'nullable|string',
            'doi' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $reviewPaper->paper->update([
                'title' => $request->title,
                'publication_date' => $request->publication_date,
                'abstract' => $request->abstract,
                'authors' => $request->authors,
                'keywords' => $request->keywords,
            ]);

            $reviewPaper->update([
                'journal_name' => $request->journal_name,
                'review_scope' => $request->review_scope,
                'doi' => $request->doi,
            ]);
            DB::commit();
            return redirect()->route('review-papers.index')
                ->with('success', 'Review paper updated successfully.');
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
            $reviewPaper = ReviewPaper::findOrFail($id);
            $reviewPaper->delete();

            return redirect()->route('review-papers.index')->with('success', 'Review paper deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('review-papers.index')->with('error', $e->getMessage());
        }
    }
}
