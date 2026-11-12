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

/**
 * Class m181113_130010_aggiunta_codice_catastale_serbia
 * Aggiunta codice catastale Serbia, Repubblica di
 */
class m181113_130010_aggiunta_codice_catastale_serbia extends \yii\db\Migration
{

    private function updateValues($arrayVariazioni) {

        foreach($arrayVariazioni as $istatCodiciCatastali) {
            /**
             * Aggiorno il codice catastale contenuto in $istatCodiciCatastali[1]
             * per ogni comune con codice istat (id) contenuto in $istatCodiciCatastali[0]
             */
            $this->update('istat_nazioni', ['codice_catastale' => $istatCodiciCatastali[1]], ['id' => $istatCodiciCatastali[0]]);
        }

    }

    public function safeUp()
    {
        $this->updateValues([
            ["271","Z158"],
        ]);
        return true;
    }

    public function safeDown()
    {
        echo "m181113_130010_aggiunta_codice_catastale_serbia cannot be reverted";
        return true;
    }

}