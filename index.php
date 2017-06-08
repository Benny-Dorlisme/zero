<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "HEAD")
        exit;

    require_once("class.basepage.php");
require_once("CustomSessionHandler.php");
class HomePage extends BasePage {

    private $body = null;
    public function __construct(){
        $this->m = array();
        $this->s = array();
        $this->l = array();

        $this->setBody();
        parent::__construct($this->s,$this->m,$this->l ,  $this->body);
        $this->printPage();
    }
    private function setBody(){


        $this->body = "<div class='container-fluid'>
                    <header>
                        <hgroup class='row'>
                            <h2 class='col-xs-12'>
                                Welcome To
                            </h2>
                            <h1 class='col-xs-12'>
                                0
                            </h1>
                        </hgroup>
                        <form class='row' action='login.php' method='post'>
                            <fieldset>
                            <label for='username'>
                                Username
                            </label>
                                <input type='text' name='username'/>
                                <label for='password'>
                                Password
                            </label>
                                <input type='password' name='password'/>
                                <label>
                                
                                </label>
                                <input type='submit' value='Log In'/>
                            </fieldset>
                        </form>
                     </header>
                     </div>";
    }
}
session_name("zero");
session_start();
    if($_SESSION["loggedin"] == true) {
        header("Location:zero.php");
        exit;
}else{

        $page = new HomePage();
}
?>