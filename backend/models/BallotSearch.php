<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ballot;

/**
 * BallotSearch represents the model behind the search form about `common\models\Ballot`.
 */
class BallotSearch extends Ballot
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'create_user_id', 'category_id', 'status'], 'integer'],
            [['code', 'name', 'description', 'description_long', 'created_at', 'updated_at', 'start_at', 'finish_at', 'visible_from'], 'safe'],
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
        $query = Ballot::find();

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
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'create_user_id' => $this->create_user_id,
            'start_at' => $this->start_at,
            'finish_at' => $this->finish_at,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'visible_from' => $this->visible_from,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'description_long', $this->description_long]);

        return $dataProvider;
    }
}
