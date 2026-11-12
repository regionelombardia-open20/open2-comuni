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

use open20\amos\comuni\AmosComuni;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use kartik\depdrop\DepDrop;

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
?>

<div class="<?= $comuneClass ?>">
    <?= $form->field($model, $comuneAttribute)->widget(DepDrop::class, [
        'type' => DepDrop::TYPE_SELECT2,
        'data' => ArrayHelper::merge(
            ['' => AmosComuni::t('amoscomuni', '#dd_placeholder_city')],
            !empty($dataProviderComuni) ? $dataProviderComuni : []
        ),
        'options' => ArrayHelper::merge(
            [
                'id' => $comune_id,
            ], !empty($comuneConfig['options']) ? $comuneConfig['options'] : []
        ),
        'select2Options' => ArrayHelper::merge(
            [
                'pluginOptions' => ['allowClear' => true]
            ], !empty($comuneConfig['select2Options']) ? $comuneConfig['select2Options'] : []
        ),
        'pluginOptions' => ArrayHelper::merge(
            [
                'depends' => [$nazione_id, $provincia_id],
                'placeholder' => AmosComuni::t('amoscomuni', '#dd_placeholder_city'),
                
                'url' => Url::to(['/comuni/default/comuni-by-provincia?soppresso=0']),
                'params' => [$id],
            ], !empty($comuneConfig['pluginOptions']) ? $comuneConfig['pluginOptions'] : []
        ),
        'pluginEvents' => [
            //il change viene chiamato al cambio del padre: provincia
            "depdrop:afterChange" => "function(event, id, value, count) { 
                clearValueIfParentEmpty($(this));
             }",
        ],

    ]); ?>
</div>
