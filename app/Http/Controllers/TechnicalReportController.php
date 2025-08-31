<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\TechnicalReport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TechnicalReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technicalReports = TechnicalReport::all();
        return view('academic_research.technical_reports.index', compact('technicalReports'));
    }

    public function create()
    {
        return view('academic_research.technical_reports.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'abstract' => 'required|string',
            'authors' => 'required|string',
            'publication_date' => 'required|date',
            'keywords' => 'nullable|string',
            'institution' => 'required|string',
            'doi' => 'required|string',
            'report_number' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $paper = Paper::create([
                'title' => $request->title,
                'publication_date' => $request->publication_date,
                'abstract' => $request->abstract,
                'authors' => $request->authors,
                'keywords' => $request->keywords,
                'type' => 'technical_report',
            ]);

            $technicalReport = new TechnicalReport([
                'institution' => $request->institution,
                'report_number' => $request->report_number,
                'doi' => $request->doi,
            ]);
            $paper->technicalReports()->save($technicalReport);

            DB::commit();
            return redirect()->route('technical-reports.index')
                ->with('success', 'Technical report created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('warning', $e->getMessage());
        }
    }

    public function show(technicalReport $technicalReport)
    {
        return view('academic_research.technical_reports.show', compact('technicalReport'));
    }

    public function edit(technicalReport $technicalReport)
    {
        return view('academic_research.technical_reports.edit', compact('technicalReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, technicalReport $technicalReport)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'abstract' => 'required|string',
            'authors' => 'required|string',
            'publication_date' => 'required|date',
            'keywords' => 'nullable|string',
            'institution' => 'required|string',
            'doi' => 'required|string',
            'report_number' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $technicalReport->paper->update([
                'title' => $request->title,
                'publication_date' => $request->publication_date,
                'abstract' => $request->abstract,
                'authors' => $request->authors,
                'keywords' => $request->keywords,
            ]);

            $technicalReport->update([
                'institution' => $request->institution,
                'report_number' => $request->report_number,
                'doi' => $request->doi,
            ]);
            DB::commit();
            return redirect()->route('technical-reports.index')
                ->with('success', 'Technical report updated successfully.');
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
            $technicalReport = TechnicalReport::findOrFail($id);
            $technicalReport->delete();

            return redirect()->route('technical-reports.index')->with('success', 'Journal paper deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('technical-reports.index')->with('error', $e->getMessage());
        }
    }
}
