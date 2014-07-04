<?php

use RedBeanPHP\Facade as R;

class ImageAdmin extends Ruckusing_Migration_Base
{
    public function up()
    {
        $t = $this->create_table('images', array('options' => 'Engine=InnoDB collate=utf8_unicode_ci'));
        $t->column('multiple_many_types', 'text');
        $t->column('multiple_one_type', 'text');
        $t->column('single_many_types', 'text');
        $t->column('single_one_type', 'text');
        $t->finish();


    }//up()

    public function down()
    {
        $this->drop_table('images');
    }//down()
}
