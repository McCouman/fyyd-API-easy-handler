<?php
/**
 * Created by PhpStorm.
 * User: McCouman
 * Date: 01.04.17
 * Time: 20:45
 */

include_once "classes/init.classes.php";

$url = 'https://api.fyyd.de/podcast/show?id=47883';

//read
$fyyd = new \fyyd\readJson();
$fyyd->url = $url;
echo $fyyd->cover("large");
echo '<hr>';

// write a json copy in db
$saveJson = new \fyyd\saveJson();
$saveJson->url = $url;
$saveJson->render();

// write alle poster size db
$saveCover = new \covers\saveCover();
$saveCover->url = $url;
$img = $saveCover->render();

echo '<img src="' . $img . '-small.png" />';
echo '<img src="' . $img . '-medium.png" />';
echo '<img src="' . $img . '-large.png" />';
echo '<img src="' . $img . '-original.jpg" />';
