<?php
	// Parchive options can be defined here.
	
	
	// Define how many pages deep Parchive should parse the website at the given URL.
	define(ARCHIVE_DEPTH, '1');
	
	
	// Automatically add a warning banner to the top of each HTML page that says that the page has been archived.
	// You can modify it in the "warning-banner.html" file.
	define(ADD_WARNING_BANNER, 'false');
	
	
	// Not only create usable copies of the webpages, but also create images so that years from now, the webpages can still be viewed as they were now.
	define(CREATE_IMAGES, 'true');
?>