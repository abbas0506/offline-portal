<header class="flex flex-col justify-center items-center w-full my-5">
    <h2 class="text-center font-bold py-3 text-lg">RSGCRL DIGITAL RESOURCES</h2>
    <div class="flex items-center justify-center px-5 md:px-20 w-full ">
        <div class="flex space-x-4">
            <a href="{{ url('/') }}" class="tab @if($page==0) active @endif"><i class="bi-house"></i></a>
            <div>|</div>
            <a href="{{ url('academic-research') }}" class="tab @if($page==1) active @endif">Academic Research</a>
            <div>|</div>
            <a href="" class="tab @if($page==2) active @endif">Software Solution</a>
            <div>|</div>
            <a href="" class="tab @if($page==3) active @endif">Hardware Solution</a>
            <div>|</div>
            <a href="" class="tab @if($page==4) active @endif">Data & Inventory</a>
            <div>|</div>
            <a href="" class="tab @if($page==5) active @endif">Capacity Building</a>
            <div>|</div>
            @if(Auth::check())
            <a href="{{ url('signout') }}" class="tab link"><i class="bi-box-arrow-right text-red-600"></i></a>
            @else
            <a href="{{ url('login') }}" class="tab link">Login</a>
            @endif

        </div>
    </div>
</header>