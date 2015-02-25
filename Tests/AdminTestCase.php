<?php


namespace Tests;

require_once(dirname(__FILE__) . '/include.php');
require_once(dirname(__FILE__).'/app/bootstrap.php');
require_once(dirname(__FILE__) . '/functions.php');

use SkullyAdmin\Models\Admin;
use TestApp\Application;
use RedBeanPHP\Facade as R;
use TestApp\Config\Config;
use Skully\Console\Console;

abstract class AdminTestCase extends \PHPUnit_Framework_TestCase{
    /** @var Application */
    protected $app;

    protected $frozen = true;

    static $connection;

    protected function setUp()
    {
        $config = new Config();
        $config->setProtected('basePath', BASE_PATH);

        setCommonConfig($config);
        setUniqueConfig($config);

        $dbConfig = $config->getProtected('dbConfig');
        if (!empty($dbConfig)) {
            if ($dbConfig['type'] == 'mysql') {
                Application::setupRedBean("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};port={$dbConfig['port']}", $dbConfig['user'], $dbConfig['password'], !$this->frozen);
            }
            elseif ($dbConfig['type'] == 'sqlite') {
                Application::setupRedBean("sqlite:{$dbConfig['dbname']}", $dbConfig['user'], $dbConfig['password'], !$this->frozen);
            }
        }
        R::freeze(false);
        R::nuke();
        R::freeze($this->frozen);

        $this->app = __setupApp();

        /** $http Mock Http object. */
        $http = $this->getMock('Skully\Core\Http');
        $http->expects($this->any())
            ->method('redirect')
            ->will($this->returnCallback('stubRedirect'));
        $this->app->setHttp($http);
    }

    protected function migrate()
    {
        ob_start();
        $argv = array('console', 'skully:schema', 'db:migrate');
        $consoleApp = new Console($this->app, true);
        array_shift($argv);
        try {
            $consoleApp->run(implode(' ', $argv));
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
        ob_clean();
    }

    protected function login()
    {
        $admin = $this->app->createModel('admin', array(
            'name' => 'Admin',
            'email' => 'admin@skullyframework.com',
            'password' => 'lepass',
            'password_confirmation' => 'lepass',
            'status' => Admin::STATUS_ACTIVE
        ));
        R::store($admin);

        $params = array(
            'email' => 'admin@skullyframework.com',
            'password' => 'lepass'
        );

        // This is the code to emulate sending parameter to a page:
        $this->app->runControllerFromRawUrl('admin/loginProcess', $params);

        // This is the alternative way we can do it:
//        $controller = $this->app->getController('Admin\\Admins', 'loginProcess');
//        $controller->setParams($params);
//        $controller->runCurrentAction();

        $this->assertEquals(1, $this->app->getSession()->get('adminId'));

    }

}