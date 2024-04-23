<nav>
    <div class="container-fluid pt-3 " style="height: 156px">
        <div class="row">
            <div class="col-5">
                <h1 class="title">Jib Poch Coffee Shop</h1>
                <h5 class="date">Date: {{ now()->format('l, F j, Y') }}</h5>
            </div>
            <div class="col-4 p-0 mt-3 d-flex justify-content-center ">
                {{-- <form action="/search" method="GET">
                    <div class="input-group rounded ">
                        <input type="search" class="form-control search-bar" placeholder="Search for something"
                            aria-label="Search" aria-describedby="search-addon" />
                    </div>
                </form> --}}
            </div>
            <div class="col-3">
                <div class="row admin">
                    <div class="col-2" style="padding: 15px">
                        <img class="profile" src="{{ asset('Image/Rose BlackPink.jpg') }}" alt="">
                    </div>
                    <div class="col-8" style="padding-top: 20px; padding-left:60px">
                        <h5 class="positions">Admin</h5>
                        <h4 class="name">Rose Black Pink</h4>
                    </div>
                    <div class="col-2 p-0 d-flex justify-content-end p-3">
                        <i class="fa-regular fa-bell" style="color: #3559E0; font-size:25px"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
