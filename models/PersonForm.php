<?php

namespace app\models;

use Yii;
use yii\base\Model;

class PersonForm extends Model
{
    public $name;
    public $surname;
    public $department;
	public $position;
    public $hobby;
   

      public function rules ()
    {
        return [
            [['name', 'surname', 'department', 'position'], 'required'],
            [['name', 'surname'], 'string', 'length' => [1, 30]],
            [['department', 'position'], 'string', 'length' => [1, 255]],
            ['hobby', 'string'],
        ];

    }

   
}
