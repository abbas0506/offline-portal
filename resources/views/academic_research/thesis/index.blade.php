@extends('layouts.app')

@section('header')
<x-header :page="1"></x-header>
@endsection

@section('content')
<div class="responsive-container mt-32 w-4/5">
    <div id='breadCrumb' class="bread-crumb bg-slate-200 p-3 relative">
        <h2>@if(session('thesis_type')==='mphil_thesis') MPhil @else PhD @endif Thesis </h2>
        <i id='searchIcon' class="bi-search absolute top-3 right-3 hover:cursor-pointer"></i>
    </div>
    <div id='searchBar' class="relative hidden">
        <input type="text" class="custom-input" placeholder="Search by paper title here" oninput="search(event)">
        <i class="bi-x absolute top-3 right-3" id='closeIcon'></i>
    </div>
    <a href="{{ route('thesis.create') }}" class="fixed right-12 bottom-12 w-12 h-12 rounded-full text-white text-2xl bg-teal-600 hover:bg-teal-800 flex justify-center items-center">+</a>

    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="grid gap-6 mt-6">
        @foreach($theses as $thesis)
        <div class="tr border p-4 hover:border-slate-400">
            <a href="{{ route('thesis.show', $thesis) }}" class="link">{{ $thesis->paper->title }}</a>
            <p class="text-sm"> <i class="bi-person"></i> {{ $thesis->paper->authors }} | {{ $thesis->paper->publication_date }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('script')
<script type="module">
    $(document).ready(function() {
        $('#searchIcon').click(function() {
            $('#breadCrumb').toggle();
            $('#searchBar').toggle();
        });
        $('#closeIcon').click(function() {
            $('#breadCrumb').toggle();
            $('#searchBar').toggle();
        });
    })
</script>
<script type="text/javascript">
    function search(event) {
        var searchtext = event.target.value.toLowerCase();
        var str = 0;
        $('.tr').each(function() {
            if (!(
                    $(this).children().eq(0).prop('outerText').toLowerCase().includes(searchtext)
                )) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });
    }
</script>

@endsection