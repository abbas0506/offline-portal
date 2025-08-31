@extends('layouts.app')

@section('header')
<x-header :page="1"></x-header>
@endsection

@section('content')
<div class="mt-32 w-4/5 mx-auto border">
    <div id='breadCrumb' class="bread-crumb bg-slate-200 p-3 relative">
        <a href="{{ route('review-papers.index')}}">Review Papers</a>
        <i class="chevron-right"></i>
        <h3>Edit</h3>
        <i class="chevron-right"></i>
        <h3>{{ $reviewPaper->id }}</h3>
        <a href="{{ route('review-papers.index')}}" class="absolute top-3 right-3 link"><i class="bi-x"></i></a>
    </div>

    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="container-light">
        <form action="{{route('review-papers.update', $reviewPaper)}}" method='post' class="w-full md:w-2/3 mx-auto">
            @csrf
            @method('patch')
            <input type="hidden" name="type" value="paper">
            <div class="grid gap-8 mt-6">
                <div class="">
                    <label>Paper Title</label>
                    <textarea name='title' rows="2" class="custom-input-borderless" placeholder="Paper title" value="">{{ $reviewPaper->paper->title }}</textarea>
                </div>
                <div class="">
                    <label>Authors</label>
                    <input type="text" name='authors' class="custom-input-borderless" placeholder="Author names" value="{{ $reviewPaper->paper->authors }}" required>
                </div>
                <div class="">
                    <label>Publication Date</label>
                    <input type="date" name='publication_date' class="custom-input-borderless" placeholder="Publication date" value="{{ old('publication_date', optional($reviewPaper->paper)->publication_date?->toDateString()) }}" required>
                </div>

                <div class="">
                    <label>Abstract</label>
                    <textarea name='abstract' rows="5" class="custom-input-borderless" placeholder="Abstract (optional)">{{ $reviewPaper->paper->abstract }}</textarea>
                </div>
                <div class="">
                    <label>Keywords</label>
                    <input type="text" name='keywords' class="custom-input-borderless" placeholder="List of keywords" value="{{ $reviewPaper->paper->keywords }}" required>
                </div>

                <div class="">
                    <label>Journal Name</label>
                    <input type="text" name='journal_name' class="custom-input-borderless" placeholder="journal name" value="{{ $reviewPaper->journal_name }}" required>
                </div>
                <div class="">
                    <label>Review Scope</label>
                    <input type="text" name='review_scope' class="custom-input-borderless" placeholder="Review scope" value="{{ $reviewPaper->review_scope }}" required>
                </div>
                <div class="">
                    <label>DOI</label>
                    <input type="text" name='doi' class="custom-input-borderless" placeholder="DOI" value="{{ $reviewPaper->doi }}">
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