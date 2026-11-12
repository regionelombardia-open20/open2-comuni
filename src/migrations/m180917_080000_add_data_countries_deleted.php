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

use open20\amos\core\migration\AmosMigrationPermissions;


/**
 * Class m180917_080000_add_data_countries_deleted*/
class m180917_080000_add_data_countries_deleted extends AmosMigrationPermissions
{
    public function safeUp() {

        $this->batchInsert(
            "istat_nazioni",
            [ 'id',  'nome',  'nome_inglese',  'codice_catastale',  'istat_continenti_id', 'data_soppressione', 'soppressa'],
            [
                [ '2000061',  'Hong Kong',  'Hong Kong',  'Z221',  3, '1997-07-01', 1],
            ]
        );

        return true;

    }

    public function safeDown() {

        /**
         * This will remove all data and columns inserted above
         */

            $this->delete(
                "istat_nazioni",
                [ "id" => 2000061 ]
            );

        return true;
    }

}