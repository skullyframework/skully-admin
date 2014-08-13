<?php

use RedbeanPHP\Facade as R;

class SettingsAdmin extends Ruckusing_Migration_Base
{
    public function up()
    {
        $app = __setupApp();
        $setting = $app->createModel('setting', array(
            'name' => 'smtpSecurity',
            'description' => 'SMTP Security. ssl (default) or tls',
            'type' => 'string',
            'input_type' => 'text',
            'value' => 'ssl',
            'is_visible' => true,
            'is_client' => false
        ));
        R::store($setting);

        $setting = $app->createModel('setting', array(
            'name' => 'smtpPort',
            'description' => "SMTP port (default: 465)",
            'value' => '465',
            'is_visible' => true,
            'is_client' => false
        ));
        R::store($setting);

        $setting = $app->createModel('setting', array(
            'name' => 'smtpHost',
            'description' => 'SMTP host',
            'value' => 'heroic.hostingheroes.net',
            'is_visible' => true,
            'is_client' => false
        ));
        R::store($setting);

        $setting = $app->createModel('setting', array(
            'name' => 'smtpPassword',
            'description' => 'Contact SMTP password',
            'value' => '48z.,*WnrN}',
            'is_visible' => true,
            'is_client' => false,
            'type' => 'string',
            'input_type' => 'password'
        ));
        R::store($setting);

        $setting = $app->createModel('setting', array(
            'name' => 'smtpUsername',
            'description' => 'SMTP username',
            'value' => 'no-reply@triodigitalagency.com',
            'is_visible' => true,
            'is_client' => false
        ));
        R::store($setting);

        $setting = $app->createModel('setting', array(
            'name' => 'senderEmail',
            'description' => 'Sender Email',
            'value' => 'no-reply@triodigitalagency.com',
            'is_visible' => true,
            'is_client' => false
        ));
        R::store($setting);

        $setting = $app->createModel('setting', array(
            'name' => 'senderName',
            'description' => 'Contact Sender Name',
            'value' => 'No Reply',
            'is_visible' => true,
            'is_client' => false
        ));
        R::store($setting);

        $setting = $app->createModel('setting', array(
            'name' => 'replyToEmail',
            'description' => 'Reply-to Email',
            'value' => 'your@email.com',
            'is_visible' => true,
            'is_client' => false
        ));
        R::store($setting);

        $setting = $app->createModel('setting', array(
            'name' => 'replyToName',
            'description' => 'Reply-to Name',
            'value' => 'Your Name',
            'is_visible' => true,
            'is_client' => false
        ));
        R::store($setting);

    }//up()

    public function down()
    {
        $this->execute("DELETE FROM `setting` WHERE `name`='smtpSecurity'");
        $this->execute("DELETE FROM `setting` WHERE `name`='smtpPort'");
        $this->execute("DELETE FROM `setting` WHERE `name`='smtpHost'");
        $this->execute("DELETE FROM `setting` WHERE `name`='smtpPassword'");
        $this->execute("DELETE FROM `setting` WHERE `name`='smtpUsername'");
        $this->execute("DELETE FROM `setting` WHERE `name`='senderEmail'");
        $this->execute("DELETE FROM `setting` WHERE `name`='senderName'");
        $this->execute("DELETE FROM `setting` WHERE `name`='replyToEmail'");
        $this->execute("DELETE FROM `setting` WHERE `name`='replyToName'");

    }//down()
}
