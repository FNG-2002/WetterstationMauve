
<?php

function graph($conn, $table, $valuename, $graphtitle, $xsize, $ysize, $divid, $seconds){

  include_once("includes/fusioncharts.php");

  $strQuery = "SELECT ID, ".$valuename." FROM ".$table." ORDER BY ID ASC";
  $timeQuery = "SELECT * FROM Time";

  $result = $conn->query($strQuery) or exit("Error code ({$conn->errno}): {$conn->error}");
  $resultTimeQuery = $conn->query($timeQuery) or exit("Error code ({$conn->errno}): {$conn->error}");

  if ($result) {
    $arrData = array(
      "chart" => array(
          "caption" => $graphtitle,
          "paletteColors" => "#0075c2",
          "bgColor" => "#ffffff",
          "borderAlpha"=> "20",
          "canvasBorderAlpha"=> "0",
          "usePlotGradientColor"=> "0",
          "plotBorderAlpha"=> "10",
          "showXAxisLine"=> "1",
          "xAxisLineColor" => "#999999",
          "showValues" => "0",
          "divlineColor" => "#999999",
          "divLineIsDashed" => "1",
          "showAlternateHGridColor" => "0",
          "drawAnchors" => "0"
        )
    );
  }

  $arrData["data"] = array();
  
  while($row = mysqli_fetch_array($result)) {
    $rowTime = mysqli_fetch_array($resultTimeQuery);
          
    if($rowTime["Timestamp"] > strtotime("now")-($seconds)){
      array_push($arrData["data"], array(
          "label" => date('d.m -- H:i:s', $rowTime["Timestamp"]),
          "value" => $row[$valuename],
          )
      );
    }
  }

  $jsonEncodedData = json_encode($arrData);

  $columnChart = new FusionCharts("line", $graphtitle , $xsize, $ysize, $divid, "json", $jsonEncodedData);

  $columnChart->render();
}



?>