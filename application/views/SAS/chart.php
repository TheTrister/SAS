<script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'RPL',
                    'MM',
                    'TKJ',
                    'DG',
                    'MEKA',
                    'PH',
                    'LOG',
                    'PD',
                    'ANIM',
                ],
                datasets: [{
                    data: [
                        <?= $pieRPL->jumlah?>, 
                        <?= $pieMM->jumlah?>, 
                        <?= $pieTKJ->jumlah?>, 
                        <?= $pieDG->jumlah?>, 
                        <?= $pieMEKA->jumlah?>, 
                        <?= $piePH->jumlah?>, 
                        <?= $pieLOG->jumlah?>, 
                        <?= $piePD->jumlah?>, 
                        <?= $pieANIM->jumlah?>
                    ],
                    backgroundColor: ['#A0C3D2', '#EB455F', '#A6BB8D', '#FED049', '#D1D1D1', '#FFB9B9', '#CBEDD5', '#C58940', 'FAAB78'],
                }]
            }
            var pieOptions = {
                maintainAspectRatio: true,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = {
                labels: [
                    'RPL',
                    'MM',
                    'TKJ',
                    'DG',
                    'MEKA',
                    'PH',
                    'LOG',
                    'PD',
                    'ANIM',
                ],
                datasets: [{
                    label: 'Siswa Hadir',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        <?= $barRPL->jumlah?>, 
                        <?= $barMM->jumlah?>, 
                        <?= $barTKJ->jumlah?>, 
                        <?= $barDG->jumlah?>, 
                        <?= $barMEKA->jumlah?>, 
                        <?= $barPH->jumlah?>, 
                        <?= $barLOG->jumlah?>, 
                        <?= $barPD->jumlah?>, 
                        <?= $barANIM->jumlah?>
                    ]
                }, ]
            }
            // var temp0 = areaChartData.datasets[0]
            // var temp1 = areaChartData.datasets[1]
            // barChartData.datasets[0] = temp1
            // barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart1').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }],
                    yAxes: [{
                        stacked: true

                    }]
                }
            }

            new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })


        })
    </script>