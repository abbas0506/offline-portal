@extends('layouts.app')

@section('header')
<x-headers.admin :page="1"></x-headers.admin>
@endsection

@section('content')
<div class="mt-32 w-4/5 mx-auto">
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div id='breadCrumb' class="bread-crumb bg-slate-200 p-3 relative">
        <a href="{{ url('admin')}}">Home</a>
        <i class="chevron-right"></i>
        <div>Papers</div>
        <i id='searchIcon' class="bi-search absolute top-3 right-3 hover:cursor-pointer"></i>
    </div>
    <div id='searchBar' class="relative hidden">
        <input type="text" class="custom-input" placeholder="Search by paper title here" oninput="search(event)">
        <i class="bi-x absolute top-3 right-3" id='closeIcon'></i>
    </div>
    <!-- Create new record button -->
    <a href="{{ route('admin.papers.create') }}" class="fixed right-12 bottom-12 w-12 h-12 rounded-full text-white text-2xl bg-teal-600 hover:bg-teal-800 flex justify-center items-center"><i class="bi-plus"></i></a>

    <div class="grid gap-6 mt-6">
        @foreach($papers as $paper)
        <div class="tr border p-4 hover:border-slate-400">
            <a href="{{ route('admin.papers.show', $paper) }}" class="link">{{ $paper->title }}</a>
            <p class="text-sm"> <i class="bi-person"></i> {{ $paper->authors }} | {{ $paper->publication_date }}</p>
            <!-- <p> {{ $paper->abstract }}</p> -->
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