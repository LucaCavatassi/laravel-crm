@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="my-4 p-4">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mb-2">
                <h1>Ecco i dati dei tuoi clienti</h1>
            </div>
            <div id="chart_div" style="width: 100%; height: 500px;"></div>

            
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawChart);
            
                var chart; // Declare chart variable outside drawChart
            
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Category', 'Value'],
                        ['Numero totale di aziende', {{ $totalCompanies }}],
                        ['Numero totale di dipendenti', {{ $totalEmployees }}],
                        ['Azienda con più dipendenti: ' + '{{ $largestCompanyName }}', {{ $largestCompanyEmployees->employees_count }}]
                    ]);
            
                    var options = {
                        title: 'Overview clienti',
                        chartArea: {width: '50%'},
                        hAxis: {
                            title: 'Total',
                            minValue: 0
                        },
                        vAxis: {
                            title: 'Categoria'
                        },
                        colors: ['rgb(34, 158, 243)']
                    };
            
                    // Create the chart
                    chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
            
                    // Re-draw the chart on window resize
                    window.addEventListener('resize', function() {
                        chart.draw(data, options);
                    });
                }
            </script>
        </div>
    </div>
@endsection
