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
 * This is the base-model class for table "istat_comuni_cap".
 *
    * @property integer $id
    * @property integer $comune_id
    * @property string $cap
    * @property string $sospeso
    *
    * @property \app\models\IstatComuni $comune
    */

    class IstatComuniCap extends \open20\amos\core\record\Record
    {


        /**
         * @inheritdoc
         */
        public static function tableName()
        {
            return 'istat_comuni_cap';
        }

        /**
         * @inheritdoc
         */
        public function rules()
        {
            return [
                [['comune_id','cap'],'required'],
                [['comune_id'], 'integer'],
                [['cap', 'sospeso'], 'string', 'max' => 255],
                [['comune_id'], 'exist', 'skipOnError' => true, 'targetClass' => IstatComuni::className(), 'targetAttribute' => ['comune_id' => 'id']],
            ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels()
        {
            return [
                'id' => Yii::t('app', 'ID'),
                'comune_id' => Yii::t('app', 'Comune ID'),
                'cap' => Yii::t('app', 'Cap'),
                'sospeso' => Yii::t('app', 'Sospeso'),
            ];
        }

        /**
        * @return \yii\db\ActiveQuery
        */
        public function getComune()
        {
            return $this->hasOne(\open20\amos\comuni\models\IstatComuni::className(), ['id' => 'comune_id']);
        }

}
