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
    echo $fyyd->cover("large", "html");
    echo $fyyd->cover("medium", "html");
    echo $fyyd->cover("small", "html");
    
    echo $fyyd->cover("large", "link");
    echo $fyyd->cover("medium", "link");
    echo $fyyd->cover("small", "link");
    
    echo $fyyd->publication("html") //html
    echo $fyyd->publication() //curent date
    
