<?php

use app\models\AfectacionPersona;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AfectacionpersonaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'AFECTACION DE PERSONA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="afectacion-persona-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Afectacion Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            'header' => 'Nº'], //Para que no aparezca el # sino la letra que se requiera
            

            //'id_area_afectada',
            //'id_sub_area_afect',
            //'id_sub2_area_afect',
            'descripcion',
            'codigo',
            //'created_at',
            //'updated_at',
           
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

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AfectacionPersona $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_area_afectada' => $model->id_area_afectada]);
                 }
            ],
        ],
    ]); ?>


</div>
