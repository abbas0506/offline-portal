@extends('layouts.app')

@section('header')
<x-header :page="1"></x-header>
@endsection

@section('content')
<div class="mt-32 w-4/5 mx-auto border">
    <div id='breadCrumb' class="bread-crumb bg-slate-200 p-3 relative">
        <a href="{{ route('conference-papers.index')}}">Conference Papers</a>
        <i class="chevron-right"></i>
        <h3>Edit</h3>
        <i class="chevron-right"></i>
        <h3>{{ $conferencePaper->id }}</h3>
        <a href="{{ route('conference-papers.index')}}" class="absolute top-3 right-3 link"><i class="bi-x"></i></a>
    </div>

    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="container-light">
        <form action="{{route('conference-papers.update', $conferencePaper)}}" method='post' class="w-full md:w-2/3 mx-auto">
            @csrf
            @method('patch')
            <input type="hidden" name="type" value="paper">
            <div class="grid gap-8 mt-6">
                <div class="">
                    <label>Paper Title</label>
                    <textarea name='title' rows="2" class="custom-input-borderless" placeholder="Paper title" value="">{{ $conferencePaper->paper->title }}</textarea>
                </div>
                <div class="">
                    <label>Authors</label>
                    <input type="text" name='authors' class="custom-input-borderless" placeholder="Author names" value="{{ $conferencePaper->paper->authors }}" required>
                </div>
                <div class="">
                    <label>Publication Date</label>
                    <input type="date" name='publication_date' class="custom-input-borderless" placeholder="Publication date" value="{{ old('publication_date', optional($conferencePaper->paper)->publication_date?->toDateString()) }}" required>
                </div>

                <div class="">
                    <label>Abstract</label>
                    <textarea name='abstract' rows="5" class="custom-input-borderless" placeholder="Abstract (optional)">{{ $conferencePaper->paper->abstract }}</textarea>
                </div>
                <div class="">
                    <label>Keywords</label>
                    <input type="text" name='keywords' class="custom-input-borderless" placeholder="List of keywords" value="{{ $conferencePaper->paper->keywords }}" required>
                </div>

                <div class="">
                    <label>Conference Name</label>
                    <input type="text" name='conference_name' class="custom-input-borderless" placeholder="Conference name" value="{{ $conferencePaper->conference_name }}" required>
                </div>
                <div class="">
                    <label>Conference Date</label>
                    <input type="date" name='conference_date' class="custom-input-borderless" placeholder="Conference date" value="{{ old('conference_date', $conferencePaper->conference_date?->toDateString()) }}" required>
                </div>
                <div class="">
                    <label>Location</label>
                    <input type="text" name='location' class="custom-input-borderless" placeholder="Location" value="{{ $conferencePaper->location }}" required>
                </div>
                <div class="">
                    <label>DOI</label>
                    <input type="text" name='doi' class="custom-input-borderless" placeholder="DOI" value="{{ $conferencePaper->doi }}">
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