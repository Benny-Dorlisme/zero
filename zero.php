<?php
if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "HEAD")
    exit;

require_once("class.basepage.php");
require_once("CustomSessionHandler.php");
class Zero extends BasePage {

    private $body = null;
    public function __construct(){
        $this->m = array();
        $this->s = array("<script type='text/javascript' src='js/zero.js'></script>");
        $this->l = array();

        $this->setBody();
        parent::__construct($this->s,$this->m,$this->l ,  $this->body);
        $this->printPage();
    }
    private function setBody(){
        $this->body = "<div class='container-fluid'>
                    <form id='logout' action='logout.php' method='post' style='margin-bottom: 5%; color:red;'>
                    <input type='submit' id='logout_button' value='Log out' />
                    
                    </form>
                    
                        <form id='article_form' class='row' action='createarticle.php' method='post' enctype='multipart/form-data' style='width: 50%; margin:0px auto;'>
                            <fieldset>
                             <label for='article_image'>
                               Article Image
                            </label> <input id='article_image' type='file' name='article_image' style='display:inline-block;' required/>
                                <label for='article_type'>
                               Type
                            </label>
                            <select name='article_type' form='article_form' style='display:inline-block;'>
                                <option  value='politics' >
                                Politics
                                </option>
                                <option  value='tech'>
                                Tech
                                </option>
                                <option  value='music'>
                                Music
                                </option>
                                <option  value='life'>
                                Life
                                </option>
                            </select>
                               
                            <label for='article_headline' style='display:block;'>
                               Headline
                            </label>
                                <input id='article_headline' type='text' name='article_headline' required/>
                             <div >
                                <label for='article' style='display: block'>
                                Article
                            </label>
                                <textarea required id='article' name='article' style='resize: none;' rows='20' cols='105'></textarea>
                              <div id='article_modifier' style='display: inline-block'>
                                <button class='modifier_button' id='bold_button'>B</button>
                                 <button class='modifier_button' id='underline_button'>U</button>
                                  <button class='modifier_button' id='italic_button'>I</button>
                                  <button class='modifier_button' id='linebreak_button'>&para;</button>
                              </div>
                              </div>
                              <input type='submit' style='color:green;' />
                              
                            </fieldset>
                            
                        </form>
                   
                     </div>";
    }
}
session_name("zero");
session_start();
if($_SESSION["loggedin"] == true) {
    $page = new Zero();
}else{
    header("Location:index.php");
    exit;
}

?>