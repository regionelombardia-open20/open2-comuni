<?php
/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos-comuni
 * @author    Aria S.p.A. <protocollo@pec.ariaspa.it>
 * @license   GNU General Public License v3.0 <https://www.gnu.org/licenses/gpl-3.0.html>
 * @link      https://www.ariaspa.it/
 *
 * This file is part of OPEN 2.0.
 *
 * OPEN 2.0 is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OPEN 2.0 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OPEN 2.0. If not, see <https://www.gnu.org/licenses/>.
 */

use open20\amos\core\helpers\Html;
use open20\amos\core\forms\ActiveForm;
use kartik\builder\Form;
use open20\amos\core\forms\Tabs;
use open20\amos\core\forms\CloseSaveButtonWidget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


$this->title = Yii::t('cruds', 'Aggiorna COMUNI');
$this->params['breadcrumbs'][] = ['label'=>'comuni', 'url'=>'/comuni'];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php //$form = ActiveForm::begin(); ?>
<?php echo $form = \yii\helpers\Html::beginForm('','post'); ?>
<?php
/*$this->beginBlock('principale');

$this->endBlock('principale');
$itemsTab[] = [
    'label' => '',
    'content' => $this->blocks['principale'],
];*/
?>

<?php
/*echo Tabs::widget(
    [
        'encodeLabels' => false,
        'items' => $itemsTab
    ]
);*/
?>

<?php echo Html::input('hidden', 'confirm', true); ?>


<legend>Dati che andrebbero inseriti: (totale: <?= count($dati['new']);?>)</legend>

<div class="row">
    <div class="col-xs-3"><strong>Comune Nome</strong></div>
    <div class="col-xs-3"><strong>Codice ISTAT</strong></div>
    <div class="col-xs-3"><strong>Regione</strong></div>
    <div class="col-xs-3"><strong>Provincia</strong></div>
</div>


<?php
if( empty($dati['new'])): ?>
    <div class="row"><div class="col-xs-4">Nessun comune da inserire</div></div>
<?php
else:

    foreach ( $dati['new'] as $k => $array_data ): ?>
        <div class="row">
            <div class="col-xs-3"><?= $array_data['comuneArray'][5]; ?></div>
            <div class="col-xs-3"><?= $array_data['comuneArray'][4]; ?></div>
            <div class="col-xs-3"><?= $array_data['comuneArray'][9]; ?></div>
            <div class="col-xs-3"><?= $array_data['comuneArray'][11]; ?></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="floatclear"></div>

<legend>Dati che andrebbero aggiornati: (totale: <?= count($dati['update']);?>)</legend>

<div class="row">
    <div class="col-xs-3"><strong>Comune Nome</strong></div>
    <div class="col-xs-3"><strong>Codice ISTAT</strong></div>
    <div class="col-xs-3"><strong>Nuovo Nome</strong></div>
</div>


<?php
if( empty($dati['update'])): ?>
    <div class="row"><div class="col-xs-4">Nessun nome comune da aggiornare</div></div>
    <?php
else:

    foreach ( $dati['update'] as $k => $array_data ): ?>
        <div class="row">
            <div class="col-xs-3"><?= $array_data['comuneArray']['nome']; ?></div>
            <div class="col-xs-3"><?= $array_data['comuneArray']['cod_istat_alfanumerico']; ?></div>
            <div class="col-xs-3"><?= $array_data['nuovo_nome']; ?></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>





<div class="m-t-30">

    <?php
    if( !empty($dati)):
        echo Html::submitButton('Genera', ['name'=> 'submit', 'value'=> true, 'class' => 'btn btn-primary'] );
    endif; ?>
    <?php //ActiveForm::end(); ?>
    <?php \yii\helpers\Html::endForm(); ?>

</div>


