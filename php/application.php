<?php
session_start();

define('ENVIRONMENT', 'TEST');
include_once('autoloader.php');

if (strcmp(ENVIRONMENT, 'TEST') === 0) {
    include_once('config/testConfig.php');
} elseif (strcmp(ENVIRONMENT. 'STAGING') === 0) {
    include_once('../../stagingConfig.php');
} elseif (strcmp(ENVIRONMENT. 'PRODUCTION') === 0) {
    include_once('../../prodConfig.php');
} else {
    error_log('Invalid environment selected.');
}



