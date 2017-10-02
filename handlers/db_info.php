<?php
require_once("db_connect.php");

interface DbInfoInterface
{
  //Get all records from table
  static function GetAllApiKeys();
  static function GetAllConfigs();
  static function GetAllCurrencies();
  static function GetAllLicensees();
  static function GetAllPayments();

  //Get all records from table based on a property (foreign key [fk])
  static function GetApiKeysByAccessLevel($access_level);
  static function GetLicenseesBySubType($sub_type);
  static function GetLicenseesByInstSize($inst_size);
  static function GetLicenseesByActive($is_active=true);

  //Get single records from table by foreign key
  static function GetSingleApiKey($id);
  static function GetSingleConfig($id);
  static function GetSingleCurrency($id);
  static function GetSingleLicensee($key,$integrity);
  static function GetSinglePayment($id);

}
//Performs database record retrieval operations
class DbInfo implements DbInfoInterface
{
  //Constants & Static variables
  const TABLE_LICENSEES = "licensees";
  const TABLE_CONFIG = "config";
  const TABLE_ACC_INFO = "acc_info";
  const TABLE_API_KEYS = "api_keys";
  const TABLE_CURRENCIES = "currencies";
  const TABLE_PAYMENTS = "payments";


  //Get all records from table
  protected static function GetAllRecordsFromTable($table)
  {
    global $dbCon;#database connection
    $select_query = "SELECT * FROM $table";
    if($result = $dbCon->query($select_query))#run the query, returns false if it fails
    {
        if ($result->num_rows == 0){
            return false;
        }
        return $result;
    }
    else{#failed to exec query
        return null;
    }
  }


  //Get records by single property ~ usually the foreign key (fk)
  protected static function GetRecordsByProperty($table_name,$column_name,$prop_name,$prop_type="i")
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
              echo "Failed to execute query";
              return false;
          }
      }
      else{
          echo "Failed to prepare query";
          return null;
      }
  }

  //Get a single record by property ~ returns first found record
  protected static function GetSingleRecordByProperty($table_name,$column_name,$prop_name,$prop_type="i")
  {
    $records = self::GetRecordsByProperty($table_name,$column_name,$prop_name,$prop_type);

    if(isset($records) && $records->num_rows>0)
    {
      // foreach($found as $records)
      // {
      //   return $found;
      // }
      return $records->fetch_assoc();#Experimental
    }
    else {
      return $records;
    }
  }

  /*Public functions*/
  //Get all records from table
  public static function GetAllApiKeys()
  {
    return self::GetAllRecordsFromTable(self::TABLE_API_KEYS);
  }
  public static function GetAllConfigs()
  {
    return self::GetAllRecordsFromTable(self::TABLE_CONFIG);
  }
  public static function GetAllCurrencies()
  {
    return self::GetAllRecordsFromTable(self::TABLE_CURRENCIES);
  }
  public static function GetAllLicensees()
  {
    return self::GetAllRecordsFromTable(self::TABLE_LICENSEES);
  }
  public static function GetAllPayments()
  {
    return self::GetAllRecordsFromTable(self::TABLE_PAYMENTS);
  }

  //Get multiple records from table based on a property (foreign key [fk])
  public static function GetApiKeysByAccessLevel($access_level)
  {
    //return self::GetRecordsByProperty($table_name,$column_name,$prop_name,$prop_type="i")
  }

  #Get Licensees by subscription type
  public static function GetLicenseesBySubType($sub_type)
  {

  }

  #Get licensees by institution size
  public static function GetLicenseesByInstSize($inst_size)
  {

  }

  #Get licensees by active state
  public static function GetLicenseesByActive($is_active=true)
  {

  }

  public static function GetPaymentsByLicensee($id)
  {

  }

  //Get single records from table by foreign key
  public static function GetSingleApiKey($id)
  {
    return self::GetSingleRecordByProperty(self::TABLE_API_KEYS,"Id",$id);
  }
  public static function GetSingleConfig($id)
  {
    return self::GetSingleRecordByProperty(self::TABLE_CONFIG,"Id",$id);
  }
  public static function GetSingleCurrency($id)
  {
    return self::GetSingleRecordByProperty(self::TABLE_CURRENCIES,"Id",$id);
  }

  public static function GetSinglePayment($id)
  {
    return self::GetSingleRecordByProperty(self::TABLE_PAYMENTS,"Id",$id);
  }

  public static function GetSingleLicensee($key,$integrity)
  {
    global $dbCon;

    $select_query = "SELECT * FROM ".self::TABLE_LICENSEES." WHERE Id=? AND Integrity=?";
    if ($select_stmt = $dbCon->prepare($select_query))
    {
        $select_stmt->bind_param("is",$key,$integrity);
        if($select_stmt->execute()){
            $result = $select_stmt->get_result();
            if($result->num_rows>0){
              return $result->fetch_assoc();
            }
            else
            {
              return false;
            }
        }
        else{
            echo "Failed to execute query";
            return false;
        }
    }
    else{
        echo "Failed to prepare query";
        return null;
    }
  }
}
