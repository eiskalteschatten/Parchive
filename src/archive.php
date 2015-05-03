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