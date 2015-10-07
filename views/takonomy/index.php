<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TakonomySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Takonomies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="takonomy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Takonomy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'category_id',
            'name',
            'url_alias:url',
            // 'thumb',
            // 'description',
            // 'contents',
            // 'sort_num',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
