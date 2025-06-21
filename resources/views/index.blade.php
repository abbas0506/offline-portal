@extends('layouts.app')
@section('content')
<div class="flex justify-center items-center min-h-screen ">
    <div class="md:w-3/4 text-center text-sm text-slate-600 p-5">
        <h1 class="text-center text-black text-xl font-bold">RSGCRL DIGITAL RESOURCES</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
            <a href="{{ url('academic-research') }}" class="flex flex-col justify-center items-center p-4 border  hover:border-pink-300">
                <div class="flex justify-center items-center bg-pink-100 rounded-full w-12 h-12">
                    <i class="bx bx-library text-pink-400 text-xl"></i>
                </div>
                <h3 class="mt-2 font-semibold text-lg">Acdemic Research</h3>
                <p>Books, e-books, research papers, thesis, journal papers and others</p>
            </a>
            <a href="models/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-cyan-200 box-border">
                <div class="flex justify-center items-center bg-cyan-100 rounded-full w-12 h-12">
                    <i class="bx bx-scatter-chart text-xl text-cyan-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-lg">Models & Maps</h3>
                <p>Atmospheric chemistry, landuse and landcover, climate change etc.</p>
            </a>
            <a href="data-inventory/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-data text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-lg">Data and Inventory</h3>
                <p>Dataset collection, inventory management and model generation</p>
            </a>
            <a href="d-cap/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-world text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-lg">D-CAP</h3>
                <p>Digital Climatic Atlas of Pakistan; Atmospheric chemistry etc.</p>
            </a>
            <a href="air-trap/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-cloud-snow text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-lg">AIR-TRAP</h3>
                <p>National Observatory of Transboundary Air Pollution</p>
            </a>
            <a href="others/index.html" class="flex flex-col justify-center items-center p-4 border  hover:border-green-200">
                <div class="flex justify-center items-center bg-green-100 rounded-full w-12 h-12">
                    <i class="bx bx-bookmark-alt-plus text-2xl text-green-400"></i>
                </div>
                <h3 class="mt-2 font-semibold text-lg">Other Resources</h3>
                <p>Include shape files, softwares, codes, and logos etc.</p>
            </a>
        </div>
        <div class="flex flex-wrap justify-center items-center py-4 gap-x-8 gap-y-2 mt-4">
            <img src="{{ asset('images/logos/hec.png')}}" alt="logo" class="w-12 h-12">
            <a href="{{ url('login') }}">
                <img src="{{ asset('images/logos/rsgcrl.png')}}" alt="logo" class="w-12 h-12">
            </a>
            <img src="{{ asset('images/logos/crs.png')}}" alt="logo" class="w-12 h-12">
            <img src="{{ asset('images/logos/pu.png')}}" alt="logo" class="w-12 h-12">
            <img src="{{ asset('images/logos/ncgsa.png')}}" alt="logo" class="w-12 h-12">
        </div>
    </div>
</div>
@endsection