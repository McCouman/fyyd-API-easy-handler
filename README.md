# fyyd-API-easy-handler

include the class `include_once "classes/fyyd/readJson.php";`

test public api link:

    $fyyd = new fyyd\readJson();
    $fyyd->url = "https://api.fyyd.de/podcast/show?id=40";
    
    //podcast data
    echo $fyyd->lang();
    echo $fyyd->title();
    echo $fyyd->description();

    //podcast posters
    echo $fyyd->cover("large");
    echo $fyyd->cover("medium");
    echo $fyyd->cover("small");
    
