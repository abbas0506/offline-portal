@extends('layouts.app')

@section('content')
<h1>Papers</h1>
<a href="{{ route('papers.create') }}">Create New Paper</a>
<ul>
    @foreach($papers as $paper)
    <li>
        <strong>{{ $paper->title }}</strong>
        @if($paper->journalPaper)
        - Published in: {{ $paper->journalPaper->journal_name }}
        @else
        - <a href="{{ route('journal_papers.create', $paper->id) }}">Add Journal Info</a>
        @endif
    </li>
    @endforeach
</ul>
@endsection