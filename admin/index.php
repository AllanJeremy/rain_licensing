<?php
  include_once("helpers/page_selection.php");
  global $active_page;
  $template_path = "./templates/";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>RAIN Licensing | <?php echo $page_title;?></title>
    <link rel="stylesheet" href="./css/main.css">
  </head>
  <body>
    <?php
      include_once("templates/header.php");
    ?>
    <div class="container">
    <?php
      include_once($template_path.$active_page);
    ?>
    </div>
    <?php
      include_once("templates/footer.php");
    ?>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>
