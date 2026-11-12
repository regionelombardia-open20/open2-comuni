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

echo "<?php\n";
?>

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\comuni
 * @category   CategoryName
 */


use yii\db\Schema;

/**
* Class <?= $migrationName; ?>
*/
class <?= $migrationName; ?> extends \yii\db\Migration {

    public function safeUp() {
    <?php foreach ($new_data as $k => $array_update ): ?>
    $this->update(
            "<?= $table_name; ?>",
                [<?php foreach ($array_update['columns'] as $nome_campo => $valore_campo ){?> "<?=$nome_campo;?>" => "<?=$valore_campo;?>", <?php }?> ],
                [<?php foreach ($array_update['conditions'] as $nome_campo_cond => $valore_campo_cond ){?> "<?=$nome_campo_cond;?>" => "<?=$valore_campo_cond;?>", <?php }?> ]
            );
        <?php endforeach; ?>
    }

    public function safeDown() {
    <?php foreach ($restore_data as $k => $array_restore ): ?>
        $this->update(
            "<?= $table_name; ?>",
            [<?php foreach ($array_restore['columns'] as $nome_campo => $valore_campo ){?> "<?=$nome_campo;?>" => "<?=$valore_campo;?>", <?php }?> ],
            [<?php foreach ($array_restore['conditions'] as $nome_campo_cond => $valore_campo_cond ){?> "<?=$nome_campo_cond;?>" => "<?=$valore_campo_cond;?>", <?php }?> ]
        );
    <?php endforeach; ?>
    }
}