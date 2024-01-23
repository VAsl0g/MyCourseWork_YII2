<?php
namespace app\models;
use yii\db\ActiveRecord;
class Book_work_history extends ActiveRecord
{

    

        
        public function getEmployees()
        {
            return $this->hasOne(Employees::className(), ['id_employee' => 'employee']);
        }
    
        public function getProjects()
        {
            return $this->hasOne(Projects::className(), ['id_project' => 'project']);
        }

        public function getContracts()
        {
            return $this->hasOne(Contracts::className(), ['id_contract' => 'contract']);
        }
    
}