<?php
/**
 * Created by Trio Digital Agency.
 * Date: 2/27/15
 * Time: 4:33 PM
 */
require_once(realpath(__DIR__.'/../AdminTestCase.php'));

use \Skully\Console\Console;

class S3ConsoleTest extends \Tests\AdminTestCase {
    public function testSetup()
    {
        $app = __setupApp();
        $console = new Console($app, true);
        $gitpath = realpath(__DIR__.'/../app/.git-s3');
        unlink($gitpath);
        $output = $console->run("skully:s3 setup");
        $this->assertTrue(file_exists($gitpath));
        unlink($gitpath);
    }
    public function testCreateNewFile()
    {
        $app = __setupApp();
        $console = new Console($app, true);
        $output = $console->run("skully:s3 push");
    }

    public function testUpdateFile()
    {

    }

    public function testDeleteFile()
    {

    }

    public function testViewMustBeIgnored()
    {

    }
}
 