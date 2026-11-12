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
?>
<div class="<?= isset($capConfig['class']) ? $capConfig['class'] : 'col-md-' . $colMdRow; ?>">
    <?php
    //id del campo: se specificato nelle option uso quello, altrimenti sarà nel formato 'campo_db-id'
    $id = isset($capConfig['options']['id']) ? $capConfig['options']['id'] : $capConfig['attribute'] . '-id';
    $id_comune = isset($comuneConfig['options']['id']) ? $comuneConfig['options']['id'] : $comuneConfig['attribute'] . '-id';

    $label = isset($capConfig['options']['label']) ? $capConfig['options']['label'] : null;
    $divId = isset($capConfig['options']['divId']) ? $capConfig['options']['divId'] : null;
    $style = isset($nazioneConfig['options']['style']) ? $nazioneConfig['options']['style'] : null;

    echo $form->field($model, $capConfig['attribute'])->widget(\kartik\depdrop\DepDrop::classname(), [
        'type' => \kartik\depdrop\DepDrop::TYPE_SELECT2,
        'data' => \yii\helpers\ArrayHelper::map(\open20\amos\comuni\models\IstatComuniCap::find()->andWhere(['comune_id' => $model->{$comuneConfig['attribute']}])->orderBy('cap')->asArray()->all(), 'id', 'cap'),
        'options' => array_merge(
            [
                'id' => $id,
            ], !empty($capConfig['options']) ? $capConfig['options'] : []
        ),
        'select2Options' => array_merge(
            [
                'pluginOptions' => ['allowClear' => true]
            ], !empty($capConfig['select2Options']) ? $capConfig['select2Options'] : []
        ),
        'pluginOptions' => array_merge(
            [
                'depends' => [$id_comune],
                'initDepends' => $id_comune,
                'placeholder' => Yii::t('app', 'Digita il cap ...'),
                'url' => \yii\helpers\Url::to(['/comuni/default/caps-by-comune']),
                'params' => [$id],
            ], !empty($capConfig['pluginOptions']) ? $capConfig['pluginOptions'] : []
        ),
        'pluginEvents' => [
            //il change viene chiamato al cambio del padre: comune
            "depdrop:afterChange" => "function(event, id, value, count) { 
                clearValueIfParentEmpty($(this));
            }",
        ],
    ])->label($label);

    ?>
</div>
