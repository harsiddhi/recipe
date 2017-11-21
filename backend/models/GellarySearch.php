<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Gellary;

/**
 * GellarySearch represents the model behind the search form about `backend\models\Gellary`.
 */
class GellarySearch extends Gellary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_id', 'item_id'], 'integer'],
            [['photo_path'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Gellary::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'photo_id' => $this->photo_id,
            'item_id' => $this->item_id,
        ]);

        $query->andFilterWhere(['like', 'photo_path', $this->photo_path]);

        return $dataProvider;
    }
}
