@extends('layouts.app')

@section('header')
<x-headers.admin page="Welcome back!" icon="<i class='bi bi-emoji-smile'></i>"></x-headers.admin>
@endsection

@section('content')

@php
$colors=config('globals.colors');
@endphp
<div class="responsive-container">
    <div class="container">
        <div class="flex flex-row justify-between items-center">
            <div class="bread-crumb">
                <div><i class="bi-house"></i> home </div>
            </div>
            <div class="md:hidden text-slate-500">Welcome back!</div>
        </div>
    </div>
</div>
@endsection