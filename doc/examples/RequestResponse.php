<?php
	$rawUrl  = 'http://ems.dev/p/events';
	$getUrl  = 'http://ems.dev/p/events?count=15';
	$postUrl = 'http://ems.dev/p/events';
	$putUrl  = 'http://ems.dev/p/events/FL-0qBNcTAaiRUhfdX6.B0Sz-1s2Vg';
	
	$ch = curl_init($getUrl);
	// Tell curl to make an HTTP GET request.
	$response = curl_exec($ch);
	curl_close($ch);
	
//	$response = http_post_data($getUrl);

	$r = new HttpRequest($rawUrl, HttpRequest::METH_GET);
	
	$r->addQueryData(['count' => 15]);
	
	echo $r->getResponseCode().PHP_EOL;
	
	echo $r->getResponseBody().PHP_EOL;
	
	
	
	
	
	