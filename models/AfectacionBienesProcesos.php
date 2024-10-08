<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "afectacion_bienes_procesos".
 *
 * @property int $id_afec_bien_pro clave unica de la afectacion de bienes y procesos
 * @property string|null $afectacion valor numerico de la afectacion
 * @property string|null $valor nombre de la afectacion
 * @property string|null $created_at fecha y hora de creacion del registro
 * @property string|null $updated_at fecha y hora de la modificacion del registro
 * @property int|null $id_estatus estatus del registro Activo o Inactivo
 *
 * @property Estatus $estatus
 * @property Registro[] $registros
 */
class AfectacionBienesProcesos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'afectacion_bienes_procesos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['afectacion', 'valor'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_estatus'], 'default', 'value' => null],
            [['id_estatus'], 'integer'],
            [['id_estatus'], 'exist', 'skipOnError' => true, 'targetClass' => Estatus::class, 'targetAttribute' => ['id_estatus' => 'id_estatus']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_afec_bien_pro' => 'Id Afec Bien Pro',
            'afectacion' => 'Afectacion',
            'valor' => 'Valor',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'id_estatus' => 'Id Estatus',
        ];
    }

    /**
     * Gets query for [[Estatus]].
     *
     * @return \yii\db\ActiveQuery|EstatusQuery
     */
    public function getEstatus()
    {
        return $this->hasOne(Estatus::class, ['id_estatus' => 'id_estatus'])->inverseOf('afectacionBienesProcesos');
    }

    /**
     * Gets query for [[Registros]].
     *
     * @return \yii\db\ActiveQuery|RegistroQuery
     */
    public function getRegistros()
    {
        return $this->hasMany(Registro::class, ['id_afecta_bienes_perso' => 'id_afec_bien_pro'])->inverseOf('afectaBienesPerso');
    }

    /**
     * {@inheritdoc}
     * @return AfectacionbienesprocesosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AfectacionbienesprocesosQuery(get_called_class());
    }
}
