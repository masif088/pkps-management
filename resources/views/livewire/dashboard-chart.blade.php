<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Keuangan</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="158"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            var statistics_chart = document.getElementById("myChart").getContext('2d');

            var myChart = new Chart(statistics_chart, {
                type: 'line',
                data: {
                    labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    datasets: [{
                        label: 'Statistics',
                        data: [640000, 387000, 530000, 123000, 120000, 100111, 100000],
                        borderWidth: 5,
                        borderColor: '#ff00ff',
                        backgroundColor: 'transparent',
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#6ff7ff',
                        pointRadius: 4
                    },
                        {
                            label: 'Coba',
                            data: [540000, 487000, 230000, 223000, 210000, 200111, 200000],
                            borderWidth: 5,
                            borderColor: '#6f7fff',
                            backgroundColor: 'transparent',
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#6777ef',
                            pointRadius: 4
                        },
                        {
                            label: 'abad',
                            data: [440000, 387000, 230000, 123000, 420000, 400111, 400000],
                            borderWidth: 5,
                            borderColor: '#6777ef',
                            backgroundColor: 'transparent',
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#6777ef',
                            pointRadius: 4
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                stepSize: 100000
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                color: '#fbfbfb',
                                lineWidth: 2
                            }
                        }]
                    },
                }
            });
        });
    </script>

</div>
