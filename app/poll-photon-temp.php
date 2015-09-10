<?php

// includes
include 'stathat.php';
include 'poll-photon.class.php';

// Stathat.com API key
$stathat_apikey = "APIKEYXXXXX";
// Stathat.com stat to store the temp in
$stathat_stat = "Test_Temp_Sensor";

// poll device
$photon = new pollPhoton("000000000", "000000000000000");
$result = $photon->getVar("temperature");

// do we have data..
if(isset($result->cmd) && $result->cmd == "VarReturn" && isset($result->result)) {
  echo "\n Temp is: ".$result->result." c\n";
  // e.g. trigger based on temp below threshold..
  //if ($result->result < 19) echo "\ngetting chilly\n";

  // upload stat to stathat.com
  stathat_ez_value($stathat_apikey, $stathat_stat, $result->result);
}

?>
