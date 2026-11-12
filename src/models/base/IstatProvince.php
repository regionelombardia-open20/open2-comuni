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
 * This is the base-model class for table "istat_province".
 *
 * @property integer $id
 * @property string $nome
 * @property string $sigla
 * @property integer $capoluogo
 * @property integer $soppressa
 * @property integer $istat_citta_metropolitane_id
 * @property integer $istat_regioni_id
 *
 * @property \open20\amos\comuni\models\IstatComuni[] $istatComunis
 * @property \open20\amos\comuni\models\IstatCittaMetropolitane $istatCittaMetropolitane
 * @property \open20\amos\comuni\models\IstatRegioni $istatRegioni
 * @property \open20\amos\comuni\models\IstatUnioneDeiComuni[] $istatUnioneDeiComunis
 */
class IstatProvince extends \open20\amos\core\record\Record
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'istat_province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nome'], 'required'],
            [['id', 'capoluogo', 'soppressa', 'istat_citta_metropolitane_id', 'istat_regioni_id'], 'integer'],
            [['nome', 'sigla'], 'string', 'max' => 255],
            [['istat_citta_metropolitane_id'], 'exist', 'skipOnError' => true, 'targetClass' => IstatCittaMetropolitane::className(), 'targetAttribute' => ['istat_citta_metropolitane_id' => 'id']],
            [['istat_regioni_id'], 'exist', 'skipOnError' => true, 'targetClass' => IstatRegioni::className(), 'targetAttribute' => ['istat_regioni_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => AmosComuni::t('amoscomuni', 'Codice Istat'),
            'nome' => AmosComuni::t('amoscomuni', 'Provincia'),
            'sigla' => AmosComuni::t('amoscomuni', 'Sigla'),
            'capoluogo' => AmosComuni::t('amoscomuni', 'Capoluogo'),
            'soppressa' => AmosComuni::t('amoscomuni', 'Soppressa'),
            'istat_citta_metropolitane_id' => AmosComuni::t('amoscomuni', 'Città Metropolitana'),
            'istat_regioni_id' => AmosComuni::t('amoscomuni', 'Regione'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstatComunis()
    {
        return $this->hasMany(\open20\amos\comuni\models\IstatComuni::className(), ['istat_province_id' => 'id'])->inverseOf('istatProvince');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstatCittaMetropolitane()
    {
        return $this->hasOne(\open20\amos\comuni\models\IstatCittaMetropolitane::className(), ['id' => 'istat_citta_metropolitane_id'])->inverseOf('istatProvinces');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstatRegioni()
    {
        return $this->hasOne(\open20\amos\comuni\models\IstatRegioni::className(), ['id' => 'istat_regioni_id'])->inverseOf('istatProvinces');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstatUnioneDeiComunis()
    {
        return $this->hasMany(\open20\amos\comuni\models\IstatUnioneDeiComuni::className(), ['istat_province_id' => 'id'])->inverseOf('istatProvince');
    }
}
