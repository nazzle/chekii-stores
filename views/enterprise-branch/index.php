<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EnterpriseBranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enterprise Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-branch-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Enterprise Branch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'name',
            'address:ntext',
            'phone',
            //'email:email',
            //'enterprise_id',
            //'status',
            //'updated_by',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, EnterpriseBranch $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
