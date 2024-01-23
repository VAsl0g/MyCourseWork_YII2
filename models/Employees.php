<?php
namespace app\models;

use Codeception\Test\Interfaces\Dependent;
use yii\db\ActiveRecord;
class Employees extends ActiveRecord
{
    public $kol;
    

        
        public function getCategories()
        {
            return $this->hasOne(Categories::className(), ['id_category' => 'category']);
        }
    
        public function getDepartments()
        {
            return $this->hasOne(Departments::className(), ['id_department' => 'department']);
        }

        public function getBook_work_history()
        {
            return $this->hasMany(Book_work_history::className(), ['employee' => 'id_employee']);
        }

        public function getContracts()
        {
            return $this->hasOne(Contracts::className(), ['id_contract' => 'contract']);
        }

            public function getProjects()
            {
                return $this->hasOne(Projects::className(), ['id_project' => 'project']);
            }
    
}
