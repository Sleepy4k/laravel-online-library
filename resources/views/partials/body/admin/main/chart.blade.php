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
