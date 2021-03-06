<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Content;

/**
 * ContentSearch represents the model behind the search form about `app\models\Content`.
 */
class ContentSearch extends Content
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'takonomy_id', 'user_id', 'last_user_id', 'created_at', 'updated_at', 'focus_count', 'favorite_count', 'view_count', 'comment_count', 'agree_count', 'against_count', 'is_sticky', 'is_recommend', 'is_headline', 'flag', 'allow_comment', 'sort_num', 'visibility', 'status'], 'integer'],
            [['user_name', 'last_user_name', 'password', 'template', 'content_type', 'seo_title', 'seo_keywords', 'seo_description', 'title', 'summary', 'thumb', 'url_alias'], 'safe'],
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
        $query = Content::find();

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
            'takonomy_id' => $this->takonomy_id,
            'user_id' => $this->user_id,
            'last_user_id' => $this->last_user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'focus_count' => $this->focus_count,
            'favorite_count' => $this->favorite_count,
            'view_count' => $this->view_count,
            'comment_count' => $this->comment_count,
            'agree_count' => $this->agree_count,
            'against_count' => $this->against_count,
            'is_sticky' => $this->is_sticky,
            'is_recommend' => $this->is_recommend,
            'is_headline' => $this->is_headline,
            'flag' => $this->flag,
            'allow_comment' => $this->allow_comment,
            'sort_num' => $this->sort_num,
            'visibility' => $this->visibility,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'last_user_name', $this->last_user_name])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'template', $this->template])
            ->andFilterWhere(['like', 'content_type', $this->content_type])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_keywords', $this->seo_keywords])
            ->andFilterWhere(['like', 'seo_description', $this->seo_description])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'url_alias', $this->url_alias]);

        return $dataProvider;
    }
}
