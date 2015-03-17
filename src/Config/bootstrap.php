<?php

// Load server specific configuration data.  Should
// check an environment variable load the appropriate
// server configuration file.
require 'config.php';

// Load all namespaces based on directory structure
// in the src/ directory.
require 'Autoloader.php';

$loader = new \Autoloader($config['app']['classes']);
$loader->register();
