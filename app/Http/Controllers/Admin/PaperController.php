<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $papers = Paper::all();
        return view('admin.academic_research.papers.index', compact('papers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.academic_research.papers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'publication_date' => 'date|nullable',
        ]);

        echo $request->publication_date;
        Paper::create($request->all());

        return redirect()->route('admin.papers.create')
            ->with('success', 'Paper created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $paper = Paper::find($id);
        return view('admin.academic_research.papers.show', compact('paper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paper $paper)
    {
        return view('admin.academic_research.papers.edit', compact('paper'));
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

        return redirect()->route('admin.papers.index')
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

            return redirect()->route('admin.papers.index')
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
