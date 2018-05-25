<?php

namespace app\controllers;


use yii\web\Controller;
use yii\data\Pagination;
use app\models\Department;
use app\models\DepartmentForm;
use Yii;

class DepartmentController extends Controller
{
    public function actionIndex ()
    {
        $query = Department::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $department = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'department' =>$department,
            'pagination' => $pagination,
        ]);
    }

    public function actionAdd ()
    {
        $model = new DepartmentForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $dep = new Department();
            $dep->name = $model->name;

            if ($dep->save()) {
                return $this->redirect(['/department/index']);
            }
        }
        return $this->render('add', ['model' => $model]);
    }

    public function actionDelete ($id)
    {
        $d = Department::FindOne($id);
        $d->delete();
        return $this->redirect(['/department/index']);
    }

    public function actionUpdate ($id)
    {
        $model = new DepartmentForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $d = Department::findOne($id);
            $d->name = $model->name;
            if ($d->save()) {
                return $this->redirect(['/department/index']);
            }
        }
        else {
            $d =Department::findOne($id);
            $model->name = $d->name;
            return $this->render('add', ['model' => $model]);
        }
    }

}