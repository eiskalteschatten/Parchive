<?php
	require_once(INDEX_DIR . '/src/queue.php');
	
	class Archive {
		public $websiteUrl;
		public $saveLocation;
		public $queue;
		
		public function __construct($argv) {
			$this->setWebsiteUrl(Helper::prepareUrl($argv[1]));
			$this->setSaveLocation($argv[2]);
			
			$this->queue = new Queue($this->getWebsiteUrl());
		}
		
		
		// Archiving
		
		public function startArchivalProcess() {
			$this->queue->startQueuing();
			$this->saveHtmlFiles();
			
		}
		
		private function saveHtmlFiles() {
			foreach($this->queue->getUrls() as $url) {
				$urlInfo = parse_url($url);
				$fileName = $urlInfo['path'];
				
				if ($fileName) {
					// If the file name isn't .html, then either make it index.html if it's just a URL without a file at the end or make it .html if it's .php, .asp, etc.
					// The links within the HTML file itself will also have to be adjusted!
				}
				
//				$html = file_get_html($url);
				
//				file_put_contents($this->getSaveLocation(), $html);
			}
		}
		
		
		// Getters and setters
		
		public function setWebsiteUrl($value) {
			$this->websiteUrl = $value;
		}
		
		public function getWebsiteUrl() {
			return $this->websiteUrl;
		}
		
		public function setSaveLocation($value) {
			$this->saveLocation = $value;
		}
		
		public function getSaveLocation() {
			return $this->saveLocation;
		}
	}	
?>