<div class="card">
    <div class="card-body py-4 px-4">
        <h6>Selamat Datang !</h6>
        <div class="d-flex align-items-center">
            <div class="avatar avatar-xl">
                <img src="images/faces/1.jpg" alt="Face 1">
            </div>
            <div class="ms-3 name">
                @auth
                    <h6 class="font-bold">{{ request()->user()->name }}</h6>
                    <h6 class="text-muted mb-0">@ {{ ucfirst(request()->user()->getRoleNames()[0]) }}</h6>
                @else
                    <h6 class="font-bold">Pengguna</h6>
                    <h6 class="text-muted mb-0">@ Guest</h6>
                @endauth
            </div>
        </div>
    </div>
</div>
