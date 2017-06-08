<?php

    if($_SERVER['REQUEST_METHOD'] != "POST"){
        exit;
    }
    require_once("class.blogdatabase.php");

    $headline = $_POST["article_headline"];
    $image    = $_FILES["article_image"];
    $article  = $_POST["article"];
    $type     = $_POST["article_type"];
    $db       = new BlogDataBase();

    $img_type = substr($image["type"],6 ,strlen($image["type"]));

  //  move_uploaded_file($image["tmp_name"],"../Blog/img/articles/".$headline.".".$img_type);
move_uploaded_file($image["tmp_name"],"C:\\Users\\ForteX0\\Desktop\\blog.bennydorlisme.com\\img\\articles\\".$headline.".".$img_type);
    $params = array("name" => $headline, "author"=>"Benny Dorlisme", "type" => $type, "article" =>$article,"image"=>"img/articles/".$headline.".".$img_type);
    $db->insertQuery("insert into articles (name ,author,type,article,image,created) values(?,?, ?,?,?,now())",$params);
//$db->insertQuery("insert into blog (name ,author,type,article,image,created) values(?,?, ?,?,?,now())",$params);
    $db->close();

    header("Location:zero.php");
    exit;


?>