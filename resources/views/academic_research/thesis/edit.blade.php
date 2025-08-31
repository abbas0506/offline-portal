@extends('layouts.app')

@section('header')
<x-header :page="1"></x-header>
@endsection

@section('content')
<div class="mt-32 w-4/5 mx-auto border">
    <div id='breadCrumb' class="bread-crumb bg-slate-200 p-3 relative">
        @if($thesis->paper->type=='mphil_thesis')
        <a href="{{ route('mphil.thesis')}}">MPhil Thesis</a>
        @else
        <a href="{{ route('phd.thesis')}}">PhD Thesis</a>
        @endif
        <i class="chevron-right"></i>
        <h3>Edit</h3>
        <i class="chevron-right"></i>
        <h3>{{ $thesis->id }}</h3>
        <a href="{{ route('thesis.index')}}" class="absolute top-3 right-3 link"><i class="bi-x"></i></a>
    </div>

    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="container-light">
        <form action="{{route('thesis.update', $thesis)}}" method='post' class="w-full md:w-2/3 mx-auto">
            @csrf
            @method('patch')
            <div class="grid gap-8 mt-6">
                <div class="">
                    <label>Paper Title</label>
                    <textarea name='title' rows="2" class="custom-input-borderless" placeholder="Paper title" value="">{{ $thesis->paper->title }}</textarea>
                </div>
                <div class="">
                    <label>Authors</label>
                    <input type="text" name='authors' class="custom-input-borderless" placeholder="Author names" value="{{ $thesis->paper->authors }}" required>
                </div>
                <div class="">
                    <label>Publication Date</label>
                    <input type="date" name='publication_date' class="custom-input-borderless" placeholder="Publication date" value="{{ old('publication_date', optional($thesis->paper)->publication_date?->toDateString()) }}" required>
                </div>

                <div class="">
                    <label>Abstract</label>
                    <textarea name='abstract' rows="5" class="custom-input-borderless" placeholder="Abstract (optional)">{{ $thesis->paper->abstract }}</textarea>
                </div>
                <div class="">
                    <label>Keywords</label>
                    <input type="text" name='keywords' class="custom-input-borderless" placeholder="List of keywords" value="{{ $thesis->paper->keywords }}" required>
                </div>

                <div class="">
                    <label>Degree Type</label>
                    <p>@if($thesis->degree_type=='mphil_thesis') M Phil @else Ph D @endif</p>

                </div>
                <div class="">
                    <label>Degree Program</label>
                    <input type="text" name='degree_program' class="custom-input-borderless" placeholder="Degree Program" value="{{ $thesis->degree_program }}" required>
                </div>
                <div class="">
                    <label>Supervisor</label>
                    <input type="text" name='supervisor' class="custom-input-borderless" placeholder="Supervisor" value="{{ $thesis->supervisor }}" required>
                </div>
                <div class="">
                    <label>Key Findings</label>
                    <input type="text" name='key_findings' class="custom-input-borderless" placeholder="Key Findings" value="{{ $thesis->key_findings }}" required>
                </div>
                <div class="">
                    <label>Methodolgy</label>
                    <input type="text" name='methodology' class="custom-input-borderless" placeholder="Methodology" value="{{ $thesis->methodology }}" required>
                </div>
                <div class="">
                    <label>Submission Data</label>
                    <input type="date" name='submission_date' class="custom-input-borderless" placeholder="Submission date" value="{{ old('submission_date', optional($thesis->submission_date)->toDateString()) }}" required>
                </div>
                <div class="">
                    <label>DOI</label>
                    <input type="text" name='doi' class="custom-input-borderless" placeholder="DOI" value="{{ $thesis->doi }}">
                </div>

                <div class="text-right">
                    <button type="submit" class="btn-green rounded">Update</button>
                </div>

            </div>
        </form>

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