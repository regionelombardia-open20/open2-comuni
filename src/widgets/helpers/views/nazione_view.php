<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\comuni\widgets\helpers\views
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

use open20\amos\comuni\models\IstatNazioni;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/**
 * @var \open20\amos\comuni\widgets\helpers\AmosComuniWidget $widget
 * @var \open20\amos\core\forms\ActiveForm $form
 * @var \open20\amos\core\record\Record $model
 * @var array $nazioneConfig
 * @var array $provinciaConfig
 * @var array $comuneConfig
 * @var array $capConfig
 * @var string $colMdRow
 */

$nazioneAttribute = $nazioneConfig['attribute'];
$provinciaAttribute = $provinciaConfig['attribute'];
$comuneAttribute = $comuneConfig['attribute'];
$capAttribute = $capConfig['attribute'];

//id del campo: se specificato nelle option uso quello, altrimenti sarà nel formato 'campo_db-id'
$id = isset($nazioneConfig['options']['id'])
    ? $nazioneConfig['options']['id']
    : $widget->generateFieldId($model, $nazioneAttribute);

$provincia_id = isset($provinciaConfig['options']['id'])
    ? $provinciaConfig['options']['id']
    : $widget->generateFieldId($model, $provinciaAttribute);

$comune_id = isset($comuneConfig['options']['id'])
    ? $comuneConfig['options']['id']
    : $widget->generateFieldId($model, $comuneAttribute);

$cap_id = isset($capConfig['options']['id'])
    ? $capConfig['options']['id']
    : $widget->generateFieldId($model, $capAttribute);

$label = isset($nazioneConfig['options']['label']) ? $nazioneConfig['options']['label'] : null;
$divId = isset($nazioneConfig['options']['divId']) ? $nazioneConfig['options']['divId'] : null;
$style = isset($nazioneConfig['options']['style']) ? $nazioneConfig['options']['style'] : null;
?>

<div class="<?= isset($nazioneConfig['class']) ? $nazioneConfig['class'] : 'col-md-' . $colMdRow; ?>" id="<?= $divId ?>" style="<?= $style ?>">
    <!-- nazione italia attiva la provincia -->
    <?= $form->field($model, $nazioneAttribute)->widget(Select2::classname(), [
        'data' => ArrayHelper::map(
            IstatNazioni::find()->orderBy('nome')->asArray()->all(),
            'id', 'nome'
        ),
        'options' => array_merge([
                'placeholder' => Yii::t('amoscomuni', '#select_country_placeholder'),
                'id' => $id,
            ],
            !empty($nazioneConfig['options']) ? $nazioneConfig['options'] : []
        ),
        'pluginOptions' => array_merge([
                'allowClear' => true
            ],
            !empty($nazioneConfig['pluginOptions']) ? $nazioneConfig['pluginOptions'] : []
        ),
    ])->label($label); ?>
    <?php
    $script = <<< JS
    setTimeout( function(){
        cleanSelectByNazione( $("#{$id}").val(), "{$provincia_id}", "{$comune_id}", "{$cap_id}"  );
        
        $("#{$id}").on('change', function(){
            cleanSelectByNazione( $(this).val(), "{$provincia_id}", "{$comune_id}", "{$cap_id}"  );
        });
        
    }, 150);
JS;
    $this->registerJs($script);
    ?>
</div>
