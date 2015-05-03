<?php
	class Queue {
		public $websiteUrl;
		public $urls = [];
		
		public function __construct($websiteUrl) {
			$this->setWebsiteUrl($websiteUrl);
		}
		
		
		// Queuing
		
		public function startQueuing() {
			// Add the homepage to the queue
			$this->addToQueue($this->getWebsiteUrl());

			// Retrieve the page's HTML
			$html = file_get_html($this->getWebsiteUrl());
			
			// Parse it for links
			foreach($html->find('a') as $element) {
				
				// Get the href for each link and prepare it to match the same pattern as other URLs
				$href = Helper::prepareUrl($element->href);
				
				// Check if the URL matches the pattern of the URL to archive.
				if ($this->doesUrlMatchPattern($href)) {
					
					// If so, add it to the queue
					$this->addToQueue($href);
				}
				
			}
		}
		
		private function addToQueue($value) {
			// Check if the URL is already in the quere and add it if it isn't. This avoids duplicate pages.
			if (!in_array($value, $this->getUrls())) {
				$this->urls[] = $value;
			}
		}
		
		private function doesUrlMatchPattern($url) {
			// Strip the protocols from both URLs
			$url = Helper::stripProtocol($url);
			$websiteUrl = Helper::stripProtocol($this->getWebsiteUrl());
			
			// Check if the URL of the link contains the given URL to archive.
			// TODO: Also needs to check for relative links
			if (stristr($url, $websiteUrl)) {
				return true;
			}
			
			return false;
		}
		
		
		// Getters and setters
		
		public function setWebsiteUrl($value) {
			$this->websiteUrl = $value;
		}
		
		public function getWebsiteUrl() {
			return $this->websiteUrl;
		}
		
		public function getUrls() {
			return $this->urls;
		}
	}	
?>