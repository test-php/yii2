<?php

namespace app\controllers;

use app\models\Position;
use app\models\PositionForm;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;

class PositionController extends Controller
{
    public function actionIndex ()
    {
        $query = Position::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $position = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'position' =>$position,
            'pagination' => $pagination,
        ]);
    }

    public function actionAdd ()
    {
        $model = new PositionForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $p = new Position();
            $p->name = $model->name;
            if ($p->save()) {
                return $this->redirect(['/position/index']);
            }
        }
        return $this->render('add',['model' => $model]);

    }

    public function actionDelete ($id)
    {
        $position = Position::findOne($id);
        $position->delete();
        return $this->redirect(['/position/index']);

    }

    public function actionUpdate ($id)
    {
        $model = new PositionForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $position = Position::findOne($id);
            $position->name = $model->name;
            if ($position->save()) {
                return $this->redirect(['/position/index']);
            }
        }
        else {
            $position = Position::findOne($id);
            $model->name = $position->name;
            return $this->render('add', ['model' => $model]);
        }

    }



}