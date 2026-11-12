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
use yii\rbac\Permission;


/**
 * Class m171031_160001_add_auth_item_importatore_comuni*/
class m171107_120000_add_provincia_sud_sardegna extends AmosMigrationPermissions
{
    public function safeUp() {
        $this->batchInsert(
            "istat_province",
            [ 'id',  'nome',  'sigla',  'capoluogo',  'soppressa',  'istat_citta_metropolitane_id',  'istat_regioni_id'],
            [[ '111',  'Sud Sardegna',  'SU',  '0',  '0',  NULL,  '20'] ]
        );
    }

    public function safeDown() {
        $this->delete(
            "istat_province",
            [ "id" => "111",  ]
        );
    }
}