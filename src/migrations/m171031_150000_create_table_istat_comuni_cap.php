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

/**
 * Handles the creation for table `post`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `category`
 */
class m171031_150000_create_table_istat_comuni_cap extends \yii\db\Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('istat_comuni_cap', [
            'id' => $this->primaryKey(),
            'comune_id' => $this->integer()->notNull(),
            'cap' => $this->string()->notNull(),
            'sospeso' => $this->string(),
        ]);

        // creates index for column `comune_id`
        $this->createIndex(
            'idx-istat-comuni-cap-comune_id',
            'istat_comuni_cap',
            'comune_id'
        );

        // add foreign key for table `istat_comuni`
        $this->addForeignKey(
            'fk-istat-comuni-cap-comune_id',
            'istat_comuni_cap',
            'comune_id',
            'istat_comuni',
            'id',
            'NO ACTION',
            'NO ACTION'
        );

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        //drops index for column `author_id`
        $this->dropIndex(
            'idx-istat-comuni-cap-comune_id',
            'istat_comuni_cap'
        );
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-istat-comuni-cap-comune_id',
            'istat_comuni_cap'
        );

        $this->dropTable('istat_comuni_cap');

    }
}