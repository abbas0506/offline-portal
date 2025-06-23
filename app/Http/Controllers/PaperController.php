<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\ResearchPaper;
use Illuminate\Http\Request;

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
    }

    public function show(Paper $paper)
    {
        return view('academic_reseach.papers.show', compact('paper'));
    }
}
