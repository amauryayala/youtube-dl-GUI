<?php
class youtubedownload{
		private $_url = null,$_name = null,$_downloadDir = "youtube",$_errors = array();
		public function __construct(){
		}
		public function download($url){
			if($url){
				chdir($this->_downloadDir);
				if( ($fp = popen("youtube-dl  $url", "r")) ) {
					echo "<pre>";
					while( !feof($fp) ){
						echo fread($fp, 1024);
						ob_flush();
						flush(); // you have to flush buffer
					}
					echo "</pre>";
				fclose($fp);
				}
			}else{
				$this->addError("I need an url!");
			}
		}
		public function downloadmp3($url){
			if($url){
				chdir($this->_downloadDir);
				if( ($fp = popen("youtube-dl --extract-audio --audio-format=mp3 '$url'", "r")) ) {
					echo "<pre>";
					while( !feof($fp) ){
						echo fread($fp, 1024);
						ob_flush();
						flush(); // you have to flush buffer
					}
					echo "</pre>";
				fclose($fp);
				}
			}
		}
		private function addError($error){
			$this->_errors[] = $error;
		}
		public function errors(){
			return $this->_errors;
		}
	}
	?>
