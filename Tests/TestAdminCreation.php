<?php


namespace Tests;

use TestApp\Models\Admin;
use RedBeanPHP\Facade as R;

require_once('DatabaseTestCase.php');

class TestAdminCreation extends AdminTestCase {
    public function testCreateAdmin()
    {
        $this->migrate();
        $admin = $this->app->createModel('admin', array(
            'name' => 'Admin',
            'email' => 'admin@skullyframework.com',
            'password' => 'lepass',
            'password_confirmation' => 'lepass',
            'status' => Admin::STATUS_ACTIVE
        ));
        R::store($admin);

        $bean = R::findOne('admin', 'name = ?', array('Admin'));
        $this->assertEquals($bean->name, $admin->get('name'));
    }
}
 