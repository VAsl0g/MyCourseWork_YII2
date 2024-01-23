<?php
namespace app\models;

use yii\db\ActiveRecord;
class Projects extends ActiveRecord
{
    public $money;
    public function getBook_contracts_and_projects()
    {
        return $this->hasMany(Book_contracts_and_projects::className(), ['project' => 'id_project']);
    }

    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['project' => 'id_project']);
    }

    public function getBook_history_use()
    {
        return $this->hasMany(Book_history_use::className(), ['project' => 'id_project']);
    }

    public function getEquipments()
    {
        return $this->hasMany(Equipments::className(), ['project' => 'id_project']);
    }

    public function getWork_subcontractors()
    {
        return $this->hasMany(Work_subcontractors::className(), ['project' => 'id_project']);
    }

    public function getBook_work_history()
    {
        return $this->hasMany(Book_work_history::className(), ['project' => 'id_project']);
    }
    
}