<?php
/**
 * Created by PhpStorm.
 * User: Людмила Подвозных
 * Date: 24.05.2018
 * Time: 17:54
 */

namespace app\models;

use yii\base\Model;

class PositionForm extends Model
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