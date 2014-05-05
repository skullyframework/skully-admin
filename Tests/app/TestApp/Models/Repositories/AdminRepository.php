<?php
/**
 * Created by Trio Design Team (jay@tgitriodesign.com).
 * Date: 1/11/14
 * Time: 1:57 AM
 */

namespace TestApp\Models\Repositories;


use Skully\App\Models\Repositories\BaseRepository;
use TestApp\Models\Admin;
use RedBeanPHP\Facade as R;
use Skully\App\Helpers\UtilitiesHelper;

class AdminRepository extends BaseRepository {

    public function toHash($password, $salt, $globalSalt) {
        return md5($password . $salt . $globalSalt);
    }

    /**
     * Logs admin into the system
     * @param $login
     * @param $password
     * @return \TestApp\Models\Admin|null
     */
    public function login($login, $password)
    {
        /** @var \RedBean_SimpleModel $adminBean */
        $adminBean = R::findOne('admin', "status = ? and email = ?", array(Admin::STATUS_ACTIVE, $login));
        if (!empty($adminBean)) {
            /** @var \TestApp\Models\Admin $admin */
            $admin = $adminBean->box();
            if ($admin->get('password_hash') == UtilitiesHelper::toHash($password, $admin->get('salt'), $this->app->config('globalSalt'))) {
                $adminSessions = R::find('adminsession', "admin_id = ?", array($admin->getID()));

                if (!empty($adminSessions)) {
                    R::trashAll($adminSessions);
                }
                // when everything ok, regenerate session
                session_regenerate_id(true);	// change session ID for the current session and invalidate old session ID
                $adminId = $admin->getID();
                $sessionId = session_id();

                $adminsession = $this->app->createModel('adminsession', array("admin_id" => $adminId, "session_id" => $sessionId));

                $this->app->getSession()->set('adminId', $admin->getID());
                R::store($adminsession);
                return $admin;
            }
        }
        return null;
    }
    public function logout() {
        $adminId = $this->app->getSession()->get('adminId');
        $sql = "delete from `adminsession` where `admin_id` = '".$adminId."'";
        R::exec($sql);
        $this->app->getSession()->remove('adminId');
    }
} 