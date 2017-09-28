<?php

//This class handles displaying of message boxes
class MessageBox
{
  //Displays a basic message
  private static function DisplayBasicMessage($type,$title,$message,$bg_class="",$extra_classes="")
  {
?>
<div class="card text-white <?php echo $bg_class.' '.$extra_classes ; ?> mb-3">
  <div class="card-header"><?php echo ucwords($type); ?></div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $title; ?></h4>
    <p class="card-text"><?php echo $message;?></p>
  </div>
</div>
<?php
  }

  //Context message boxes
  public static function DisplaySuccess($title,$message,$extra_classes="")
  {
    self::DisplayBasicMessage("SUCCESS", $title,$message,"bg-success",$extra_classes);
  }
  public static function DisplayInfo($title,$message,$extra_classes="")
  {
    self::DisplayBasicMessage("INFORMATION",$title,$message,"bg-info",$extra_classes);
  }
  public static function DisplayError($title,$message,$extra_classes="")
  {
    self::DisplayBasicMessage("ERROR",$title,$message,"bg-danger",$extra_classes);
  }

}
?>
