@extends('layouts.admin')

@section('page-content')
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
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
            </div>
            <div class="row">
                <div class="card">
                    <div class="row mt-3 mb-3 justify-content-center">
                        <div id="dashboard-total-book"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="row mt-3 mb-3 justify-content-center">
                        <div id="dashboard-total-author"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="row mt-3 mb-3 justify-content-center">
                        <div id="dashboard-total-publisher"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="row mt-3 mb-3 justify-content-center">
                        <div id="dashboard-total-user"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Buku Terbaru</h4>
                </div>
                @foreach ($books->take(5) as $book)
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ Str::limit($book->title, 20, '...') }}</h5>
                                <h6 class="text-muted mb-0"><b>Penulis</b> : {{ Str::limit($book->author->name, 18, '...') }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Peminjaman Terbaru</h4>
                </div>
                @foreach ($loans->take(5) as $loan)
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ Str::limit($loan->book->title, 20, '...') }}</h5>
                                <h6 class="text-muted mb-0"><b>Peminjam</b> : {{ Str::limit($loan->user->name, 18, '...') }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Kategori Terbaru</h4>
                </div>
                <div class="card-body">
                    @foreach ($categories->take(5) as $category)
                        <div class="card-content pb-4">
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="name ms-4">
                                    <h5 class="mb-1">{{ Str::limit($category->name, 20, '...') }}</h5>
                                    <h6 class="text-muted mb-0"><b>Jumlah buku </b> : {{ count($category->books) }} buku</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@once
    @push('addon-script')
        <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
        <script type="text/javascript" src="https://code.highcharts.com/modules/export-data.js"></script>
        <script type="text/javascript" src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script type="text/javascript">function createChart(t,e,i,a,l,o,n){Highcharts.chart(t,{chart:{type:e,backgroundColor:"#a8867b"},title:{text:i},subtitle:{text:a},xAxis:{categories:l},yAxis:{title:{text:o}},legend:{layout:"horizontal",align:"center",verticalAlign:"bottom"},plotOptions:{line:{dataLabels:{enabled:!0},enableMouseTracking:!0},series:{allowPointSelect:!0}},series:n,responsive:{rules:[{condition:{maxWidth:500},chartOptions:{legend:{layout:"horizontal",align:"center",verticalAlign:"bottom"}}}]}})}</script>
        <script type="text/javascript">
            createChart(chart = 'dashboard-total-book',type = 'line',title = 'Dashboard Buku',subTitle = 'Data buku masuk pada tahun {{ date('Y') }}',xAxisCategories = {!! json_encode(config("chart.categories")) !!},yAxisTitle = 'Nilai',seriesData = [{name: 'Jumlah Buku', data: {!! json_encode($total_book) !!}}]);
            createChart(chart = 'dashboard-total-author',type = 'line',title = 'Dashboard Penulis',subTitle = 'Data penulis masuk pada tahun {{ date('Y') }}',xAxisCategories = {!! json_encode(config("chart.categories")) !!},yAxisTitle = 'Nilai',seriesData = [{name: 'Jumlah Penulis', data: {!! json_encode($total_author) !!}}]);
            createChart(chart = 'dashboard-total-publisher',type = 'line',title = 'Dashboard Penerbit',subTitle = 'Data penerbit masuk pada tahun {{ date('Y') }}',xAxisCategories = {!! json_encode(config("chart.categories")) !!},yAxisTitle = 'Nilai',seriesData = [{name: 'Jumlah Penerbit', data: {!! json_encode($total_publisher) !!}}]);
            createChart(chart = 'dashboard-total-user',type = 'line',title = 'Dashboard Pengguna',subTitle = 'Data pengguna masuk pada tahun {{ date('Y') }}',xAxisCategories = {!! json_encode(config("chart.categories")) !!},yAxisTitle = 'Nilai',seriesData = [{name: 'Jumlah Pengguna', data: {!! json_encode($total_user) !!}}]);
        </script>
    @endpush
@endonce
