<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 01.04.17
 * Time: 15:22
 */

namespace fyyd;


class readJson
{
    public $url;

    /**
     * Read Json
     * @return mixed
     */
    function fyydJson()
    {
        $jsonfileGlobal = file_get_contents($this->url);
        $json_decode = json_decode($jsonfileGlobal, TRUE);
        return $json_decode;
    }

    /**
     * Set Data
     * @return mixed
     */
    function set()
    {
        $jsonOut = $this->fyydJson();
        $set = $jsonOut['data'];
        return $set;
    }

    /**
     * Get to metadata
     * @param $space
     * @return mixed
     */
    function get($space)
    {
        $set = $this->set();
        $get = $set[$space];
        return $get;
    }

    // ------------------------ podcast data -------------------------

    /**
     * Podcast: sprache
     *
     * @return mixed
     */
    function lang()
    {
        return $this->get("language");
    }

    /**
     * Podcast: name\title
     *
     * @return mixed
     */
    function title()
    {
        return $this->get("title"); //'Freak Show' (length=10)
    }

    /**
     * Podcast: description
     *
     * @return mixed
     */
    function description()
    {
        return $this->get("description");
    }

    /**
     * Podcast: poster (as link or html tag)
     *
     * overview:
     * $this->cover(); == $fyyd->cover("original");
     * $this->cover("original", "link");
     *
     * $this->cover("large", "html");
     * $this->cover("large", "link");
     *
     * $this->cover("medium");
     * $this->cover("medium","link");
     *
     * $this->cover("small");
     * $this->cover("small","link");
     *
     * @param string $posterSize
     * @param string $return
     * @return string
     */
    function cover($posterSize = "original", $return = "html")
    {
        //img size handling
        if ($posterSize == "large") {
            $img = $this->get("layoutImageURL");
        } elseif ($posterSize == "medium") {
            $img = $this->get("thumbImageURL");
        } elseif ($posterSize == "small") {
            $img = $this->get("microImageURL");
        } else {
            $img = $this->get("imgURL");
        }

        //html handling
        if ($return == "html") {
            return '<img src="' . $img . '" />';
        } elseif ($return == "link") {
            return $img;
        } else {
            return '<img src="' . $img . '" />';
        }

    }

    /**
     * Podcast: feed url
     *
     * => https://feeds.metaebene.me/freakshow/m4a
     *
     * @return mixed
     */
    function feed()
    {
        return $this->get("xmlURL");
    }

    /**
     * Podcast: home url
     *
     * => http://freakshow.fm
     *
     * @param string $retrun
     * @return mixed
     */
    function url($retrun = "html")
    {
        if ($retrun == "html") {
            return '<a herf="' . $this->get("htmlURL") . '">' . $this->title() . '</a>';
        } elseif ($retrun == "link") {
            return $this->get("htmlURL");
        } else {
            return $this->get("htmlURL");
        }
    }

    /**
     * Podcast: generator
     *
     * @return mixed
     */
    function generator()
    {
        return $this->get("generator");
    }

    /**
     * Podcast: last publication
     *
     * $this->publication() => 2017-03-23 02:16:34
     * $this->publication("html") => Vom: 23.03.2017 um 02:16Uhr
     *
     * @return string
     */
    function publication($return)
    {
        if ($return == "html") {
            $pubReplace = preg_replace("/( )+/", ",", $this->get("lastpub"));
            $pubData = explode(",", $pubReplace);

            //date
            $setDate = $pubData[0];
            $dateData = explode("-", $setDate);
            $date = $dateData[2] . "." . $dateData[1] . "." . $dateData[0];

            //time
            $setTime = $pubData[1];
            $dateTime = substr($setTime, 0, -3);

            //output
            $newPub = '<p>Vom: ' . $date . ' um ' . $dateTime . 'Uhr</p>';
            return $newPub;

        } else {
            return $this->get("lastpub");
        }
    }

    // --------------------------- fyyd data -------------------------

    /**
     * Fyyd: status
     *
     * @return string
     */
    function fyyd_status()
    {
        return $this->get("status");
    }

    /**
     * Fyyd: id
     *
     * @return string
     */
    function fyyd_id()
    {
        return $this->get("id");
    }

    /**
     * Fyyd: slug
     *
     * @return string
     */
    function fyyd_slug()
    {
        return $this->get("slug");
    }

    /**
     * Fyyd: url
     *
     * @return string
     */
    function fyyd_url()
    {
        return $this->get("url_fyyd");
    }

    /**
     * Fyyd: category
     *
     * KATEGORIEN SND BEI FYYD NOCH IN ARBEIT! EINE CLASS WIRD EXTRA DAZU KOMMEN
     *
     * @return array
     */
    function fyyd_category()
    {
        $cat = "<ul>";

        $arr = explode(",", $this->get("categories"));
        $i = 0;
        $count = count($arr);
        while ($i < $count) {
            $cat .= '<li><a href="https://fyyd.de/...../' . $arr[$i] . '">' . $arr[$i] . '</a></li>';
            $i++;
        }
        $cat .= "</ul>";

        return $cat;
    }

    /**
     * Fyyd: last poll
     *
     * @return string
     */
    function fyyd_poll()
    {
        return $this->get("lastpoll");
    }

}