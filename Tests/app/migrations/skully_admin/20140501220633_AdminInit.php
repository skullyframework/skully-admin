<?php

use TestApp\Models\Admin;
use RedBeanPHP\Facade as R;

class AdminInit extends Ruckusing_Migration_Base
{
    public function up()
    {
        $app = __setupApp();
        $admin = $app->createModel('admin', array(
            'name' => 'Admin',
            'email' => 'admin@skullyframework.com',
            'password' => 'lepass',
            'password_confirmation' => 'lepass',
            'status' => Admin::STATUS_ACTIVE
        ));
        R::store($admin);
    }//up()

    public function down()
    {
    }//down()
}
