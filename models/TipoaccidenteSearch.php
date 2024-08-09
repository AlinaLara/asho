<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoAccidente;

/**
 * TipoaccidenteSearch represents the model behind the search form of `app\models\TipoAccidente`.
 */
class TipoaccidenteSearch extends TipoAccidente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipo_accidente', 'id_sub2_tipo_accid', 'id_sub_tipo_accid', 'id_tipo_accid1', 'id_tipo_accid', 'id_estatus'], 'integer'],
            [['descripcion', 'codigo', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TipoAccidente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_tipo_accidente' => $this->id_tipo_accidente,
            'id_sub2_tipo_accid' => $this->id_sub2_tipo_accid,
            'id_sub_tipo_accid' => $this->id_sub_tipo_accid,
            'id_tipo_accid1' => $this->id_tipo_accid1,
            'id_tipo_accid' => $this->id_tipo_accid,
            'id_estatus' => $this->id_estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'descripcion', $this->descripcion])
            ->andFilterWhere(['ilike', 'codigo', $this->codigo]);

        return $dataProvider;
    }
}
