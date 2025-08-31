@extends('layouts.app')

@section('header')
<x-header :page="1"></x-header>
@endsection

@section('content')
<div class="mt-32 w-4/5 mx-auto border">
    <div id='breadCrumb' class="relative bread-crumb bg-slate-200 p-3">
        <a href="{{ route('survey-reports.index')}}">Survey Reports</a>
        <i class="chevron-right"></i>
        <div>{{ $surveyReport->id }}</div>
        <!-- close button -->
        <a href="{{ route('survey-reports.index')}}" class="absolute top-3 right-3 link"><i class="bi-x"></i></a>

    </div>
    <div class="grid gap-6 mt-6 relative">

        @if(Auth::check())
        <a href="{{ route('survey-reports.edit', $surveyReport) }}" class="absolute -top-3 right-8">
            <i class="bx bx-pencil"></i>
        </a>
        <form action="{{route('survey-reports.destroy',$surveyReport)}}" method="POST" onsubmit="return confirmDel(event)" class="absolute -top-3 right-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-transparent p-0 border-0">
                <i class="bx bx-trash"></i>
            </button>
        </form>
        @endif
        <div class="container">
            <h2>{{ $surveyReport->paper->title }}</h2>
            <p class="text-sm mt-5"> <i class="bi-person"></i> {{ $surveyReport->paper->authors }}</p>
            <p class="text-sm"> <i class="bi-clock"></i> {{ $surveyReport->paper->publication_date }}</p>
            <div class="grid grid-cols-2 mt-8">
                <h2>Abstract</h2>
                <p>{{ $surveyReport->paper->abstract }}</p>
                <h2>Keywords</h2>
                <p>{{ $surveyReport->paper->keywords }}</p>
                <h2>Key Findings: </h2>
                <p>{{ $surveyReport->key_findings }}</p>
                <h2>Survey Scope:</h2>
                <p>{{ $surveyReport->survey_scope }}</p>
                <h2>DOI</h2>
                <p>{{ $surveyReport->doi }}</p>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    function confirmDel(event) {
        event.preventDefault(); // prevent form submit
        var form = event.target; // storing the form

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        })
    }
</script>

@endsection