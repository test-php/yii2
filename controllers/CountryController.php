<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends Controller
{
    public function actionIndex()
	{
		$query = Country::find();
		
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
		]);
		
		$countries = $query->orderBy('name')
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();
			
		return $this->render('index', [
			'countries' =>$countries,
			'pagination' => $pagination,
		]);
	}
		
		
	public function actionUpdate ($code)
     {
		 
         $model = new CountryForm();

         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             $country = new Country();
             $country->code = $model->code; 
             $country->name = $model->name; 
             $country->population = $model->population; 
             $country->save();
             return $this->redirect(['/country/index']);
         }
         else
		 {
			 $model->code = $country->code;
             $model->name = $country->name; 
             $model->population = $country->population; 
			 return $this->render('update', ['model' => $model]);
		 }
     }
	
}
