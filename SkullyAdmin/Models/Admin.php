<?php
namespace SkullyAdmin\Models;


use Skully\App\Models\BaseModel;
use Skully\App\Models\Traits\Authorizable;
use Skully\App\Models\Traits\HasTimestamp;

abstract class Admin extends BaseModel {
    use Authorizable {
        beforeSave as aBeforeSave;
    }
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    use HasTimestamp {
        beforeSave as tsBeforeSave;
    }

    public function beforeSave()
    {
        echo "beforeSave\n";
        $this->tsBeforeSave();
        $this->aBeforeSave();
    }
    public function validatesExistenceOf()
    {
        return array('name', 'email');
    }
} 