<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CountryForm extends Model
{
    public $code;
	public $name;
    public $population;

    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['code', 'name', 'population'], 'required'],
            
        ];
    }
}
