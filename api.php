<?php
header('Content-Type: application/json');

//Helper function for printing json
function PrintJSON($content)
{
  echo json_encode($content);
}

//Constants
const REQ_LICENSEE = "licensee";
const REQ_CONFIG = "config";
const REQ_ACC_INFO = "acc_info";
const REQ_API_KEY = "api_key";
const REQ_CURRENCY = "currency";
const REQ_PAYMENT = "payment";

//GET Requests ~ request type has to have been set
if(isset($_GET["req_type"]))
{
  require_once("./handlers/db_info.php");
  $error = array("error"=>"No records found");

  switch(strtolower($_GET["req_type"]))
  {
    case REQ_LICENSEE:
      $key = &$_GET["key"];
      $integrity = &$_GET["integrity"];

      #Check for required values
      if(!isset($key,$integrity)){
        PrintJSON($error);
        break;
      }

      #Values are set
      PrintJSON(DbInfo::GetSingleLicensee($key,$integrity));

    break;
    default:
      PrintJSON($error);
  }
}
