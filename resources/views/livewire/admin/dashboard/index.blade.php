<div>
    <div class="row">
        <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">Users statistics</h5>
            <div class="row h-100">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start flex-wrap">
                                <div class="card-body border-bottom">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-2 mb-md-2 text-uppercase font-weight-medium">
                                            + users transactions</h6>
                                        <select wire:model="selectBarHorizontal"
                                         class="btn btn-light dropdown-toggle dropdown-toggle-split">
                                            @foreach($selectTypeBarHorizontal as $key => $value)
                                            <option value="{{$key}}"><label class="text-secondary">
                                                {{$value}}</label></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="income-chart-legend" class="d-flex flex-wrap mt-1 mt-md-0"></div>
                                <canvas id="myChartY" width="100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">Income statistics</h5>
            <div class="row h-100">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start flex-wrap">
                                <div>
                                    <p class="mb-3">Realtime database</p>
                                    <h3>+ youngests</h3>
                                </div>
                                <div id="income-chart-legend" class="d-flex flex-wrap mt-1 mt-md-0"></div>
                                <canvas id="myChart" width="100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body border-bottom">

                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-2 mb-md-0 text-uppercase font-weight-medium">Transactions</h6>
                        <select wire:model="selectDonuts" class="btn btn-light dropdown-toggle dropdown-toggle-split">
                            @foreach($selectDaysDonuts as $key => $value)
                            <option value="{{$key}}"><small class="text-muted">{{$value}}</small></option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myDonut" height="320"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-2 mb-md-4 text-uppercase font-weight-medium">Overall per month</h6>
                        <select wire:model="selectLine" class="btn btn-light dropdown-toggle dropdown-toggle-split">
                            @foreach($selectTypeLine as $key => $value)
                            <option value="{{$key}}"><label class="text-secondary">{{$value}}</label></option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myLine" class="mt-5"></canvas>
                    <div class="d-flex align-items-center justify-content-between border-bottom pb-4 mb-3 mt-4">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <p class="text-muted">Sales</p>
                            <h5>{{$sale}}</h5>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <p class="text-muted">Purchases</p>
                            <h5>{{ $purchase}}</h5>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <p class="text-muted">Transations</p>
                            <h5>{{ $purchase + $sale}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-2 mb-md-0 text-uppercase font-weight-medium">Top 5 statistics</h6>
                        <select wire:model="selectRadar" class="btn btn-light dropdown-toggle dropdown-toggle-split">
                            @foreach($selectTypeRadar as $key => $value)
                            <option value="{{$key}}"><label class="text-secondary">{{$value}}</label></option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myPolarArea" height="320"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"
    type="module"
    integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        //bar chart
        setInterval(() => Livewire.emit('barHorizonalData'), 1000)
        var chartData0 = JSON.parse(`<?php echo $barHorizontal ?>`)
        const ctxY = document.getElementById('myChartY')
        const myChartY = new Chart(ctxY, {
            type: 'bar'
            , data: {
                labels: chartData0.label
                , datasets: [{
                    axis: 'y',
                    label: 'top 10 users transactions',
                    data: chartData0.data,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        ],
                }]
            }
            , options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        Livewire.on('barHorizontalUpdate', event => {
            var chartDataY = JSON.parse(event.data)
            myChartY.data.labels = chartDataY.label;
            myChartY.data.datasets.forEach((dataset) => {
                dataset.data = chartDataY.data;
            });
            myChartY.update();
        })

        //bar chart
        setInterval(() => Livewire.emit('ubahData'), 1000)
        var chartData = JSON.parse(`<?php echo $cryptos ?>`)
        const ctx = document.getElementById('myChart')
        const myChart = new Chart(ctx, {
            type: 'bar'
            , data: {
                labels: chartData.label
                , datasets: [{
                    label: '10 youngest cryptos'
                    , data: chartData.data
                    , borderWidth: 1
                }]
            }
            , options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        Livewire.on('berhasilUpdate', event => {
            var chartData2 = JSON.parse(event.data)
            myChart.data.labels = chartData2.label;
            myChart.data.datasets.forEach((dataset) => {
                dataset.data = chartData2.data;
            });
            myChart.update();
        })

        //donuts chart
        setInterval(() => Livewire.emit('trans'), 1000)
        var chartData2 = JSON.parse(`<?php echo $transactions ?>`)
        const ctx2 = document.getElementById('myDonut')
        const myDonut = new Chart(ctx2, {
            type: 'doughnut'
            , data: {
                labels: chartData2.label, //[ 'Red','Blue','Yellow'],
                datasets: [{
                    label: 'My First Dataset'
                    , data: chartData2.data, //[300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)'
                        , 'rgb(54, 162, 235)'
                        , 'rgb(255, 205, 86)'
                    ]
                    , hoverOffset: 4
                }]
            }
        });
        Livewire.on('transUpdate', event => {
            var chartDonut = JSON.parse(event.data)
            myDonut.data.labels = chartDonut.label;
            myDonut.data.datasets.forEach((dataset) => {
                dataset.data = chartDonut.data;
            });
            myDonut.update();
        })

        //line chart
        setInterval(() => Livewire.emit('line'), 1000)
        var chartData3 = JSON.parse(`<?php echo $line ?>`)

        const ctx3 = document.getElementById('myLine')
        const myLine = new Chart(ctx3, {
            type: 'line'
            , data: {
                labels: chartData3.label
                , datasets: [{
                    label: ''
                    , data: chartData3.data
                    , fill: false
                    , borderColor: 'rgb(75, 192, 192)'
                    , tension: 0.1
                }]
            }
        });
        Livewire.on('lineUpdate', event => {
            var chartLine = JSON.parse(event.data)
            myLine.data.labels = chartLine.label;
            myLine.data.type = chartLine.type;
            myLine.data.datasets.forEach((dataset) => {
                dataset.data = chartLine.data;
            });
            myLine.update();
        })

        //radar chart
        setInterval(() => Livewire.emit('radar'), 1000)
        var chartData4 = JSON.parse(`<?php echo $radar ?>`)
        const ctx4 = document.getElementById('myPolarArea')
        const myPolarArea = new Chart(ctx4, {
            type: 'polarArea'
            , data: {
                labels: chartData4.label
                , datasets: [{
                    label: ''
                    , data: chartData4.data
                    , backgroundColor: [
                        'rgb(255, 99, 132)'
                        , 'rgb(75, 192, 192)'
                        , 'rgb(255, 205, 86)'
                        , 'rgb(201, 203, 207)'
                        , 'rgb(54, 162, 235)'
                    ]
                }]
            }
        });
        Livewire.on('radarUpdate', event => {
            var chartRadar = JSON.parse(event.data)
            myPolarArea.data.labels = chartRadar.label;
            myPolarArea.data.datasets.forEach((dataset) => {
                dataset.data = chartRadar.data;
            });
            myPolarArea.update();
        })

    </script>
    @endpush
</div>
