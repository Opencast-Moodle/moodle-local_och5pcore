<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Local och5pcore upgrade.
 *
 * @package    local_och5pcore
 * @copyright  2025 Farbod Zamani Boroujeni, ELAN e.V.
 * @author     Farbod Zamani Boroujeni <zamani@elan-ev.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use local_och5pcore\local\opencast_manager;

/**
 * Local och5pcore upgrade.
 *
 * @package    local_och5pcore
 * @copyright  2025 Farbod Zamani Boroujeni, ELAN e.V.
 * @author     Farbod Zamani Boroujeni <zamani@elan-ev.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Function to upgrade local_och5pcore.
 *
 * @param int $oldversion the version we are upgrading from.
 * @return bool result
 */
function xmldb_local_och5pcore_upgrade($oldversion) {

    if ($oldversion < 2023042802) {

        // Remove old LTI configurations of the plugin and bring the tool_opencast LTI configuration in the game.
        $hasconfiguredlti = opencast_manager::is_lti_credentials_configured();

        // Set the uselti configuration to use the LTI configuration from tool_opencast.
        set_config('uselti', $hasconfiguredlti, 'local_och5pcore');

        // Remove the old LTI configurations.
        unset_config('lticonsumerkey', 'local_och5pcore');
        unset_config('lticonsumersecret', 'local_och5pcore');

        // OCH5PCore savepoint reached.
        upgrade_plugin_savepoint(true, 2023042802, 'local', 'och5pcore');
    }

    return true;
}
