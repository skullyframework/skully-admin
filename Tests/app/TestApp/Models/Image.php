<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 7/5/14
 * Time: 6:29 PM
 */

namespace TestApp\Models;


use Skully\App\Models\BaseModel;
use Skully\App\Models\Traits\HasImages;

class Image extends BaseModel {
    use HasImages;

    public function getMultipleManyTypes()
    {
        return $this->_getImageField('multiple_many_types');
    }

    public function setMultipleManyTypes($values = array())
    {
        $this->_setImageField('multiple_many_types', $values);
    }


    public function getMultipleOneType()
    {
        return $this->_getImageField('multiple_one_type');
    }

    public function setMultipleOneType($values = array())
    {
        $this->_setImageField('multiple_one_type', $values);
    }

    public function getSingleManyTypes()
    {
        return $this->_getImageField('single_many_types');
    }

    public function setSingleManyTypes($values = array())
    {
        $this->_setImageField('single_many_types', $values);
    }

    // We do not need getSingleOneType() and setSingleOneType() since they are supposed to return a string (not an array).


    public function setImages($values = array())
    {
        $this->_setImageField('images', $values);
    }

} 