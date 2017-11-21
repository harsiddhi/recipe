<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\Photo;

/**
 * PhotoSearch represents the model behind the search form about `backend\modules\settings\models\Photo`.
 */
class PhotoSearch extends Photo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'p_id'], 'integer'],
            [['p_name', 'p_photo'], 'safe'],
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
        $query = Photo::find();

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
            'id' => $this->id,
            'p_id' => $this->p_id,
        ]);

        $query->andFilterWhere(['like', 'p_name', $this->p_name])
            ->andFilterWhere(['like', 'p_photo', $this->p_photo]);

        return $dataProvider;
    }
}
