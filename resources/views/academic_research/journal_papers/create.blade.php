@extends('layouts.app')

@section('content')
<h1>Create Paper</h1>
<form action="{{ route('papers.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title"><br>
    <textarea name="abstract" placeholder="Abstract"></textarea><br>
    <input type="text" name="authors" placeholder="Authors"><br>
    <input type="date" name="publication_date"><br>
    <input type="text" name="keywords" placeholder="Keywords"><br>
    <input type="text" name="type" placeholder="Type"><br>
    <button type="submit">Create</button>
</form>
@endsection