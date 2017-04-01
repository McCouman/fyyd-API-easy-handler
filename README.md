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
    echo $fyyd->cover(); //original poster size from podcast
    echo $fyyd->cover("html"); //original poster size from podcast as html output
    
    # html cover
    echo $fyyd->cover("large", "html"); //<img src="..." />
    echo $fyyd->cover("medium", "html");
    echo $fyyd->cover("small", "html");
    
    # link to fyyd img domain
    echo $fyyd->cover("large", "link"); //https://img.fyyd.de/....
    echo $fyyd->cover("medium", "link");
    echo $fyyd->cover("small", "link");
    
    echo $fyyd->publication("html") //html <p>Vom: 23.03.2017 um 02:16 Uhr</p>
    echo $fyyd->publication() //curent date 2017-03-23 02:16:34
