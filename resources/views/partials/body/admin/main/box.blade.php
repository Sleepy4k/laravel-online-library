<div class="col-12 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon blue">
                        <i class="bi-person-fill"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Jumlah Buku</h6>
                    <h6 class="font-extrabold mb-0">{{ count($books) }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon green">
                        <i class="bi-person-check-fill"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Jumlah Penulis</h6>
                    <h6 class="font-extrabold mb-0">{{ count($authors) }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-lg-3 col-md-12">
    <div class="card ">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon red">
                        <i class="bi-people-fill"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Jumlah Penerbit</h6>
                    <h6 class="font-extrabold mb-0">{{ count($publisher) }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-lg-3 col-md-12">
    <div class="card ">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon red">
                        <i class="bi-people-fill"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Jumlah Pengguna</h6>
                    <h6 class="font-extrabold mb-0">{{ count($users) }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
