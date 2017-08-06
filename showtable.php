<?php

$text = explode("\r\n", $_POST['text']);
$title = $_POST['title'];

$output = "<html>\n  <head><title>$title</title></head>\n";
$output .= "  <body bgcolor=\"#FFCAB0\">\n";
$output .= "    <h3>$title</h3>\n    <table border=\"1\">\n";

$previous = "";

foreach ( $text as $tn => $t ) {
  $tp = chop($t);
  if ($tp == "") $tp = "&nbsp;";
  if ($t == "") {
    if ($previous == "") {
      $previous = "-";
      continue;
    }
    if ($previous == "-") {
      $output .= "    </table>\n    <table border=\"1\">\n      <tr>";
      $previous = "+";
      continue;
    }
    if ($previous == "+") {
      continue;
    }
  
    $output .= "</tr>\n";
    $previous = "";
    continue;
  }
  if ($previous == "" || $previous == "-") $output .= "      <tr>";
  $output .= "<td>$tp</td>";

  $previous = $t;
}

$output .= "</tr>\n    </table>\n  </body>\n</html>";

echo $output;

?>
