<?php
/**
 * Created by Wikibyte.org.
 * User: McCouman
 * Date: 01.04.17
 * Time: 21:01
 */

include_once "classes/init.classes.php";


$slug = "podeq-magazin-news";
$url = "db/page/" . $slug . "/fyyd-api.json";


$fyyd = new \fyyd\readJson();
$fyyd->url = $url;

//podcast data
echo '<h1>' . $fyyd->title() . '</h1>';
echo '<p>' . $fyyd->description() . '</p>';

//podcast posters
echo $fyyd->cover("large", "html");

//publication date
echo $fyyd->publication("html");

//fyyd data
echo '<a target="_blank" href="'.$fyyd->fyyd_url().'">Mehr auf FYYD</a>';

//fyyd categorys
echo $fyyd->fyyd_category();
