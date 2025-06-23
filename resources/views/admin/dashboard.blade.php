@extends('layouts.app')

@section('header')
<x-headers.admin :page="1" icon="<i class='bi bi-emoji-smile'></i>"></x-headers.admin>
@endsection

@section('content')
<div class="responsive-container mt-32 w-4/5">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('admin.papers.index') }}" class="palette hover:border-pink-300">
            <div class="flex justify-center items-center bg-pink-100 rounded-full w-12 h-12">
                <i class="bx bx-library text-pink-400 text-xl"></i>
            </div>
            <h3 class="mt-2 font-semibold text-lg">Papers</h3>
        </a>
        <a href="models/index.html" class="palette hover:border-cyan-200 box-border">
            <div class="flex justify-center items-center bg-cyan-100 rounded-full w-12 h-12">
                <i class="bx bx-scatter-chart text-xl text-cyan-400"></i>
            </div>
            <h3 class="mt-2 font-semibold text-lg">Journal Papers</h3>
        </a>
        <a href="data-inventory/index.html" class="palette hover:border-green-200">
            <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                <i class="bx bx-data text-2xl text-green-400"></i>
            </div>
            <h3 class="mt-2 font-semibold text-lg">Conference Papers</h3>
        </a>
        <a href="d-cap/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-green-200">
            <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                <i class="bx bx-world text-2xl text-green-400"></i>
            </div>
            <h3 class="mt-2 font-semibold text-lg">Technical Report</h3>
        </a>
        <a href="d-cap/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-green-200">
            <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                <i class="bx bx-world text-2xl text-green-400"></i>
            </div>
            <h3 class="mt-2 font-semibold text-lg">Literature Survey Report</h3>
        </a>
        <a href="air-trap/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-green-200">
            <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                <i class="bx bx-cloud-snow text-2xl text-green-400"></i>
            </div>
            <h3 class="mt-2 font-semibold text-lg">Patent Filed</h3>
        </a>
        <a href="others/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-green-200">
            <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                <i class="bx bx-bookmark-alt-plus text-2xl text-green-400"></i>
            </div>
            <h3 class="mt-2 font-semibold text-lg">MPhil Thesis</h3>
        </a>
        <a href="others/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-green-200">
            <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                <i class="bx bx-bookmark-alt-plus text-2xl text-green-400"></i>
            </div>
            <h3 class="mt-2 font-semibold text-lg">PhD Thesis</h3>
        </a>
        <a href="others/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-green-200">
            <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                <i class="bx bx-bookmark-alt-plus text-2xl text-green-400"></i>
            </div>
            <h3 class="mt-2 font-semibold text-lg">Books Published</h3>
        </a>
    </div>
</div>
@endsection