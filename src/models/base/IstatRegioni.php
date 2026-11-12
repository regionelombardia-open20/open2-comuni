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
 * This is the base-model class for table "istat_regioni".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $istat_nazioni_id
 *
 * @property \open20\amos\comuni\models\IstatComuni[] $istatComunis
 * @property \open20\amos\comuni\models\IstatProvince[] $istatProvinces
 * @property \open20\amos\comuni\models\IstatNazioni $istatNazioni
 */
class IstatRegioni extends \open20\amos\core\record\Record
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'istat_regioni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nome'], 'required'],
            [['id', 'istat_nazioni_id'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['istat_nazioni_id'], 'exist', 'skipOnError' => true, 'targetClass' => IstatNazioni::className(), 'targetAttribute' => ['istat_nazioni_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => AmosComuni::t('amoscomuni', 'Codice Istat'),
            'nome' => AmosComuni::t('amoscomuni', 'Regione'),
            'istat_nazioni_id' => AmosComuni::t('amoscomuni', 'Istat Nazioni ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstatComunis()
    {
        return $this->hasMany(\open20\amos\comuni\models\IstatComuni::className(), ['istat_regioni_id' => 'id'])->inverseOf('istatRegioni');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstatProvinces()
    {
        return $this->hasMany(\open20\amos\comuni\models\IstatProvince::className(), ['istat_regioni_id' => 'id'])->inverseOf('istatRegioni');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstatNazioni()
    {
        return $this->hasOne(\open20\amos\comuni\models\IstatNazioni::className(), ['id' => 'istat_nazioni_id'])->inverseOf('istatRegionis');
    }
}
