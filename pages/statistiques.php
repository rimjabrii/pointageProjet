<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
  if(isset($_SESSION['employe'])){
?>


<div class="container-fluid" style="margin-top: 5%;">
    <div class="">
        <p class="h2 text-center text-dark text-uppercase font-weight-bold">Statistiques des Pointages</p>
        <hr class="line-seprate">
        <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <a href="./index.php?p=employe" class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number">...</h2>
                                <span class="desc">employés</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-accounts"></i>
                                </div>
                            </div>
                        </a>
                        <a href="./index.php?p=departement" class="col-md-6 col-lg-3">

                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number">...</h2>
                                <span class="desc">départements</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-group-work"></i>
                                </div>
                            </div>
                        </a>
                        <a href="./index.php?p=pointage" class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number">...</h2>
                                <span class="desc">pointages</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-check"></i>
                                </div>
                            </div>
                        </a>
                        <a href="./index.php?p=fonction" class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">...</h2>
                                <span class="desc">fonctions</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
    </div>
</div>
<script src="script/statistique.js" type="text/javascript"></script>
<?php
}
else{
  header("Location: ../index.php");
}
 ?>