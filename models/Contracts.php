<?php
namespace app\models;
use yii\db\ActiveRecord;
class Contracts extends ActiveRecord
{
    public $money;
    public function getBook_contracts_and_projects()
    {
        return $this->hasMany(Book_contracts_and_projects::className(), ['contract' => 'id_contract']);
    }

    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['contract' => 'id_contract']);
    }

    public function getBook_work_history()
    {
        return $this->hasMany(Book_work_history::className(), ['contract' => 'id_contract']);
    }

}
