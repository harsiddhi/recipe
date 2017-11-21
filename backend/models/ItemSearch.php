<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Item;

/**
 * ItemSearch represents the model behind the search form about `backend\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'categoty_id'], 'integer'],
            [['item_name', 'item_description', 'item_process', 'item_photo'], 'safe'],
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
        $query = Item::find();

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
            'item_id' => $this->item_id,
            //'item_time' => $this->item_time,
            'categoty_id' => $this->categoty_id,
        ]);

        $query->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'item_description', $this->item_description])
            ->andFilterWhere(['like', 'item_process', $this->item_process])
            ->andFilterWhere(['like', 'item_photo', $this->item_photo])
            ->andFilterWhere(['!=', 'categoty_id', '2']);

        return $dataProvider;
    }



    public function search1($params)
    {
        $query = Item::find();

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
            'item_id' => $this->item_id,
            //'item_time' => $this->item_time,
            'categoty_id' => $this->categoty_id,
        ]);

        $query->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'item_description', $this->item_description])
            ->andFilterWhere(['like', 'item_process', $this->item_process])
            ->andFilterWhere(['like', 'item_photo', $this->item_photo])
            ->andFilterWhere(['=', 'categoty_id', '2']);

        return $dataProvider;
    }
    
    
}
