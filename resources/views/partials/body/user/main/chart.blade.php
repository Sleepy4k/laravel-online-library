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
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script src="{{ asset('js/custom/highchart.js') }}"></script>
        <script type="text/javascript">createChart(chart = 'dashboard-total-data',type = 'line',title = 'Dashboard Buku',subTitle = 'Data buku ({{ date('Y') }})',xAxisCategories = {!! json_encode(config("chart.categories")) !!},yAxisTitle = 'Nilai',seriesData = [{name: 'Jumlah Buku', data: {!! json_encode($total_book) !!}}]);</script>
    @endpush
@endonce
