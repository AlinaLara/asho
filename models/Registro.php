<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registro".
 *
 * @property int $id_registro clave unica del registro
 * @property int|null $id_estado id del estado clave foranea
 * @property string|null $fecha_hora fecha y hora del incidente
 * @property string|null $lugar descripcion del lugar del hecho
 * @property string|null $nro_accidente correlativo compuesto por region, año, correlativo, naturaleza del accidente
 * @property int|null $cedula_supervisor_60min cedula del supervisor clave foranea de la tabla de persona
 * @property string|null $observaciones_60min observaciones del accidente del primer registro (60 min.) o primera pantalla 
 * @property bool|null $autorizado_60m valor verdadero si fue autorizaado o falso si no fue autorizado en el reporte de 60 minutos
 * @property string|null $created_at fecha y hora de creacion del registro
 * @property string|null $updated_at fecha y hora de la modificacion del registro
 * @property int|null $id_estatus_proceso id fel estatus del proceso clave foranea en la tabla estatus
 * @property int|null $id_region id de la region del accidente
 * @property string|null $acciones_tomadas_60min acciones tomados en el reporte de los primeros 60 minutos del accidente
 * @property int|null $cedula_reporta cedula del quien reporte el accidente clave foranea de la tabla personal
 * @property int|null $cedula_pers_accide ceddula de la persona que sufrio el accidente 
 * @property int|null $cedula_validad_60min cedula de la persona que realiza el reporte en los primeros 60 minutos del accidente 
 * @property int|null $id_magnitud id magnitud clave foranea de la tabla magnitud 
 * @property int|null $id_tipo_accidente id del tipo de accidente clave foranea de la tabla tipo de accidente
 * @property int|null $id_tipo_trabajo id del tipo de trabajo clave foranea de la tabla tipo de trabajo
 * @property int|null $id_peligro_agente id del peligro y agente clave foranea de la tabla peligro_agente
 * @property int|null $id_sujeto_afectacion id del sujeto de afectacion clave foranea de la tabla sujeto de afectacion
 * @property int|null $id_afecta_bienes_perso id de afectacion de bienes y procesos clave foranea de la tabla afectacion_bienes_procesos
 * @property int|null $cedula_24horas cedula de la persona que reporta en 24 horas clave foranea de la tabla personal
 * @property string|null $acciones_tomadas_24horas Acciones tomadas en el reporte de 24 horas 
 * @property string|null $observaciones_24horas observaciones realizadas en el reporte de 24 horas
 * @property string|null $recomendaciones_24horas recomendaciones dadas en el el reporte 24 horas 
 * @property bool|null $autorizado_24horas valor verdadero si fue autorizaado o falso si no fue autorizado en el registro de 24 horas
 * @property int|null $cedula_valid_24horas cedula de la persona que valida el registro de 24 horas
 * @property string|null $descripcion_accidente_60min descripcion del accidente en el registro de 60 minutos
 * @property int|null $id_gerencia id de la gerencia clave foranea de la tabla gerencia
 * @property string|null $recomendaciones_60m recomendadaciones del registro de 60 minutos
 * @property int|null $anno año del accidente para ser utilizado en el correlativo
 * @property int|null $correlativo correlativo de los accidentes
 * @property int|null $id_naturaliza_incidente id de la naturaliza del accidente clave foranea de la tabla naturaleza_incidente , ademas es parte del correlativo
 * @property string|null $ocurrencia_hecho_60m se registra la ocurencia de los hechos en el registro de los 60 minutos
 * @property string|null $acciones_tomadas_24h acciones tomadas en las primeras 24 horas del registro
 * @property string|null $observaciones_24h observaciones de las primeras 24 horas del registro
 * @property string|null $validado_por_24h validado por las primeras 24 horas del registro
 * @property int|null $id_requerimiento_trabajo_24h id del requemiento del trabajo si, no, no aplica clave foranea de la tabla estatus
 * @property bool|null $cumple_regla_oro si cumple o no las reglas de oro
 *
 * @property AfectacionBienesProcesos $afectaBienesPerso
 * @property Personal $cedula24horas
 * @property Personal $cedulaPersAccide
 * @property Personal $cedulaReporta
 * @property Personal $cedulaSupervisor60min
 * @property Personal $cedulaValid24horas
 * @property Personal $cedulaValidad60min
 * @property Estados $estado
 * @property Estatus $estatusProceso
 * @property Gerencia $gerencia
 * @property Magnitud $magnitud
 * @property NaturalezaAccidente $naturalizaIncidente
 * @property Regiones $region
 * @property Estatus $requerimientoTrabajo24h
 * @property SujetoAfectacion $sujetoAfectacion
 * @property TipoAccidente $tipoAccidente
 * @property TipoTrabajo $tipoTrabajo
 * @property TipoTrabajo $tipoTrabajo0
 */
