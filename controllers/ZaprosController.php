<?php
namespace app\controllers;
use app\models;
use app\models\UnionEquipments;
use app\models\Book_contracts_and_projects;
use app\models\Book_history_use;
use app\models\Book_work_history;
use app\models\Books;
use app\models\Categories;
use app\models\Contracts;
use app\models\Directors;
use app\models\Employees;
use app\models\Equipments;
use app\models\FindForm;
use app\models\FindForm2;
use app\models\IntervalForm;
use app\models\IntervalForm2;
use app\models\Projects;
use app\models\Work_subcontractors;
use yii\web\Controller;

use Yii;


class ZaprosController extends Controller
{
 public function actionZaprosOne()
 {
     $model=new FindForm(); 
     
     if ($model->load(Yii::$app->request->post()) && $model->validate())
     $employees=Employees::find()->where(["department"=>$model->parameter])->joinWith("departments")->all();
     else 
     $employees=Employees::find()->joinWith("departments")->all();

     return $this->render('zapros_one', [
        'employees' => $employees,'model'=>$model
    ]);
 }  

 public function actionZaprosTwo()
 {
     $directors=Directors::find()->all();
     return $this->render('zapros_two', [
        'directors' => $directors
    ]);
 }  

 public function actionZaprosThree()
 {
  
    $model=new IntervalForm();

    if ($model->load(Yii::$app->request->post()) && $model->validate()){
        if (! $model->check){
           if($model->parameter)
             $data=Projects::find()->where(['and',['>=','start_date',$model->start_date],['<=','end_date',$model->end_date]])->all();
             else  $data=Contracts::find()->where(['and',['>=','start_date',$model->start_date],['<=','end_date',$model->end_date]])->all();
        }
        else if($model->parameter)
            $data=Projects::find()->where(['and',['<=','start_date',date("Y-m-d")],['>=','end_date',date("Y-m-d")]])->all();
            else  $data=Contracts::find()->where(['and',['<=','start_date',date("Y-m-d")],['>=','end_date',date("Y-m-d")]])->all();
         
    }  else   $data=Projects::find()->where(['and',['<=','start_date',date("Y-m-d")],['>=','end_date',date("Y-m-d")]])->all();
     return $this->render('zapros_three', [
        '_data' => $data,'model'=>$model
    ]);
 }  

 public function actionZaprosFour()
 {
  
   $model1=new FindForm(); 
   $model2=new FindForm2(); 
   if ($model1->load(Yii::$app->request->post()) && $model1->validate())
      $data1=Book_contracts_and_projects::find()->select("name")->asArray()->joinWith('contracts')->where(['project'=>$model1->parameter]) ->all();
   else 
      $data1=[0=>['name'=>null]];
   if ($model2->load(Yii::$app->request->post()) && $model2->validate())
      $data2=Book_contracts_and_projects::find()->select("name")->asArray()->joinWith('projects')->where(['contract'=>$model2->parameter]) ->all();
   else
   $data2=[0=>['name'=>null]];
   return $this->render('zapros_four', [
      'data1' => $data1, 'data2' => $data2,'model1'=>$model1,'model2'=>$model2
  ]);
 }  

 public function actionZaprosFive()
 {
   $model=new IntervalForm();

   if ($model->load(Yii::$app->request->post()) && $model->validate()){
          if($model->parameter)
            $data=Projects::find()->asArray()->select([ 'sum(cost) AS money'])->where(['and',['>=','start_date',$model->start_date],['<=','end_date',$model->end_date]])->all();
            else $data=$data=Contracts::find()->asArray()->select([ 'sum(cost) AS money'])->where(['and',['>=','start_date',$model->start_date],['<=','end_date',$model->end_date]])->all();
   }  else   $data=0;
    return $this->render('zapros_five', [
       '_data' => $data,'model'=>$model
   ]);
 }

 public function actionZaprosSix()
 {
  
   $model=new IntervalForm();

    if ($model->load(Yii::$app->request->post()) && $model->validate()){
        if (! $model->check)

             $data=UnionEquipments::find()->select("name")->asArray()->where(['and',['<=','start_date',$model->start_date],['>=','end_date',$model->start_date]])->all();
             else  $data=Equipments::find()->asArray()->where(['end_date'=>NULL])->all();
         
    }  else   $data=Equipments::find()->asArray()->where(['end_date'=>NULL])->all();
    //$data=UnionEquipments::find()->asArray()->all();
     return $this->render('zapros_six', [
        '_data' => $data,'model'=>$model
    ]);
 }  

