<?php

namespace app\models;

use yii\base\Model;

class DepartmentForm extends Model
{
    public $id;
    public $name;

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'length' => [1, 255]],
        ];
    }
}
