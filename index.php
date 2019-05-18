
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>XML Translate - Blank Page</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">XML Translate</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->

    <!-- Navbar -->


  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>XML List</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Main Page</li>
        </ol>

        <!-- Page Content -->
        <h1>XML Translate</h1>
        <hr>
        <p><?php if($_GET['url']) echo '<h3 style="color:#FF0000";>Select Languages again and write new yandex api to continue your translation process.</h3>'; else echo 'XML Translate to Any Languages.'; ?></p>
<form action="begin.php" method="GET" autocomplete="on">
            <div class="form-group">
            <div class="form-label-group">

              <input type="url" id="url" name="url" class="form-control" placeholder="Url" required="required" autofocus="autofocus" autocomplete="on" value="<?php echo $_GET['url']; ?>">
              <label for="url">Enter Link...</label>
            </div>
          </div>

          <div class="form-group">
          <div class="form-label-group">
            <input type="Name" id="Name" name="Name" autocomplete="on" class="form-control" placeholder="Name" required="required" autofocus="autofocus" value="<?php echo $_GET['name']; ?>">
            <label for="Name">Give Name to This Link (Dont use special chars and space)</label>
          </div>
        </div>
        <div class="form-group">
        <div class="form-label-group">
          <input type="api" id="api" name="api" autocomplete="on" class="form-control" placeholder="Yandex api" autofocus="autofocus">
          <label for="api">Yandex Api (Optional)</label>
        </div>
      </div>

        <div class="form-group">
        <div class="form-label-group">
          <input type="text" id="apig" name="apig" autocomplete="on" class="form-control" placeholder="Google api" autofocus="autofocus">
          <label for="apig">Google Api (Optional)</label>
        </div>
      </div>

            <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Source Language
                  <select name="sourcelang">
                    <option value="az">Azerbaijan</option>
                    <option value="sq">Albanian</option>
                    <option value="am">Amharic</option>
                    <option value="en">English</option>
                    <option value="ar">Arabic</option>
                    <option value="hy">Armenian</option>
                    <option value="af">Afrikaans</option>
                    <option value="eu">Basque</option>
                    <option value="ba">Bashkir</option>
                    <option value="be">Belarusian</option>
                    <option value="bn">Bengali</option>
                    <option value="my">Burmese</option>
                    <option value="bg">Bulgarian</option>
                    <option value="bs">Bosnian</option>
                    <option value="cy">Welsh</option>
                    <option value="hu">Hungarian</option>
                    <option value="vi">Vietnamese</option>
                    <option value="ht">Haitian (Creole)</option>
                    <option value="gl">Galician</option>
                    <option value="nl">Dutch</option>
                    <option value="mrj">Hill Mari</option>
                    <option value="el">Greek</option>
                    <option value="ka">Georgian</option>
                    <option value="gu">Gujarati</option>
                    <option value="da">Danish</option>
                    <option value="he">Hebrew</option>
                    <option value="yi">Yiddish</option>
                    <option value="id">Indonesian</option>
                    <option value="ga">Irish</option>
                    <option value="it">Italian</option>
                    <option value="is">Icelandic</option>
                    <option value="es">Spanish</option>
                    <option value="kk">Kazakh</option>
                    <option value="kn">Kannada</option>
                    <option value="ca">Catalan</option>
                    <option value="ky">Kyrgyz</option>
                    <option value="zh">Chinese</option>
                    <option value="ko">Korean</option>
                    <option value="xh">Xhosa</option>
                    <option value="km">Khmer</option>
                    <option value="lo">Laotian</option>
                    <option value="la">Latin</option>
                    <option value="lv">Latvian</option>
                    <option value="lt">Lithuanian</option>
                    <option value="lb">Luxembourgish</option>
                    <option value="mg">Malagasy</option>
                    <option value="ms">Malay</option>
                    <option value="ml">Malayalam</option>
                    <option value="mt">Maltese</option>
                    <option value="mk">Macedonian</option>
                    <option value="mi">Maori</option>
                    <option value="mr">Marathi</option>
                    <option value="mhr">Mari</option>
                    <option value="mn">Mongolian</option>
                    <option value="de">German</option>
                    <option value="ne">Nepali</option>
                    <option value="no">Norwegian</option>
                    <option value="pa">Punjabi</option>
                    <option value="pap">Papiamento</option>
                    <option value="fa">Persian</option>
                    <option value="pl">Polish</option>
                    <option value="pt">Portuguese</option>
                    <option value="ro">Romanian</option>
                    <option value="ru">Russian</option>
                    <option value="ceb">Cebuano</option>
                    <option value="sr">Serbian</option>
                    <option value="si">Sinhala</option>
                    <option value="sk">Slovakian</option>
                    <option value="sl">Slovenian</option>
                    <option value="sw">Swahili</option>
                    <option value="su">Sundanese</option>
                    <option value="tg">Tajik</option>
                    <option value="th">Thai</option>
                    <option value="tl">Tagalog</option>
                    <option value="ta">Tamil</option>
                    <option value="tt">Tatar</option>
                    <option value="te">Telugu</option>
                    <option value="tr" selected="selected">Turkish</option>
                    <option value="udm">Udmurt</option>
                    <option value="uz">Uzbek</option>
                    <option value="uk">Ukrainian</option>
                    <option value="ur">Urdu</option>
                    <option value="fi">Finnish</option>
                    <option value="fr">French</option>
                    <option value="hi">Hindi</option>
                    <option value="hr">Croatian</option>
                    <option value="cs">Czech</option>
                    <option value="sv">Swedish</option>
                    <option value="gd">Scottish</option>
                    <option value="et">Estonian</option>
                    <option value="eo">Esperanto</option>
                    <option value="jv">Javanese</option>
                    <option value="ja">Japanese</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  Destination Language
                  <select name="tolang">
                    <option value="az">Azerbaijan</option>
                    <option value="sq">Albanian</option>
                    <option value="am">Amharic</option>
                    <option value="en">English</option>
                    <option value="ar">Arabic</option>
                    <option value="hy">Armenian</option>
                    <option value="af">Afrikaans</option>
                    <option value="eu">Basque</option>
                    <option value="ba">Bashkir</option>
                    <option value="be">Belarusian</option>
                    <option value="bn">Bengali</option>
                    <option value="my">Burmese</option>
                    <option value="bg">Bulgarian</option>
                    <option value="bs">Bosnian</option>
                    <option value="cy">Welsh</option>
                    <option value="hu">Hungarian</option>
                    <option value="vi">Vietnamese</option>
                    <option value="ht">Haitian (Creole)</option>
                    <option value="gl">Galician</option>
                    <option value="nl">Dutch</option>
                    <option value="mrj">Hill Mari</option>
                    <option value="el">Greek</option>
                    <option value="ka">Georgian</option>
                    <option value="gu">Gujarati</option>
                    <option value="da">Danish</option>
                    <option value="he">Hebrew</option>
                    <option value="yi">Yiddish</option>
                    <option value="id">Indonesian</option>
                    <option value="ga">Irish</option>
                    <option value="it">Italian</option>
                    <option value="is">Icelandic</option>
                    <option value="es">Spanish</option>
                    <option value="kk">Kazakh</option>
                    <option value="kn">Kannada</option>
                    <option value="ca">Catalan</option>
                    <option value="ky">Kyrgyz</option>
                    <option value="zh">Chinese</option>
                    <option value="ko">Korean</option>
                    <option value="xh">Xhosa</option>
                    <option value="km">Khmer</option>
                    <option value="lo">Laotian</option>
                    <option value="la">Latin</option>
                    <option value="lv">Latvian</option>
                    <option value="lt">Lithuanian</option>
                    <option value="lb">Luxembourgish</option>
                    <option value="mg">Malagasy</option>
                    <option value="ms">Malay</option>
                    <option value="ml">Malayalam</option>
                    <option value="mt">Maltese</option>
                    <option value="mk">Macedonian</option>
                    <option value="mi">Maori</option>
                    <option value="mr">Marathi</option>
                    <option value="mhr">Mari</option>
                    <option value="mn">Mongolian</option>
                    <option value="de">German</option>
                    <option value="ne">Nepali</option>
                    <option value="no">Norwegian</option>
                    <option value="pa">Punjabi</option>
                    <option value="pap">Papiamento</option>
                    <option value="fa">Persian</option>
                    <option value="pl">Polish</option>
                    <option value="pt">Portuguese</option>
                    <option value="ro">Romanian</option>
                    <option value="ru">Russian</option>
                    <option value="ceb">Cebuano</option>
                    <option value="sr">Serbian</option>
                    <option value="si">Sinhala</option>
                    <option value="sk">Slovakian</option>
                    <option value="sl">Slovenian</option>
                    <option value="sw">Swahili</option>
                    <option value="su">Sundanese</option>
                    <option value="tg">Tajik</option>
                    <option value="th">Thai</option>
                    <option value="tl">Tagalog</option>
                    <option value="ta">Tamil</option>
                    <option value="tt">Tatar</option>
                    <option value="te">Telugu</option>
                    <option value="tr">Turkish</option>
                    <option value="udm">Udmurt</option>
                    <option value="uz" selected="selected">Uzbek</option>
                    <option value="uk">Ukrainian</option>
                    <option value="ur">Urdu</option>
                    <option value="fi">Finnish</option>
                    <option value="fr">French</option>
                    <option value="hi">Hindi</option>
                    <option value="hr">Croatian</option>
                    <option value="cs">Czech</option>
                    <option value="sv">Swedish</option>
                    <option value="gd">Scottish</option>
                    <option value="et">Estonian</option>
                    <option value="eo">Esperanto</option>
                    <option value="jv">Javanese</option>
                    <option value="ja">Japanese</option>
                  </select>
                </div>
              </div>

            </div>
          </div>
          <div class="checkbox">
              <label>
                <input type="checkbox" name="html" value="html">
                Keep Html ?
              </label>
            </div>
            <input id="pass" name="pass" type="hidden" value="QBmGJH0hJhpkp2cDMqe06w5MSVQLeB2V">
          <input class="btn btn-primary btn-block" type="submit" value="Translate">
        </form>




      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © MucanWork 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
