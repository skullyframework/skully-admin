<?php
date_default_timezone_set('Asia/Jakarta');

use TestApp\Config\Config;

function setUniqueConfig(Config &$config, $serverName = null) {
    if(empty($serverName)) $serverName = $_SERVER["SERVER_NAME"];

    if ($serverName == 'localhost') {
        /**
         * LOCALHOST
         */
        $config_r=array(
            'serverName' => $serverName,
            'dbConfig' => array(
                'type' => 'mysql',
                'host'	    => '127.0.0.1',
                'user'	    => 'root',
                'password'	=> 'oisadj',
                'port'		=> '3306',
                'dbname'	=> 'skully_admin'
            ),
        );
    }
    elseif ($serverName == 'test') {
        /**
         * TEST
         */
        $config_r=array(
            'serverName' => $serverName,
            'dbConfig' => array(
                'type' => 'mysql',
                'host'	    => '127.0.0.1',
                'user'	    => 'root',
                'password'	=> 'oisadj',
                'port'		=> '3306',
                'dbname'	=> 'skully_admin_test'
            ),
        );
    }
    else {
        /**
         * ONLINE
         */
        $config_r=array(
            'serverName' => $serverName,
            'dbConfig' => array(
                'type' => 'mysql',
                'host'	    => 'localhost',
                'user'	    => 'db',
                'password'	=> '',
                'port'		=> '3306',
                'dbname'	=> 'skully_admin_online'
            )
        );
    }
    $config->setProtectedFromArray($config_r);

    if ($serverName == 'localhost') {
        $clientAndServerConfig = array(
        );
    }
    elseif ($serverName == 'test') {
        $clientAndServerConfig = array(
        );
    }
    else {
        $clientAndServerConfig = array(
        );
    }
    $config->setProtectedFromArray($clientAndServerConfig);
    $config->setPublicFromArray($clientAndServerConfig);
}