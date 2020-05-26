<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    Open20Package
 * @category   CategoryName
 */

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var open20\amos\comuni\models\IstatRegioni $model
 */

$this->title = 'Aggiorna Istat Regioni';
$this->params['breadcrumbs'][] = ['label' => 'Istat Regioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aggiorna';
?>
<div class="istat-regioni-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