 public function actionZaprosSeven()
 {
  
   $modelf=new FindForm(); 
   $modelt=new FindForm2(); 
   if ($modelf->load(Yii::$app->request->post()) && $modelf->validate())
      $data1=Equipments::find()->select("Equipments.name as ename")->asArray()->joinWith('projects')->where(['project'=>$modelf->parameter]) ->all();
   else 
   $data1=[0=>['ename'=>null]];
   if ($modelt->load(Yii::$app->request->post()) && $modelt->validate())
   $data2=Equipments::find()->select(['Equipments.name as ename'])->asArray()
      ->leftJoin('Book_contracts_and_projects', "`Equipments`.`project`= `Book_contracts_and_projects`.`project`")
      ->leftJoin('Contracts', "`Contracts`.`id_contract`= `Book_contracts_and_projects`.`contract`")
      ->where(['id_contract'=>$modelt->parameter])->all();
      else
      $data2=[0=>['ename'=>null]];
   return $this->render('zapros_seven', [
      'data1' => $data1, 'data2' => $data2,'modelf'=>$modelf,'modelt'=>$modelt
  ]);
 }

 public function actionZaprosEight()
 {
  
   $modelf=new IntervalForm();
   $modelt=new IntervalForm2();
   if ($modelf->load(Yii::$app->request->post()) && $modelf->validate())
           $data1=Book_work_history::find()->select("`employees`.`FIO` as ename, contracts.name as cname,projects.name pname ")->asArray()
      ->joinWith('employees')
     ->joinWith('projects')
     ->joinWith('contracts')
     // ->leftJoin('Book_contracts_and_projects', "`Employees`.`project`= `Book_contracts_and_projects`.`project`")
     // ->leftJoin('Contracts', "`Contracts`.`id_contract`= `Book_contracts_and_projects`.`contract`")
      ->where(['Book_work_history.employee'=>$modelf->parameter])
     //->andWhere(['and',['>=','Book_work_history.start_date',$modelf->start_date],['<=','Book_work_history.end_date',$modelf->end_date]])
     ->andWhere("((`Book_work_history`.`start_date` >= '$modelf->start_date') AND (`Book_work_history`.`end_date` <='$modelf->end_date')) OR
     ((`Book_work_history`.`start_date` >= '$modelf->start_date')  AND (`Book_work_history`.`end_date` is null))
     ")
      
     ->all();
   else 
      $data1=[0=>['ename'=>null,'cname'=>null,'pname'=>null]];
   if ($modelt->load(Yii::$app->request->post()) && $modelt->validate())
   $data2=Book_work_history::find()->select("`Employees`.`FIO` as ename, Contracts.name as cname,projects.name pname ")->asArray()
   ->joinWith('employees')
   ->leftJoin('categories', "`categories`.`id_category`=`employees`.`category`")
   ->joinWith('projects')
   ->joinWith('contracts')
    ->where(['categories.id_category'=>$modelt->parameter])
    //->andWhere(['and',['>=','Book_work_history.start_date',$modelf->start_date],['<=','Book_work_history.end_date',$modelf->end_date]])
    ->andWhere("((`Book_work_history`.`start_date` >= '$modelf->start_date') AND (`Book_work_history`.`end_date` <='$modelf->end_date')) OR
    ((`Book_work_history`.`start_date` >= '$modelf->start_date')  AND (`Book_work_history`.`end_date` is null))
    ")
    ->all();
  
    else
     $data2=[0=>['ename'=>null,'cname'=>null,'pname'=>null]];


  
return $this->render('zapros_eight', [
   'data1' => $data1, 'data2' => $data2,'modelf'=>$modelf,'modelt'=>$modelt
]);
 }  

 public function actionZaprosNine()
 {
  $data=Work_subcontractors::find()->joinWith('projects')->all();
  return $this->render('zapros_nine', [
   'data' => $data
]);
 }

 public function actionZaprosTen()
 {
   $model=new FindForm(); 
     
   if ($model->load(Yii::$app->request->post()) && $model->validate())
      $kolCat=Employees::find()->select("name ,count(id_employee) as kol")->where(["project"=>$model->parameter])->joinWith("categories")->groupBy("name")->asArray()->all();
   else 
      $kolCat=Employees::find()->select("name,count(id_employee) as kol")->where(["project"=>1])->joinWith("categories")->groupBy("categories.name")->asArray()->all();
   $kol=Employees::find()->select("count(id_employee) as kol")->where(["project"=>$model->parameter])->count('id_employee');

   return $this->render('zapros_ten', [
      'kolCat' => $kolCat,'kol' => $kol,'model'=>$model
  ]);
 }

 public function actionZaprosEleven()
 {
     
      $data=Book_history_use::find()->select("name ,count(Book_history_use.project) as kol")->joinWith("equipments")->groupBy("id_equipment")->asArray()->all();
   return $this->render('zapros_eleven', [
      'data' => $data
  ]);
 }

 public function actionZaprosTwelve()
 {
   $model=new FindForm(); 
     
   if ($model->load(Yii::$app->request->post()) && $model->validate()){
         if($model->parameter)
           $data=Contracts::find()->select("`name`, (cost/TIMESTAMPDIFF(MONTH,start_date,end_date)) AS `ratio`")->asArray()->all();
           else  $data=Contracts::find()->select("name,(cost/(count(id_employee))) as ratio")->joinWith('employees')->groupBy('`id_contract`,`name`')->asArray()->all();
      }else
      $data=[0=>["name"=>null,"ratio"=>null]];
   return $this->render('zapros_twelve', [
      'data' => $data,'model'=>$model
  ]);
 }

 public function actionZaprosThirteen()
 {
   $model=new IntervalForm(); 
   if ($model->load(Yii::$app->request->post()) && $model->validate())
      $kolCat=Book_work_history::find()->select("name,count(id_employee) as kol")
      ->joinWith("employees")
      ->leftJoin("categories","`categories`.`id_category`=`employees`.`category`")
      ->where(["Book_work_history.project"=>$model->parameter])
      ->andWhere("((`Book_work_history`.`start_date` >= '$model->start_date') AND (`Book_work_history`.`end_date` <='$model->end_date')) OR
    ((`Book_work_history`.`start_date` >= '$model->start_date')  AND (`Book_work_history`.`end_date` is null))
    ")
      ->groupBy("name")->asArray()->all();
   else 
      $kolCat=Book_work_history::find()->select("name,count(id_employee) as kol")
      ->joinWith("employees")
      ->leftJoin("categories","`categories`.`id_category`=`employees`.`category`")
      ->where(["Book_work_history.project"=>1])->groupBy("name")->asArray()->all();
      
   $kol=Book_work_history::find()->select("name,count(id_employee) as kol")
   ->joinWith("employees")
   ->where(["Book_work_history.project"=>$model->parameter])
   ->andWhere("((`Book_work_history`.`start_date` >= '$model->start_date') AND (`Book_work_history`.`end_date` <='$model->end_date')) OR
    ((`Book_work_history`.`start_date` >= '$model->start_date')  AND (`Book_work_history`.`end_date` is null))
    ")
   ->count('employee');

   return $this->render('zapros_thirteen', [
      'kolCat' => $kolCat,'kol' => $kol,'model'=>$model
  ]);
 }

 public function actionZaprosFourteen()
 {
   $model=new FindForm(); 
     
   if ($model->load(Yii::$app->request->post()) && $model->validate()){
         if($model->parameter)
           $data=Projects::find()->select("`name`, (cost/TIMESTAMPDIFF(MONTH,start_date,end_date)) AS `ratio`")->asArray()->all();
           else  $data=Projects::find()->select("name,(cost/(count(id_employee))) as ratio")->joinWith('employees')->groupBy('`id_project`,`name`')->asArray()->all();
      }else
      $data=[0=>["name"=>null,"ratio"=>null]];
   return $this->render('zapros_fourteen', [
      'data' => $data,'model'=>$model
  ]);
 }


}



























// SELECT `Employees`.`FIO` AS `ename`, `Contracts`.`name` AS `cname`, `projects`.`name` AS `pname` ,`book_work_history`.`end_date` FROM `book_work_history` 
// LEFT JOIN `projects` ON `book_work_history`.`project` = `projects`.`id_project` 
// LEFT JOIN `employees` ON `employees`.`id_employee`=`book_work_history`.`emploee`
// LEFT JOIN `categories` ON `categories`.`id_category`=`employees`.`category`
// LEFT JOIN `Book_contracts_and_projects` ON `Employees`.`project`= `Book_contracts_and_projects`.`project` 
// LEFT JOIN `Contracts` ON `Contracts`.`id_contract`= `Book_contracts_and_projects`.`contract`
// UNION ALL
// SELECT `Employees`.`FIO` AS `ename`, `Contracts`.`name` AS `cname`, `projects`.`name` AS `pname`,CURRENT_DATE FROM `employees`
// LEFT JOIN `projects` ON `Employees`.`project` = `projects`.`id_project`
// LEFT JOIN `Book_contracts_and_projects` ON `Employees`.`project`= `Book_contracts_and_projects`.`project` 
// LEFT JOIN `Contracts` ON `Contracts`.`id_contract`= `Employees`.`contract`