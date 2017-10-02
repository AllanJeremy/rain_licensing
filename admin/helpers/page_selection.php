<?php
const ACTIVE_CLASS = "active";
$page = &$_GET["p"];
$page_title = $active_page = $currency_css_class =  $license_css_class = $config_class = $payment_class = $api_css_class= "";
$ext = "php";#File extension for the active_page files

switch(strtolower(htmlspecialchars($page)))
{
  case "home":
  case "licenses":
    $active_page = "page_licenses.$ext";
    $page_title = "licenses";
    $license_css_class = ACTIVE_CLASS;
  break;
  case "config":
    $active_page = "page_config.$ext";
    $page_title = "config";
    $config_class = ACTIVE_CLASS;
  break;
  case "payments":
    $active_page = "page_payments.$ext";
    $page_title = "payments";
    $payment_class = ACTIVE_CLASS;
  break;
  case "api":
  case "api_keys":
    $active_page = "page_api_keys.$ext";
    $page_title = "API";
    $api_css_class = ACTIVE_CLASS;
  break;
  case "currency":
  case "currencies":
    $active_page = "page_currencies.$ext";
    $page_title = "currencies";
    $currency_css_class = ACTIVE_CLASS;
  break;
  default:
    header("Location:?p=licenses");#Redirect to the license page
}

$page_title = ucwords($page_title);
