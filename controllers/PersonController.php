<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Person;
use app\models\PersonForm;
use Yii;

class PersonController extends Controller
{
    public function actionIndex()
	{
		$query = Person::find();
		
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
		]);
		
		$persons = $query->orderBy('name')
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();
			
		return $this->render('index', [
			'persons' =>$persons,
			'pagination' => $pagination,
		]);
	}
	
	public function actionAdd()
	{
		$model = new PersonForm();
		
		if ($model->load(Yii::$app->request->post()) && $model->validate())
		{
			$person = new Person();
			$person->name = $model->name;
			$person->surname = $model->surname;
			$person->department = $model->department;
			$person->position = $model->position;
			$person->hobby = $model->hobby;
			if ($person->save()) {
				return $this->redirect(['/person/index']);
			}
		}
		return $this->render('add', ['model' => $model]);
	}
	
	 public function actionDelete($id)
     {
        $person = Person::findOne($id);
        $person->delete();
        return $this->redirect(['/person/index']);
     }
	 
     public function actionUpdate ($id)
     {
         $model = new PersonForm();
         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $person = Person::findOne($id);
			$person->name = $model->name;
			$person->surname = $model->surname;
			$person->department = $model->department;
			$person->position = $model->position;
			$person->hobby = $model->hobby;
			if ($person->save()) {
				return $this->redirect(['/person/index']);
			}
             
         }
         else {
             $person = Person::findOne($id);
             $model->name = $person->name;
             $model->surname = $person->surname;
			 $model->department = $person->department;
			 $model->position = $person->position;
			 $model->hobby = $person->hobby;
             return $this->render('add', ['model' => $model]);
         }
     }	
	
}
