@extends('layouts.app')

@section('header')
<x-headers.admin :page="1"></x-headers.admin>
@endsection

@section('content')
<div class="mt-32 w-4/5 mx-auto border">
    <div id='breadCrumb' class="bread-crumb bg-slate-200 p-3 relative">
        <h3>Edit Paper</h3>
        <a href="{{ route('admin.papers.index')}}" class="absolute top-3 right-3 link"><i class="bi-x"></i></a>
    </div>

    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="container-light">
        <form action="{{route('admin.papers.update', $paper)}}" method='post' class="w-full md:w-2/3 mx-auto">
            @csrf
            @method('patch')
            <input type="hidden" name="type" value="paper">
            <div class="grid gap-8 mt-6">
                <div class="">
                    <label>Paper Title</label>
                    <textarea name='title' rows="2" class="custom-input-borderless" placeholder="Paper title" value="">{{ $paper->title }}</textarea>
                </div>
                <div class="">
                    <label>Authors</label>
                    <input type="text" name='authors' class="custom-input-borderless" placeholder="Author names" value="{{ $paper->authors }}" required>
                </div>
                <div class="">
                    <label>Publication Date</label>
                    <input type="date" name='publication_date' class="custom-input-borderless" placeholder="Publication date" value="{{ old('publication_date', optional($paper)->publication_date?->toDateString()) }}" required>
                </div>

                <div class="">
                    <label>Abstract</label>
                    <textarea name='abstract' rows="5" class="custom-input-borderless" placeholder="Abstract (optional)">{{ $paper->abstract }}</textarea>
                </div>
                <div class="">
                    <label>Keywords</label>
                    <input type="text" name='keywords' class="custom-input-borderless" placeholder="List of keywords" value="{{ $paper->keywords }}" required>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn-green rounded">Save</button>
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