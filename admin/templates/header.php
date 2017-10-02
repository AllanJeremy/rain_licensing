<?php
require_once("./helpers/page_selection.php");
global $license_css_class;
global $config_class;
global $payment_class;
global $currency_css_class;
global $api_css_class;
?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">RAIN LICENSING</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse ml-auto mr-auto center" id="navbarText">
    <ul class="navbar-nav ml-auto mr-auto text-dark">
      <li class="nav-item <?php echo $license_css_class; ?> ml-2 mr-2">
        <a class="nav-link" href="?p=licenses">LICENSES</a>
      </li>
      <li class="nav-item <?php echo $config_class; ?> ml-2 mr-2">
        <a class="nav-link" href="?p=config">CONFIG</a>
      </li>
      <li class="nav-item <?php echo $payment_class; ?> ml-2 mr-2">
        <a class="nav-link" href="?p=payments">PAYMENTS</a>
      </li>
      <li class="nav-item <?php echo $currency_css_class; ?> ml-2 mr-2">
        <a class="nav-link" href="?p=currencies">CURRENCIES</a>
      </li>
      <li class="nav-item <?php echo $api_css_class; ?> ml-2 mr-2">
        <a class="nav-link" href="?p=api">API KEYS</a>
      </li>
    </ul>
    <div class="button-group mr-4">
     <a class="btn btn-outline-info" href="?action=logout">LOGOUT</a>
    </div>
  </div>
</nav>
</header>
