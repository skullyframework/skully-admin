<?php

use RedBeanPHP\Facade as R;

class ImageAdmin extends Ruckusing_Migration_Base
{
    public function up()
    {
        $t = $this->create_table('image', array('options' => 'Engine=InnoDB collate=utf8_unicode_ci'));
        $t->column('multiple_many_types', 'text');
        $t->column('multiple_one_type', 'text');
        $t->column('single_many_types', 'text');
        $t->column('single_one_type', 'text');
        $t->column('position', 'integer');
        $t->finish();

        $app = __setupApp();
        $setting = $app->createModel('setting', array(
            'name' => 'multiple_many_types',
            'description' => 'Sample Multiple Many Types Setting Image',
            'type' => 'string',
            'is_visible' => false,
            'is_client' => false
        ));
        R::store($setting);

        $app = __setupApp();
        $setting = $app->createModel('setting', array(
            'name' => 'multiple_one_type',
            'description' => 'Sample Multiple One Type Setting Image',
            'type' => 'string',
            'is_visible' => false,
            'is_client' => false
        ));
        R::store($setting);

        $app = __setupApp();
        $setting = $app->createModel('setting', array(
            'name' => 'single_many_types',
            'description' => 'Sample Single Many Types Setting Image',
            'type' => 'string',
            'is_visible' => false,
            'is_client' => false
        ));
        R::store($setting);

        $app = __setupApp();
        $setting = $app->createModel('setting', array(
            'name' => 'single_one_type',
            'description' => 'Sample Single One Type Setting Image',
            'type' => 'string',
            'is_visible' => false,
            'is_client' => false
        ));
        R::store($setting);

    }//up()

    public function down()
    {
        $this->drop_table('image');
        $this->execute("DELETE FROM `setting` WHERE `name`='multiple_many_types'");
        $this->execute("DELETE FROM `setting` WHERE `name`='multiple_one_type'");
        $this->execute("DELETE FROM `setting` WHERE `name`='single_many_types'");
        $this->execute("DELETE FROM `setting` WHERE `name`='single_one_type'");
    }//down()
}
