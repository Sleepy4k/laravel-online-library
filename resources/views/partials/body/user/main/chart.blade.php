<div class="col-12 col-xl-8">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div id="dashboard-total-data"></div>
            </div>
        </div>
    </div>
</div>

@once
    @push('addon-script')
        <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
        <script type="text/javascript" src="https://code.highcharts.com/modules/export-data.js"></script>
        <script type="text/javascript" src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script type="text/javascript">function createChart(t,e,i,a,l,o,n){Highcharts.chart(t,{chart:{type:e,backgroundColor:"#a8867b"},title:{text:i},subtitle:{text:a},xAxis:{categories:l},yAxis:{title:{text:o}},legend:{layout:"horizontal",align:"center",verticalAlign:"bottom"},plotOptions:{line:{dataLabels:{enabled:!0},enableMouseTracking:!0},series:{allowPointSelect:!0}},series:n,responsive:{rules:[{condition:{maxWidth:500},chartOptions:{legend:{layout:"horizontal",align:"center",verticalAlign:"bottom"}}}]}})}</script>
        <script type="text/javascript">createChart(chart = 'dashboard-total-data',type = 'line',title = 'Dashboard Buku',subTitle = 'Data buku ({{ date('Y') }})',xAxisCategories = {!! json_encode(config("chart.categories")) !!},yAxisTitle = 'Nilai',seriesData = [{name: 'Jumlah Buku', data: {!! json_encode($total_book) !!}}]);</script>
    @endpush
@endonce
