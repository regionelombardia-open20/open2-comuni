<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\comuni
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

namespace open20\amos\comuni\models\base;

use Yii;
use open20\amos\comuni\AmosComuni;

/**
 * This is the base-model class for table "istat_unione_dei_comuni".
 *
 * @property integer $id
 * @property string $nome
 * @property string $sito
 * @property integer $istat_province_id
 *
 * @property \open20\amos\comuni\models\IstatComuni[] $istatComunis
 * @property \open20\amos\comuni\models\IstatProvince $istatProvince
 */
class IstatUnioneDeiComuni extends \open20\amos\core\record\Record
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'istat_unione_dei_comuni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nome', 'istat_province_id'], 'required'],
            [['id', 'istat_province_id'], 'integer'],
            [['nome', 'sito'], 'string', 'max' => 255],
            [['istat_province_id'], 'exist', 'skipOnError' => true, 'targetClass' => IstatProvince::className(), 'targetAttribute' => ['istat_province_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => AmosComuni::t('amoscomuni', 'Codice Gestione Associata'),
            'nome' => AmosComuni::t('amoscomuni', 'Unione dei comuni'),
            'sito' => AmosComuni::t('amoscomuni', 'Sito web'),
            'istat_province_id' => AmosComuni::t('amoscomuni', 'Provincia'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstatComunis()
    {
        return $this->hasMany(\open20\amos\comuni\models\IstatComuni::className(), ['istat_unione_dei_comuni_id' => 'id'])->inverseOf('istatUnioneDeiComuni');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstatProvince()
    {
        return $this->hasOne(\open20\amos\comuni\models\IstatProvince::className(), ['id' => 'istat_province_id'])->inverseOf('istatUnioneDeiComunis');
    }
}
