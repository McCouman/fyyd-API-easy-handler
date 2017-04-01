<?php
include_once "../classes/fyyd/readJson.php";


$fyyd = new fyyd\readJson();
#$fyyd->url = "db/api.json";
$fyyd->url = "https://api.fyyd.de/podcast/show?id=40";


echo $fyyd->lang();
echo $fyyd->title();
echo $fyyd->description();


echo $fyyd->cover("large");
echo $fyyd->cover("medium");
echo $fyyd->cover("small");

?>