<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 01.04.17
 * Time: 19:20
 */

namespace fyyd;


class saveJson
{
    public $url;

    function render()
    {
        $fyydData = new readJson();
        $fyydData->url = $this->url;

        $slug = $fyydData->fyyd_slug();


        //create folder
        mkdir('db/page/' . $slug . '/', 0700);

        //write json fie
        $content = file_get_contents($this->url);
        $savefile = fopen("db/page/" . $slug . "/fyyd-api.json", "w");
        fwrite($savefile, $content);
        fclose($savefile);
    }

}