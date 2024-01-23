<?php

namespace app\models;

use phpDocumentor\Reflection\PseudoTypes\True_;
use Yii;
use yii\base\Model;


class IntervalForm extends Model
{
    public $parameter=true;
    public $start_date='2000-01-01';
    public $end_date='3000-01-01';
    public $check=true;

    public function rules()
    {
        return [
            // username and password are both required
          [['start_date','end_date'], 'date', 'format' => 'yyyy-MM-dd'],
          [['parameter','check'], 'required'],
            
        ];
    }
}
