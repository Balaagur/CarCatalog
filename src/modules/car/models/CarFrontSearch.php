<?php

namespace app\modules\car\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\car\models\Car;

/**
 * CarFrontSearch represents the model behind the search form about `app\modules\car\models\Car`.
 */
class CarFrontSearch extends Car
{
    public $categories;
    public $vendors;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vendor_id', 'category_id', 'created_at', 'updated_at'], 'integer'],
            [['model', 'vendors', 'categories'], 'safe'],
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
        $query = Car::find()
            ->with(['vendor', 'category']);

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

        if ($this->vendors) {
            $query->andFilterWhere(['vendor_id' => $this->vendors]);
        }

        if ($this->categories) {
            $query->andFilterWhere(['category_id' => $this->categories]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'vendor_id' => $this->vendor_id,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'photos', $this->photos])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
