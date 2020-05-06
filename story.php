<?php 

  session_start();
    
    if (!isset($_SESSION["login"])) {
      header("location: log.php");
      exit;
    }

  require 'function.php';

  $result_masuk = query("SELECT SUM(uang) FROM `data_karyawan` ");
  $result_keluar = query("SELECT SUM(uang_keluar) FROM `reason` ");
  $result_story = query("SELECT * FROM `reason`");


  if (isset($_POST["cari"])){

    $result_story = cari_story($_POST["keyword"]);
  }


 ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Data Kas</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">HOME</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="biodata.php">BIO DATA</a>
            </li>
            <li class="active">
              <a href="datakas.php">DATA KAS<span class="sr-only">(current)</span></a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">option <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logadmin.php">Admin</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php">logout</a></li>
              </ul>
            </li>
          </ul>

          <form class="navbar-form navbar-right" action="" method="post">
            <div class="form-group">
              <input name="keyword" autocomplete="off" autofocus="" type="text" class="form-control" placeholder="Search">
            </div>
              <button name="cari" type="submit" class="btn btn-default">Cari</button>
          </form>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

<br>
<br>
<br>
<br>
<br>


<section>
  <div class="container-fluid">  
    <div class="row">

      <!-- alert total uang masuk -->
      <div class="col-sm-6 col-sm-offset-3">
        <div class="alert alert-info" role="alert">
          <?php 
            foreach ($result_masuk as $baris)
           : ?>
         <?php 
            $uang_masuk= number_format($baris["SUM(uang)"], 0, ",", ",");
          ?>

            <h1 class="text-center">Total uang masuk</h1>
            <h1 class="text-center">
              <?php 
               echo "Rp.". $uang_masuk;
              ?>
            </h1>          
          <?php endforeach; ?>
        </div>
      </div>

      <!-- alert uang keluar -->
      <div class="col-sm-6 col-sm-offset-3">
        <div class="alert alert-danger" role="alert">
          <?php 
            foreach ($result_keluar as $baris)
           : ?>

         <?php 
            $uang_keluar = number_format($baris["SUM(uang_keluar)"], 0, ",", ","); 
          ?>

            <h1 class="text-center">Total uang keluar</h1>
            <h1 class="text-center">
              <?php 
               echo "Rp.". $uang_keluar; 
              ?>
            </h1>          
          <?php endforeach; ?>
        </div>
      </div>
    </section>


<br>
<br>

    <section>
      <div class="container-fluid">  
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <h1 class="text-center">Riwayat pengeluaran</h1>
            <table class="table table-bordered" width="50%" >
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tgl</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Uang keluar</th>
                <th class="text-center">Alasan</th>
                <th class="text-center">Photo</th>
              </tr>

           <?php $id = 1; ?>
            <?php 
              foreach ($result_story as $baris)
             : ?>

                <tr>
                  <td class="text-center"><?php echo $id;?></td>
                  <td class="text-center"><?php echo $baris["tgl"]; ?></td>
                  <td class="text-center"><?php echo $baris["nama"]; ?></td>
                  <td class="text-center"><?php echo number_format($baris["uang_keluar"]) ?></td>
                  <td class="text-center"><?php echo $baris["alasan"]; ?></td>
                  <td class="text-center"><img src="gambar/<?php echo $baris["gambar"]; ?>"  alt="Trulli" width="100" class="btn btn-default"></td>
                </tr>

              <?php $id =$id+1; ?>      
            <?php endforeach; ?>

          </table>
          </div>
        </div>
      </div>
    </section>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>