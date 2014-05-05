<?php
// === START ===
require_once('bootstrap.php');
$app = __setupApp();
// === END ===

//errorLog("index.php, all parameters: " . print_r($_GET, true));
//error_log("index.php all params: ".  print_r($_GET, true));
if (!$app->configIsEmpty('maintenance') && !$app->configIsEmpty('maintenanceIp') && $app->config('maintenance') == true && $_SERVER['REMOTE_ADDR'] != $app->config('maintenanceIp')) {
    header('Location: '.$app->config('maintenancePath'));
}
else {
    if (empty($_GET['_url'])) {
        $_GET['_url'] = '';
    }
    $app->runControllerFromRawUrl($_GET['_url']);
}