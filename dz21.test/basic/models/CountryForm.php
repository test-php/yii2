<?php

namespace app\models;

use yii\base\Model;

class CountryForm extends Model
{
    public $code;
    public $name;
    public $population;

    public function rules()
    {
        return [
            [['code', 'name', 'population'], 'required'],
            [['population'], 'integer']
        ];
    }
}