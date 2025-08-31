<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\SurveyReport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveyReports = SurveyReport::all();
        return view('academic_research.survey_reports.index', compact('surveyReports'));
    }

    public function create()
    {
        return view('academic_research.survey_reports.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'abstract' => 'required|string',
            'authors' => 'required|string',
            'publication_date' => 'required|date',
            'keywords' => 'nullable|string',
            'key_findings' => 'required|string',
            'survey_scope' => 'nullable|string',
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

            $surveyReport = new SurveyReport([
                'key_findings' => $request->key_findings,
                'survey_scope' => $request->survey_scope,
                'doi' => $request->doi,
            ]);
            $paper->surveyReports()->save($surveyReport);

            DB::commit();
            return redirect()->route('survey-reports.index')
                ->with('success', 'Survey report created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('warning', $e->getMessage());
        }
    }

    public function show(SurveyReport $surveyReport)
    {
        return view('academic_research.survey_reports.show', compact('surveyReport'));
    }

    public function edit(SurveyReport $surveyReport)
    {
        return view('academic_research.survey_reports.edit', compact('surveyReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SurveyReport $surveyReport)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'abstract' => 'required|string',
            'authors' => 'required|string',
            'publication_date' => 'required|date',
            'keywords' => 'nullable|string',
            'key_findings' => 'required|string',
            'survey_scope' => 'nullable|string',
            'doi' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $surveyReport->paper->update([
                'title' => $request->title,
                'publication_date' => $request->publication_date,
                'abstract' => $request->abstract,
                'authors' => $request->authors,
                'keywords' => $request->keywords,
            ]);

            $surveyReport->update([
                'key_findings' => $request->key_findings,
                'survey_scope' => $request->survey_scope,
                'doi' => $request->doi,
            ]);
            DB::commit();
            return redirect()->route('survey-reports.index')
                ->with('success', 'Survey report updated successfully.');
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
            $surveyReport = SurveyReport::findOrFail($id);
            $surveyReport->delete();

            return redirect()->route('survey-reports.index')->with('success', 'Survey report deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('survey-reports.index')->with('error', $e->getMessage());
        }
    }
}
