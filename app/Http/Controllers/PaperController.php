<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\ResearchPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $papers = Paper::all();
        return view('academic_research.papers.index', compact('papers'));
    }

    public function create()
    {
        return view('academic_research.papers.create');
    }

    public function store(Request $request)
    {
        $paper = Paper::create($request->all());
        return redirect()->route('papers.index');
        $request->validate([
            'title' => 'required',
            'publication_date' => 'date|nullable',
        ]);

        Paper::create($request->all());

        return redirect()->route('papers.index')
            ->with('success', 'Paper created successfully.');
    }

    public function show(Paper $paper)
    {
        return view('academic_research.papers.show', compact('paper'));
    }

    public function edit(Paper $paper)
    {
        return view('academic_research.papers.edit', compact('paper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paper $paper)
    {
        //
        $request->validate([
            'title' => 'required',
        ]);

        $paper->update($request->all());

        return redirect()->route('papers.index')
            ->with('success', 'Paper updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $paper = Paper::findOrFail($id);
            $paper->delete();

            return redirect()->route('papers.index')
                ->with('success', 'Paper deleted successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('papers.index')
                ->with('error', 'Paper not found.');
        } catch (\Exception $e) {
            Log::error("Error deleting paper: " . $e->getMessage());
            return redirect()->route('papers.index')
                ->with('error', 'An error occurred while deleting the paper.');
        }
    }
}
