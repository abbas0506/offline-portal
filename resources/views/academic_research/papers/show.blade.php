@extends('layouts.app')

@section('header')
<x-header :page="1"></x-header>
@endsection

@section('content')
<div class="mt-32 w-4/5 mx-auto border">
    <div id='breadCrumb' class="relative bread-crumb bg-slate-200 p-3">
        <a href="{{ url('/')}}">Home</a>
        <i class="chevron-right"></i>
        <a href="{{ route('papers.index')}}">Papers</a>
        <i class="chevron-right"></i>
        <div>{{ $paper->id }}</div>
        <!-- close button -->
        <a href="{{ route('papers.index')}}" class="absolute top-3 right-3 link"><i class="bi-x"></i></a>

    </div>
    <div class="grid gap-6 mt-6 relative">

        @if(Auth::check())
        <a href="{{ route('papers.edit', $paper) }}" class="absolute -top-3 right-8">
            <i class="bx bx-pencil"></i>
        </a>
        <form action="{{route('papers.destroy',$paper)}}" method="POST" onsubmit="return confirmDel(event)" class="absolute -top-3 right-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-transparent p-0 border-0">
                <i class="bx bx-trash"></i>
            </button>
        </form>
        @endif
        <div class="container">
            <h2>{{ $paper->title }}</h2>
            <p class="text-sm mt-5"> <i class="bi-person"></i> {{ $paper->authors }}</p>
            <p class="text-sm"> <i class="bi-clock"></i> {{ $paper->publication_date }}</p>
            <p class="mt-5"><span class="font-semibold">Abstract: </span>{{ $paper->abstract }}</p>
            <p class="mt-5"><span class="font-semibold">Keywords: </span>{{ $paper->keywords }}</p>
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