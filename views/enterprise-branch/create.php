<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EnterpriseBranch */

$this->title = 'Create Enterprise Branch';
$this->params['breadcrumbs'][] = ['label' => 'Enterprise Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-branch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
