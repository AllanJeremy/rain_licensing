<?php
require_once("db_connect.php");

class DbInfo
{
  protected static function GetRecordsBySingleProperty($table_name,$column_name,$prop_name,$prop_type="i",$prepare_error="Error preparing  info query. <br>Technical information :")#prop type is string used for bind_params
  {
      global $dbCon;

      $select_query = "SELECT * FROM $table_name WHERE $column_name=?";
      if ($select_stmt = $dbCon->prepare($select_query))
      {
          $select_stmt->bind_param($prop_type,$prop_name);
          if($select_stmt->execute()){
              $result = $select_stmt->get_result();
              if($result->num_rows>0){
                return $result;
              }
              else{
                return false;
              }
          }
          else{
              return false;
          }
      }
      else{
          echo "Failed to prepare query";
          return null;
      }
  }

  protected static function GetSingleRecord()
  {}
}
