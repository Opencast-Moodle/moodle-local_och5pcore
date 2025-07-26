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
 * Plugin version and other meta-data are defined here.
 *
 * @package    local_och5pcore
 * @copyright  2021 Farbod Zamani Boroujeni, ELAN e.V.
 * @author     Farbod Zamani Boroujeni <zamani@elan-ev.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

// Defining this plug-in metadata.
$plugin->component = 'local_och5pcore';
$plugin->release = '4.5-r2';
$plugin->version = 2025011501;
$plugin->requires = 2024100700; // Requires Moodle 4.5+.
$plugin->supported = [405, 405];
$plugin->maturity = MATURITY_STABLE;
$plugin->dependencies = [
    'tool_opencast' => 2024111102,
    'block_opencast' => 2024111102,
];
