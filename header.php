<?php 

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<div style="float: right; background-color:#fb4400; height: 170% ; width:4%" data-scroll> </div>

<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="height: 10ch;">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwzB-PnY6KPKMhQxP9mBPsWxX29ESb72pGgQ&usqp=CAU" class="rounded float-right mg-fluid" style="width: 5%;">
    <div class="container-fluid">
        <ul class="navbar-nav mr-auto" style="font-size: 2.5ch">
            <li class="nav-item active">
                <a class="nav-item nav-link" href="index.php">Übersicht</a>
            </li>
            <?php  if(($_SESSION['rolle'] == "lehrer") || ($_SESSION['rolle'] == "admin")){ ?>
            <li class="nav-item active">
                <a class="nav-item nav-link" href="create.php">Erstellen</a>
            </li>
            <?php } ?>
            <?php  if($_SESSION['rolle'] == "admin"){ ?>
            <li class="nav-item active">
                <a class="nav-item nav-link" href="admin.php?Tabelle=Schüler">Verwaltung</a>
            </li>
            <?php } ?>
            <li class="nav-item active">
                <a class="nav-item nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
