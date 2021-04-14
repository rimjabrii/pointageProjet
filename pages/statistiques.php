<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['employe'])) {
    ?>


    <div class="container-fluid" style="margin-top: 5%;">
        <div class="">
            <p class="h2 text-center text-dark text-uppercase font-weight-bold
               "style="
               font-size: 100px;
    background: linear-gradient(to right, #36ecde, #000);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	
	text-shadow: 2px 4px 3px rgba(0,0,0,0.3);

               ">Graphes :</p>
            <hr class="line-seprate">
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <a href="./index.php?p=classes" class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number">...</h2>
                                <span class="desc">Classes</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-accounts"></i>
                                </div>
                            </div>
                        </a>


                        <a href="./index.php?p=filiere" class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">...</h2>
                                <span class="desc">filieres</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                            </div>
                        </a>

                    </div>
                     <b><label style="font-size: 25px; color: #008080; font-family:Stencil Std, fantasy;" >Graphe numéro 1 :</label></b>
                    <div class="row">
                        <canvas id="myChart" width="200" height="100"></canvas>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js" type="text/javascript"></script>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');

                            $.ajax({
                                
                                url: 'http://localhost/gestionpointage2/controller/gestionclasses.php',
                                data: {op: 'countFonction'},
                                type: 'POST',
                                success: function (data, textStatus, jqXHR) {
                                    var x = Array();
                                    var y = Array();
                                    data.forEach(function (e) {
                                        x.push(e.nomf);
                                        y.push(e.nbr);
                                    });
                                  //alert(JSON.stringify(data));
                                    showGraph(x, y);
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                   
                                }
                            });
                            function showGraph(x, y) {
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: x,
                                        datasets: [{

                                                data: y,
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                position: 'right',
                                                labels: {
                                                    generateLabels: function (chart) {
                                                        return chart.data.labels.map(function (label, i) {
                                                            return {
                                                                text: label,
                                                                fillStyle: chart.data.datasets[0].backgroundColor
                                                            };
                                                        });
                                                    }
                                                }
                                            },
                                            title: {
                                                display: true,
                                                text: 'Nombres de classes par filières (graphe1):'
                                            }
                                        },
                                        scales: {
                                            y: {
                                                title: {
                                                    display: true,
                                                    text: 'Nombres de classes '}
                                            },
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Filières '}
                                            }
                                        }
                                    }
                                });
                            }
                        </script>
                    </div>
                    <b><label style="font-size: 25px; color: #008080; font-family:Stencil Std, fantasy;" >Graphe numéro 2 :</label></b>
                    <div class="row">
                        <canvas id="myChart1" width="200" height="100"></canvas>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js" type="text/javascript"></script>
                        <script>
                            var ctx1 = document.getElementById('myChart1').getContext('2d');
                            var myChart = new Chart(ctx1, {
                                type: 'line',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                            label: '# of Votes',
                                            data: [12, 19, 3, 5, 2, 3],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                },
                               options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                position: 'right',
                                                labels: {
                                                    generateLabels: function (chart) {
                                                        return chart.data.labels.map(function (label, i) {
                                                            return {
                                                                text: label,
                                                                fillStyle: chart.data.datasets[0].backgroundColor
                                                            };
                                                        });
                                                    }
                                                }
                                            },
                                            title: {
                                                display: true,
                                                text: 'Nombres de classes par filières (graphe2):'
                                            }
                                        },
                                        scales: {
                                            y: {
                                                title: {
                                                    display: true,
                                                    text: 'Nombres de classes '}
                                            },
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Filières '}
                                            }
                                        }
                                    }
                            });
                        </script>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="script/statistique.js" type="text/javascript"></script>
    <?php
} else {
    header("Location: ../index.php");
}
?>