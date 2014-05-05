<?php

class SetupAdmin extends Ruckusing_Migration_Base
{
    public function up()
    {
        $this->execute("
        drop table if exists `session`;
create table `session` (
  `id` int(11) not null auto_increment,
  `session_id` varchar(32) collate utf8_unicode_ci default null,
  `data` longtext collate utf8_unicode_ci,
  `created_at` timestamp,
  `updated_at` timestamp,
  primary key (`id`)
) engine=innodb default charset=utf8 collate=utf8_unicode_ci;");

        $t = $this->create_table('admin', array('options' => 'Engine=InnoDB default charset=utf8 collate=utf8_unicode_ci'));
        $t->column('name', 'string', array('length' => 100));
        $t->column('email', 'string', array('length' => 100));
        $t->column('salt', 'string', array('length' => 10));
        $t->column('password_hash', 'string', array('length' => 64));
        $t->column('status', 'string', array('length' => 20));
        $t->column('created_at', 'timestamp');
        $t->column('updated_at', 'timestamp');
        $t->finish();

        $t = $this->create_table('adminsession', array('options' => 'Engine=InnoDB default charset=utf8 collate=utf8_unicode_ci'));
        $t->column('admin_id', 'integer');
        $t->column('session_id', 'string', array('length' => 32));
        $t->column('created_at', 'timestamp');
        $t->column('updated_at', 'timestamp');
        $t->finish();

        $t = $this->create_table('setting', array('options' => 'Engine=InnoDB default charset=utf8 collate=utf8_unicode_ci'));
        $t->column('name', 'string', array('length' => 100));
        $t->column('description', 'text');
        $t->column('value', 'text');
        $t->column('type', 'string', array('length' => 20, 'default' => 'string'));
        $t->column('is_client', 'boolean', array('default' => false));
        $t->column('input_type', 'string', array('length' => 20, 'default' => 'text'));
        $t->column('position', 'integer', array('default' => 0));
        $t->column('info', 'text');
        $t->column('is_visible', 'boolean', array('default' => true));
        $t->finish();
    }//up()

    public function down()
    {
        $this->drop_table('session');
        $this->drop_table('admin');
        $this->drop_table('adminsession');
        $this->drop_table('setting');
    }//down()
}
