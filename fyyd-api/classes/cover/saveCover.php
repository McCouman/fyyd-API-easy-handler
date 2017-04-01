<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 01.04.17
 * Time: 15:00
 */

namespace covers;


use fyyd\readJson;

class saveCover
{
    public $url;

    function render()
    {
        $fyydData = new readJson();
        $fyydData->url = $this->url;

        $slug = $fyydData->fyyd_slug();

        $oriImg = $fyydData->cover("original", "link");
        $largeImg = $fyydData->cover("large", "link");
        $mediumImg = $fyydData->cover("medium", "link");
        $smallImg = $fyydData->cover("small", "link");

        $this->saveImage($slug, $oriImg, "-original.jpg");
        $this->saveImage($slug, $largeImg, "-large.png");
        $this->saveImage($slug, $mediumImg, "-medium.png");
        $this->saveImage($slug, $smallImg, "-small.png");

        return 'db/page/'.$slug.'/'.$slug;
    }

    function saveImage($slug, $imgUrl, $fistel)
    {
        $contents = file_get_contents($imgUrl);
        setlocale(LC_TIME, 'de_DE');

        //create folder
        mkdir('db/page/' . $slug . '/', 0700);

        //write
        $savefile = fopen("db/page/" . $slug . "/" . $slug . $fistel, "w");
        fwrite($savefile, $contents);
        fclose($savefile);
    }

}