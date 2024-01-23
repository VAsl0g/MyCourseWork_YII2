<?php

namespace app\models;

use Yii;
use yii\base\Model;

class FindForm extends Model
{
    public $parameter=true;



    public function rules()
    {
        return [
            // username and password are both required
            ['parameter', 'required'],
        ];
    }
}


