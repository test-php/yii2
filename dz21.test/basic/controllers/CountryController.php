<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use app\models\CountryForm;
use Yii;


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

	public function actionAdd()
    {
        $model = new CountryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $country = new Country();
            $country->code = $model->code;
            $country->name = $model->name;
            $country->population = $model->population;
            if ($country->save()) {
                return $this->redirect(['/country/index']);
            }
        }
        return $this->render('add', ['model' => $model]);

     }

     public function actionDelete($code)
     {
        $country = Country::findOne($code);
        $country->delete();
        return $this->redirect(['/country/index']);
     }

     public function actionUpdate ($code)
     {

         $model = new CountryForm();

         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             $country = Country::findOne($code);
             $country->code = $model->code;
             $country->name = $model->name;
             $country->population = $model->population;
             $country->save();
             return $this->redirect(['/country/index']);
         }
         else {
             $country = Country::findOne($code);
             $model->code = $country->code;
             $model->name = $country->name;
             $model->population = $country->population;
             return $this->render('update', ['model' => $model]);
         }

     }


	
}
