<?php

use lispa\amos\core\helpers\Html;
use lispa\amos\core\forms\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use lispa\amos\core\forms\Tabs;
use lispa\amos\core\forms\CloseSaveButtonWidget;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use lispa\amos\comuni\AmosComuni;

/**
 * @var yii\web\View $this
 * @var lispa\amos\comuni\models\IstatComuni $model
 * @var yii\widgets\ActiveForm $form
 */


?>

<div class="istat-comuni-form col-xs-12 nop">

    <?php $form = ActiveForm::begin(); ?>




    <?php $this->beginBlock('principale'); ?>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'progressivo')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'nome_tedesco')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'cod_ripartizione_geografica')->textInput() ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'ripartizione_geografica')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'comune_capoluogo_provincia')->textInput() ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'cod_istat_alfanumerico')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'codice_2006_2009')->textInput() ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'codice_1995_2005')->textInput() ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'codice_catastale')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'popolazione_20111009')->textInput() ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'codice_nuts1_2010')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'codice_nuts2_2010')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'codice_nuts3_2010')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'codice_nuts1_2006')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'codice_nuts2_2006')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'codice_nuts3_2006')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'soppresso')->textInput() ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
        $form->field($model, 'istat_unione_dei_comuni_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(lispa\amos\comuni\models\IstatUnioneDeiComuni::find()->orderBy('nome')->all(), 'id', 'nome'),
            ['prompt' => 'Select']
        ); ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
        $form->field($model, 'istat_regioni_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(lispa\amos\comuni\models\IstatRegioni::find()->orderBy('nome')->all(), 'id', 'nome'),
            ['prompt' => 'Select']
        ); ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
        $form->field($model, 'istat_province_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(lispa\amos\comuni\models\IstatProvince::find()->orderBy('nome')->all(), 'id', 'nome'),
            ['prompt' => 'Select']
        ); ?>
    </div>
    <div class="clearfix"></div>
    <?php $this->endBlock('principale'); ?>

    <?php $itemsTab[] = [
        'label' => AmosComuni::t('amoscomuni', 'Principale '),
        'content' => $this->blocks['principale'],
    ];
    ?>

    <?= Tabs::widget(
        [
            'encodeLabels' => false,
            'items' => $itemsTab
        ]
    );
    ?>
    <?= CloseSaveButtonWidget::widget(['model' => $model]); ?>
    <?php ActiveForm::end(); ?>
</div>