class Registro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estado', 'cedula_supervisor_60min', 'id_estatus_proceso', 'id_region', 'cedula_reporta', 'cedula_pers_accide', 'cedula_validad_60min', 'id_magnitud', 'id_tipo_accidente', 'id_tipo_trabajo', 'id_peligro_agente', 'id_sujeto_afectacion', 'id_afecta_bienes_perso', 'cedula_24horas', 'cedula_valid_24horas', 'id_gerencia', 'anno', 'correlativo', 'id_naturaliza_incidente', 'id_requerimiento_trabajo_24h'], 'default', 'value' => null],
            [['id_estado', 'cedula_supervisor_60min', 'id_estatus_proceso', 'id_region', 'cedula_reporta', 'cedula_pers_accide', 'cedula_validad_60min', 'id_magnitud', 'id_tipo_accidente', 'id_tipo_trabajo', 'id_peligro_agente', 'id_sujeto_afectacion', 'id_afecta_bienes_perso', 'cedula_24horas', 'cedula_valid_24horas', 'id_gerencia', 'anno', 'correlativo', 'id_naturaliza_incidente', 'id_requerimiento_trabajo_24h'], 'integer'],
            [['fecha_hora', 'created_at', 'updated_at'], 'safe'],
            [['lugar', 'nro_accidente', 'observaciones_60min', 'acciones_tomadas_60min', 'acciones_tomadas_24horas', 'observaciones_24horas', 'recomendaciones_24horas', 'descripcion_accidente_60min', 'recomendaciones_60m', 'ocurrencia_hecho_60m', 'acciones_tomadas_24h', 'observaciones_24h', 'validado_por_24h'], 'string'],
            [['autorizado_60m', 'autorizado_24horas', 'cumple_regla_oro'], 'boolean'],
            [['id_afecta_bienes_perso'], 'exist', 'skipOnError' => true, 'targetClass' => AfectacionBienesProcesos::class, 'targetAttribute' => ['id_afecta_bienes_perso' => 'id_afec_bien_pro']],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::class, 'targetAttribute' => ['id_estado' => 'id_estado']],
            [['id_estatus_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => Estatus::class, 'targetAttribute' => ['id_estatus_proceso' => 'id_estatus']],
            [['id_requerimiento_trabajo_24h'], 'exist', 'skipOnError' => true, 'targetClass' => Estatus::class, 'targetAttribute' => ['id_requerimiento_trabajo_24h' => 'id_estatus']],
            [['id_gerencia'], 'exist', 'skipOnError' => true, 'targetClass' => Gerencia::class, 'targetAttribute' => ['id_gerencia' => 'id_gerencia']],
            [['id_magnitud'], 'exist', 'skipOnError' => true, 'targetClass' => Magnitud::class, 'targetAttribute' => ['id_magnitud' => 'id_magnitud']],
            [['id_naturaliza_incidente'], 'exist', 'skipOnError' => true, 'targetClass' => NaturalezaAccidente::class, 'targetAttribute' => ['id_naturaliza_incidente' => 'id_naturaleza_accidente']],
            [['cedula_supervisor_60min'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['cedula_supervisor_60min' => 'ci']],
            [['cedula_reporta'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['cedula_reporta' => 'ci']],
            [['cedula_pers_accide'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['cedula_pers_accide' => 'ci']],
            [['cedula_validad_60min'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['cedula_validad_60min' => 'ci']],
            [['cedula_24horas'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['cedula_24horas' => 'ci']],
            [['cedula_valid_24horas'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['cedula_valid_24horas' => 'ci']],
            [['id_region'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::class, 'targetAttribute' => ['id_region' => 'id_regiones']],
            [['id_sujeto_afectacion'], 'exist', 'skipOnError' => true, 'targetClass' => SujetoAfectacion::class, 'targetAttribute' => ['id_sujeto_afectacion' => 'id_sujeto_afect']],
            [['id_tipo_accidente'], 'exist', 'skipOnError' => true, 'targetClass' => TipoAccidente::class, 'targetAttribute' => ['id_tipo_accidente' => 'id_tipo_accidente']],
            [['id_tipo_trabajo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoTrabajo::class, 'targetAttribute' => ['id_tipo_trabajo' => 'id_tipo_trabajo']],
            [['id_tipo_trabajo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoTrabajo::class, 'targetAttribute' => ['id_tipo_trabajo' => 'id_tipo_trabajo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_registro' => 'Id Registro',
            'id_estado' => 'Id Estado',
            'fecha_hora' => 'Fecha Hora',
            'lugar' => 'Lugar',
            'nro_accidente' => 'Nro Accidente',
            'cedula_supervisor_60min' => 'Cedula Supervisor 60min',
            'observaciones_60min' => 'Observaciones 60min',
            'autorizado_60m' => 'Autorizado 60m',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'id_estatus_proceso' => 'Id Estatus Proceso',
            'id_region' => 'Id Region',
            'acciones_tomadas_60min' => 'Acciones Tomadas 60min',
            'cedula_reporta' => 'Cedula Reporta',
            'cedula_pers_accide' => 'Cedula Pers Accide',
            'cedula_validad_60min' => 'Cedula Validad 60min',
            'id_magnitud' => 'Id Magnitud',
            'id_tipo_accidente' => 'Id Tipo Accidente',
            'id_tipo_trabajo' => 'Id Tipo Trabajo',
            'id_peligro_agente' => 'Id Peligro Agente',
            'id_sujeto_afectacion' => 'Id Sujeto Afectacion',
            'id_afecta_bienes_perso' => 'Id Afecta Bienes Perso',
            'cedula_24horas' => 'Cedula 24horas',
            'acciones_tomadas_24horas' => 'Acciones Tomadas 24horas',
            'observaciones_24horas' => 'Observaciones 24horas',
            'recomendaciones_24horas' => 'Recomendaciones 24horas',
            'autorizado_24horas' => 'Autorizado 24horas',
            'cedula_valid_24horas' => 'Cedula Valid 24horas',
            'descripcion_accidente_60min' => 'Descripcion Accidente 60min',
            'id_gerencia' => 'Id Gerencia',
            'recomendaciones_60m' => 'Recomendaciones 60m',
            'anno' => 'Anno',
            'correlativo' => 'Correlativo',
            'id_naturaliza_incidente' => 'Id Naturaliza Incidente',
            'ocurrencia_hecho_60m' => 'Ocurrencia Hecho 60m',
            'acciones_tomadas_24h' => 'Acciones Tomadas 24h',
            'observaciones_24h' => 'Observaciones 24h',
            'validado_por_24h' => 'Validado Por 24h',
            'id_requerimiento_trabajo_24h' => 'Id Requerimiento Trabajo 24h',
            'cumple_regla_oro' => 'Cumple Regla Oro',
        ];
    }

    /**
     * Gets query for [[AfectaBienesPerso]].
     *
     * @return \yii\db\ActiveQuery|AfectacionbienesprocesosQuery
     */
    public function getAfectaBienesPerso()
    {
        return $this->hasOne(AfectacionBienesProcesos::class, ['id_afec_bien_pro' => 'id_afecta_bienes_perso']);
    }

    /**
     * Gets query for [[Cedula24horas]].
     *
     * @return \yii\db\ActiveQuery|PersonalQuery
     */
    public function getCedula24horas()
    {
        return $this->hasOne(Personal::class, ['ci' => 'cedula_24horas']);
    }

    /**
     * Gets query for [[CedulaPersAccide]].
     *
     * @return \yii\db\ActiveQuery|PersonalQuery
     */
    public function getCedulaPersAccide()
    {
        return $this->hasOne(Personal::class, ['ci' => 'cedula_pers_accide']);
    }

    /**
     * Gets query for [[CedulaReporta]].
     *
     * @return \yii\db\ActiveQuery|PersonalQuery
     */
    public function getCedulaReporta()
    {
        return $this->hasOne(Personal::class, ['ci' => 'cedula_reporta']);
    }

    /**
     * Gets query for [[CedulaSupervisor60min]].
     *
     * @return \yii\db\ActiveQuery|PersonalQuery
     */
    public function getCedulaSupervisor60min()
    {
        return $this->hasOne(Personal::class, ['ci' => 'cedula_supervisor_60min']);
    }

    /**
     * Gets query for [[CedulaValid24horas]].
     *
     * @return \yii\db\ActiveQuery|PersonalQuery
     */
    public function getCedulaValid24horas()
    {
        return $this->hasOne(Personal::class, ['ci' => 'cedula_valid_24horas']);
    }

    /**
     * Gets query for [[CedulaValidad60min]].
     *
     * @return \yii\db\ActiveQuery|PersonalQuery
     */
    public function getCedulaValidad60min()
    {
        return $this->hasOne(Personal::class, ['ci' => 'cedula_validad_60min']);
    }

    /**
     * Gets query for [[Estado]].
     *
     * @return \yii\db\ActiveQuery|EstadosQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estados::class, ['id_estado' => 'id_estado']);
    }

    /**
     * Gets query for [[EstatusProceso]].
     *
     * @return \yii\db\ActiveQuery|EstatusQuery
     */
    public function getEstatusProceso()
    {
        return $this->hasOne(Estatus::class, ['id_estatus' => 'id_estatus_proceso']);
    }

    /**
     * Gets query for [[Gerencia]].
     *
     * @return \yii\db\ActiveQuery|GerenciaQuery
     */
    public function getGerencia()
    {
        return $this->hasOne(Gerencia::class, ['id_gerencia' => 'id_gerencia']);
    }

    /**
     * Gets query for [[Magnitud]].
     *
     * @return \yii\db\ActiveQuery|MagnitudQuery
     */
    public function getMagnitud()
    {
        return $this->hasOne(Magnitud::class, ['id_magnitud' => 'id_magnitud']);
    }

    /**
     * Gets query for [[NaturalizaIncidente]].
     *
     * @return \yii\db\ActiveQuery|NaturalezaaccidenteQuery
     */
    public function getNaturalizaIncidente()
    {
        return $this->hasOne(NaturalezaAccidente::class, ['id_naturaleza_accidente' => 'id_naturaliza_incidente']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery|RegionesQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regiones::class, ['id_regiones' => 'id_region']);
    }

    /**
     * Gets query for [[RequerimientoTrabajo24h]].
     *
     * @return \yii\db\ActiveQuery|EstatusQuery
     */
    public function getRequerimientoTrabajo24h()
    {
        return $this->hasOne(Estatus::class, ['id_estatus' => 'id_requerimiento_trabajo_24h']);
    }

    /**
     * Gets query for [[SujetoAfectacion]].
     *
     * @return \yii\db\ActiveQuery|SujetoafectacionQuery
     */
    public function getSujetoAfectacion()
    {
        return $this->hasOne(SujetoAfectacion::class, ['id_sujeto_afect' => 'id_sujeto_afectacion']);
    }

    /**
     * Gets query for [[TipoAccidente]].
     *
     * @return \yii\db\ActiveQuery|TipoaccidenteQuery
     */
    public function getTipoAccidente()
    {
        return $this->hasOne(TipoAccidente::class, ['id_tipo_accidente' => 'id_tipo_accidente']);
    }

    /**
     * Gets query for [[TipoTrabajo]].
     *
     * @return \yii\db\ActiveQuery|TipotrabajoQuery
     */
    public function getTipoTrabajo()
    {
        return $this->hasOne(TipoTrabajo::class, ['id_tipo_trabajo' => 'id_tipo_trabajo']);
    }

    /**
     * Gets query for [[TipoTrabajo0]].
     *
     * @return \yii\db\ActiveQuery|TipotrabajoQuery
     */
    public function getTipoTrabajo0()
    {
        return $this->hasOne(TipoTrabajo::class, ['id_tipo_trabajo' => 'id_tipo_trabajo']);
    }

    /**
     * {@inheritdoc}
     * @return RegistroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RegistroQuery(get_called_class());
    }
}
