<?php
/**
 * Created by PhpStorm.
 * User: McCouman
 * Date: 01.04.17
 * Time: 15:04
 */

#$jsonfile = file_get_contents('https://api.fyyd.de/podcast/show?id=85');
#$suche = json_decode($jsonfile,TRUE);

$jsonfileGlobal = file_get_contents('api.json');
$suche = json_decode($jsonfileGlobal, TRUE);

#var_dump($suche);

#-----------------------------------------------------------------------------------------------------------------------

$title = $suche['data']['title']; //'Freak Show' (length=10)
$description = $suche['data']['description'];
$orgImg = $suche['data']['imgURL'];
$imgJPG = "<img src='" . $suche['data']['layoutImageURL'] . "'/>"; // 'https://img.fyyd.de/pd/layout/85.jpg' (length=36)
$imgThumb = "<img src='" . $suche['data']['thumbImageURL'] . "'/>"; // 'https://img.fyyd.de/pd/thumbs/85.png' (length=36)
$imgMicro = "<img src='" . $suche['data']['microImageURL'] . "'/>"; // 'https://img.fyyd.de/pd/micro/85.png' (length=35)


$feedURL = $suche['data']['xmlURL']; // 'https://feeds.metaebene.me/freakshow/m4a' (length=40)
$urlWEB = $suche['data']['htmlURL']; // 'http://freakshow.fm' (length=19)
$urlLink = "<a href='" . $suche['data']['htmlURL'] . "'>" . $title . "</a>"; // 'http://freakshow.fm' (length=19)


$fyydID = "<a href='" . $suche['data']['url_fyyd'] . "'>Mehr auf Fyyd</a>";

$meta = array(
    "id" => $suche['data']['id'],
    "status" => $suche['data']['status'],
    "slug" => $suche['data']['slug'],
    "lang" => $suche['data']['language'],
    "poll" => $suche['data']['lastpoll'],
    "generator" => $suche['data']['generator'],
    "userId" => $suche['data']['user_id'],
    "last" => $suche['data']['lastpub'], // '2017-03-23 02:16:34' (length=19)
    "rank" => $suche['data']['rank']
);


$category = $suche['data']['categories']; // '62,64,52,63' (length=11)





?>

<h4><?php echo $title; ?></h4>
<p><?php echo $description; ?></p>
<?php echo $imgJPG; ?>
<?php echo $imgThumb; ?>
<?php echo $imgMicro; ?>
