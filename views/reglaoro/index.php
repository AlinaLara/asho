<?php

use app\models\ReglaOro;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ReglaoroSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Regla de Oro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regla-oro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Regla de Oro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           
            ['class' => 'yii\grid\SerialColumn',
            'header' => 'Nº'], //Para que no aparezca el # sino la letra que se requiera

            //'id_regla_oro',
            'descripcion',
            //'id_estatus',

 //Esto es Para que muestre el estatus en vez del id almacenado en la tabla estados
 [   
    'attribute' => 'id_estatus',
    'label' => 'Estatus',
    'filterInputOptions' => [
        'class' => 'form-control',
        'placeholder' => 'Busqueda',
    ],
    
    'value' => function($model){
        return   $model->estatus->descripcion;},
],


            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ReglaOro $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_regla_oro' => $model->id_regla_oro]);
                 }
            ],
        ],
    ]); ?>


</div>
