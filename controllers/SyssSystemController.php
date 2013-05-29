<?php

class SyssSystemController extends Controller
{
    #public $layout='//layouts/column2';
    public $defaultAction = "admin";
    public $scenario = "crud";

    public function filters() {
	return array(
			'accessControl',
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('create','editableSaver','update','delete','admin','view'),
				'roles'=>array('D1System.SyssSystem.*'),
				),
			array('deny',
				'users'=>array('*'),
				),
			);
}

    public function beforeAction($action){
        parent::beforeAction($action);
        // map identifcationColumn to id
        if (!isset($_GET['id']) && isset($_GET['syss_id'])) {
            $model=SyssSystem::model()->find('syss_id = :syss_id', array(
            ':syss_id' => $_GET['syss_id']));
            if ($model !== null) {
                $_GET['id'] = $model->syss_id;
            } else {
                throw new CHttpException(400);
            }
        }
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/'.$this->module->Id);
        }
        return true;
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view',array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new SyssSystem;
        $model->scenario = $this->scenario;

                $this->performAjaxValidation($model, 'syss-system-form');
    
        if(isset($_POST['SyssSystem'])) {
            $model->attributes = $_POST['SyssSystem'];

            try {
                if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view','id'=>$model->syss_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('syss_id', $e->getMessage());
            }
        } elseif(isset($_GET['SyssSystem'])) {
            $model->attributes = $_GET['SyssSystem'];
        }

        $this->render('create',array( 'model'=>$model));
    }


    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

                $this->performAjaxValidation($model, 'syss-system-form');
        
        if(isset($_POST['SyssSystem']))
        {
            $model->attributes = $_POST['SyssSystem'];


            try {
                if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view','id'=>$model->syss_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('syss_id', $e->getMessage());
            }
        }

        $this->render('update',array('model'=>$model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('EditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new EditableSaver('SyssSystem');  // classname of model to be updated
        $es->update();
    }

    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500,$e->getMessage());
            }

            if(!isset($_GET['ajax']))
            {
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('admin'));
                }
            }
        }
        else
            throw new CHttpException(400,Yii::t('D1System.crud', 'Invalid request. Please do not repeat this request again.'));
    }

    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('SyssSystem');
        $this->render('index',array('dataProvider'=>$dataProvider,));
    }

    public function actionAdmin()
    {
        $model=new SyssSystem('search');
        $model->unsetAttributes();

        if(isset($_GET['SyssSystem'])) {
            $model->attributes = $_GET['SyssSystem'];
        }

        $this->render('admin',array('model'=>$model,));
    }

    public function loadModel($id)
    {
        $model=SyssSystem::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,Yii::t('D1System.crud', 'The requested page does not exist.'));
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='syss-system-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
