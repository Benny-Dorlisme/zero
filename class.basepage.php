<?php

	class BasePage{

		public $opening_html_tag   = "<html lang='en-US'>";
		private $closing_html_tag   = "</html>" ;
		   private $opening_header_tag = "<head>";
		   private $closing_header_tag = "</head>" ;
		private $opening_body_tag   = "<head>";
		private   $closing_body_tag   = "</head>" ;
		private   $head               = "";
		private   $body               = "";
		private   $scripts            = null;
		private   $links              = null;
		private   $meta_data          = null;
		
		private  $full_page          = null; 
		public    $name               = null;
		private $page_header      = null;
	protected $page_body_header = "";
	protected $page_body_body   = "";
	
	protected $s                = null;
	protected $l                = null;
	protected $m                = null;
		public function __construct($scripts , $links , $meta_data , $body_content){
			$this->scripts = array($scripts);
			$this->links = array($links);
			$this->meta_data = array($meta_data);
			$this->head .= ("<!DOCTYPE html> 
			" .$this->opening_html_tag);
			$this->head .= $this->opening_header_tag;
			//$this->head .= "<meta name='' content=''>";
            $this->head .= "<meta name='viewport' content='width=device-width'>";
            $this->head .= "<meta charset='utf-8'>";

			foreach($meta_data as $md){
				$this->head .= $md;
			}
            $this->head .="<script src='js/jquery-3.2.1.js'></script>";
			foreach($scripts as $s){
				$this->head .= $s;
			}
            $this->head .= "<link type='text/css' rel='stylesheet' href='css/bootstrap-theme.css'>";
            $this->head .= "<link type='text/css' rel='stylesheet' href='css/bootstrap.css'>";
			foreach($links as $l){
				$this->head .= $l;
			}
				$this->head .="<link type='text/css' rel='stylesheet' href='css/index.css'>";


			$this->head .= $this->closing_header_tag;
			$this->body .= $this->opening_body_tag;
			$this->setHeader();
			$this->body .= $body_content;
			$this->setFooter();
			$this->body .= $this->closing_body_tag;
			$this->body .= $this->closing_html_tag;
			$this->full_page = ($this->head . $this->body);
			
		}
		public function setHeader(){
			
			$this->body .= "";
		}
		public function setFooter(){

			$this->body .= "";
		}
		public function printPage(){
			
			echo($this->full_page);
		}
	}
?>