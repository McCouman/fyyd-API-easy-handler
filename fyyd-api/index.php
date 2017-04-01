<?php
include_once "classes/cover/saveCover.php";
include_once "classes/fyyd/readJson.php";


#$newCover = new Covers\coverSave();
#$newCover->render();


$fyyd = new fyyd\readJson();


//vars schreiben
#$fyyd->url = "api.json";
$fyyd->url = "https://api.fyyd.de/podcast/show?id=40";


echo $fyyd->lang();
echo $fyyd->title();
echo $fyyd->description();


echo $fyyd->cover("large");
echo $fyyd->cover("medium");
echo $fyyd->cover("small");

?>