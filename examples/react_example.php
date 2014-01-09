<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ .'/../src/facebook.php';

$fb = new Facebook(array(
	'appId'  => '349148265169629',
	'secret' => '9e9df609364c4d7476e7cedca5d0d25a',
));

$fb->setAccessToken('CAAE9jGpRwt0BANt04egtRZBDZBuZAjK9ilUNGQZBoIdWiB8KlhiAjn0NTYRRFurKcmEqcSMff1IoFvkDdPS7xQiRXfHsh7AzknjAyPZAZAWLNPYLW6gn3FAZCPW3KgZBezo90BaYO5yYJnGqTlS8miFNWZBOnZBGvZBkOqTEZAXz1zeABrD3pZAelaOc5BQOyrOCqyeoZD');

$result = $fb->api('/me');

$result->then(function($data){
	$keys = array('id', 'name', 'location', 'locale');
	echo json_encode(array_intersect_key($data, array_flip($keys)), JSON_PRETTY_PRINT) . "\n";
}, function($err){
	error_log($err);
});

$fb->wait();