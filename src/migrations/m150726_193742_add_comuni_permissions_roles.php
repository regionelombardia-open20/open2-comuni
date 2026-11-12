<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\comuni\migrations
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
use yii\helpers\ArrayHelper;
use yii\rbac\Permission;

/**
 * Class m150726_193742_add_comuni_permissions_roles
 */
class m150726_193742_add_comuni_permissions_roles extends AmosMigrationPermissions
{
    /**
     * @inheritdoc
     */
    protected function setRBACConfigurations()
    {
        return ArrayHelper::merge(
            $this->setPluginRoles(),
            $this->setModelPermissions()/*,
            $this->setWidgetsPermissions()*/
        );
    }
    
    /**
     * Plugin roles.
     * @return array
     */
    private function setPluginRoles()
    {
        return [
            [
                'name' => 'AMMINISTRATORE_COMUNI_ISTAT',
                'type' => Permission::TYPE_ROLE,
                'description' => 'Amministratore del Plugin dei Comuni'
            ]
        ];
    }
    
    /**
     * Model permissions
     * @return array
     */
    private function setModelPermissions()
    {
        return [
            [
                'name' => 'ISTATCOMUNI_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model Comuni',
                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
            ],
            [
                'name' => 'ISTATCOMUNI_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model Comuni',
                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
            ],
            [
                'name' => 'ISTATCOMUNI_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model Comuni',
                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
            ],
            [
                'name' => 'ISTATCOMUNI_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model Comuni',
                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
            ],
            [
                'name' => 'ISTATPROVINCE_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model Province',
                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
            ],
            [
                'name' => 'ISTATPROVINCE_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model Province',
                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
            ],
            [
                'name' => 'ISTATPROVINCE_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model Province',
                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
            ],
            [
                'name' => 'ISTATPROVINCE_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model Province',
                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
            ]
        ];
    }


//    /**
//     * Plugin widgets permissions
//     * @return array
//     */
//    private function setWidgetsPermissions()
//    {
//        return [
//            [
//                'name' => open20\amos\comuni\widgets\icons\WidgetIconAmmComuni::className(),
//                'type' => Permission::TYPE_PERMISSION,
//                'description' => 'Permesso per il widget WidgetIconAmmComuni',
//                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
//            ],
//            [
//                'name' => open20\amos\comuni\widgets\icons\WidgetIconComuni::className(),
//                'type' => Permission::TYPE_PERMISSION,
//                'description' => 'Permesso per il widget WidgetIconComuni',
//                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
//            ],
//            [
//                'name' => open20\amos\comuni\widgets\icons\WidgetIconProvince::className(),
//                'type' => Permission::TYPE_PERMISSION,
//                'description' => 'Permesso per il widget WidgetIconProvince',
//                'parent' => ['AMMINISTRATORE_COMUNI_ISTAT']
//            ]
//        ];
//    }
}
