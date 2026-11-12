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
use open20\amos\comuni\models\IstatComuni;
use open20\amos\core\forms\editors\Select;
use yii\helpers\ArrayHelper;

//id del campo: se specificato nelle option uso quello, altrimenti sarà nel formato 'campo_db-id'
$comuneAttribute = $comuneConfig['attribute'];
$id = isset($comuneConfig['options']['id']) ? $comuneConfig['options']['id'] : $comuneAttribute.'-id';

?>

<div class="<?= isset($comuneConfig['class']) ? $comuneConfig['class'] : 'col-md-' . $colMdRow;?>">
    <?= $form->field($model, 'commune_id')->widget(Select::classname(), [
        'options' =>  array_merge(
            [
                'id' => $id,
                'placeholder' => AmosComuni::t('amoscomuni', '#select_commune_placeholder'),
            ], !empty($comuneConfig['options']) ? $comuneConfig['options'] : []
        ),
        'pluginOptions' => array_merge(
            [
                'allowClear' => true
            ], !empty($comuneConfig['pluginOptions']) ? $comuneConfig['pluginOptions'] : []
        ),
        'data' => ArrayHelper::map(IstatComuni::find()->orderBy('nome')->asArray()->all(), 'id', 'nome')
    ]); ?>
</div>


