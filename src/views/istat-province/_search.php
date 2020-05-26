<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    Open20Package
 * @category   CategoryName
 */

use open20\amos\core\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var open20\amos\comuni\models\search\IstatProvinceSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="istat-province-search element-to-toggle" data-toggle-element="form-search">
    <div class="col-xs-12"><h2>Cerca per:</h2></div>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'default-form'
        ]
    ]); ?>

    <div class="col-sm-6 col-lg-4">    <?= $form->field($model, 'id') ?></div>
    <div class="col-sm-6 col-lg-4">    <?= $form->field($model, 'nome') ?></div>
    <div class="col-sm-6 col-lg-4">    <?= $form->field($model, 'sigla') ?></div>
    <div class="col-sm-6 col-lg-4">    <?= $form->field($model, 'capoluogo') ?></div>
    <div class="col-sm-6 col-lg-4">    <?= $form->field($model, 'soppressa') ?></div> <?php // echo $form->field($model, 'istat_citta_metropolitane_id') ?>

    <?php // echo $form->field($model, 'istat_regioni_id') ?>

    <div class="col-xs-12">
        <div class="pull-right">
            <?= Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
            <?= Html::submitButton('Search', ['class' => 'btn btn-navigation-primary']) ?>
        </div>
    </div>

    <div class="clearfix"></div>
    <!--a><p class="text-center">Ricerca avanzata<br>
                < ?=AmosIcons::show('caret-down-circle');?>
            </p></a-->
    <?php ActiveForm::end(); ?>

</div>
