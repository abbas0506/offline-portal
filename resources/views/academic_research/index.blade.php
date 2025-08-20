@extends('layouts.app')
@section('content')
<x-header></x-header>
<div class="flex justify-center items-center min-h-screen ">
    <div class="md:w-4/5 text-center text-sm text-slate-600 p-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-24">
            <a href="{{ route('papers.index') }}" class="flex flex-col justify-center items-center border p-2  hover:border-pink-300">
                <div class="flex justify-center items-center bg-pink-100 rounded-full w-12 h-12">
                    <i class="bx bx-library text-pink-400 text-xl"></i>
                </div>
                <h3 class="mt-2 font-semibold text-base">Papers</h3>
            </a>
            <a href="models/index.html" class="flex flex-col justify-center items-center border p-2  hover:border-cyan-200 box-border">
                <div class="flex justify-center items-center bg-cyan-100 rounded-full w-12 h-12">
                    <i class="bx bx-scatter-chart text-xl text-cyan-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-base">Journal Papers</h3>
            </a>
            <a href="data-inventory/index.html" class="flex flex-col justify-center items-center border p-2  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-data text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-base">Conference Papers</h3>
            </a>
            <a href="d-cap/index.html" class="flex flex-col justify-center items-center border p-2  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-world text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-base">Technical Report</h3>
            </a>
            <a href="d-cap/index.html" class="flex flex-col justify-center items-center border p-2  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-world text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-base">Literature Survey Report</h3>
            </a>
            <a href="air-trap/index.html" class="flex flex-col justify-center items-center border p-2  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-cloud-snow text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-base">Patent Filed</h3>
            </a>
            <a href="others/index.html" class="flex flex-col justify-center items-center border p-2  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-bookmark-alt-plus text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-base">MPhil Thesis</h3>
            </a>
            <a href="others/index.html" class="flex flex-col justify-center items-center border p-2  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-bookmark-alt-plus text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-base">PhD Thesis</h3>
            </a>
            <a href="others/index.html" class="flex flex-col justify-center items-center border p-2  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-bookmark-alt-plus text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-base">Books Published</h3>
            </a>
        </div>
        <div class="flex flex-wrap justify-center items-center py-4 gap-x-8 gap-y-2 mt-4">
            <img src="{{ asset('images/logos/hec.png')}}" alt="logo" class="w-12 h-12">
            <img src="{{ asset('images/logos/rsgcrl.png')}}" alt="logo" class="w-12 h-12">
            <img src="{{ asset('images/logos/crs.png')}}" alt="logo" class="w-12 h-12">
            <img src="{{ asset('images/logos/pu.png')}}" alt="logo" class="w-12 h-12">
            <img src="{{ asset('images/logos/ncgsa.png')}}" alt="logo" class="w-12 h-12">
        </div>
    </div>
</div>
@endsection