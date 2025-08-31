@extends('layouts.app')

@section('header')
<x-header :page="1"></x-header>
@endsection

@section('content')
<div class="mt-32 w-4/5 mx-auto border">
    <div id='breadCrumb' class="relative bread-crumb bg-slate-200 p-3">
        <a href="{{ route('conference-papers.index')}}">Conference Papers</a>
        <i class="chevron-right"></i>
        <div>{{ $conferencePaper->id }}</div>
        <!-- close button -->
        <a href="{{ route('conference-papers.index')}}" class="absolute top-3 right-3 link"><i class="bi-x"></i></a>

    </div>
    <div class="grid gap-6 mt-6 relative">

        @if(Auth::check())
        <a href="{{ route('conference-papers.edit', $conferencePaper) }}" class="absolute -top-3 right-8">
            <i class="bx bx-pencil"></i>
        </a>
        <form action="{{route('conference-papers.destroy',$conferencePaper)}}" method="POST" onsubmit="return confirmDel(event)" class="absolute -top-3 right-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-transparent p-0 border-0">
                <i class="bx bx-trash"></i>
            </button>
        </form>
        @endif
        <div class="container">

            <h2>{{ $conferencePaper->paper->title }}</h2>
            <p class="text-sm mt-5"> <i class="bi-person"></i> {{ $conferencePaper->paper->authors }}</p>
            <p class="text-sm"> <i class="bi-clock"></i> {{ $conferencePaper->paper->publication_date }}</p>
            <div class="grid grid-cols-2 mt-8">
                <h2>Abstract</h2>
                <p>{{ $conferencePaper->paper->abstract }}</p>
                <h2>Keywords</h2>
                <p>{{ $conferencePaper->paper->keywords }}</p>
                <h2>Conference Name: </h2>
                <p>{{ $conferencePaper->conference_name }}</p>
                <h2>Conference Location:</h2>
                <p>{{ $conferencePaper->location }}</p>
                <h2>Conference Date:</h2>
                <p>{{ $conferencePaper->conference_date }}</p>
                <h2>DOI</h2>
                <p>{{ $conferencePaper->doi }}</p>
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