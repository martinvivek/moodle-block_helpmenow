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
 * Help me now adobe connect plugin
 *
 * @package     block_helpmenow
 * @copyright   2012 VLACS
 * @author      David Zaharee <dzaharee@vlacs.org>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/lib.php');

/**
 * temporary hard coding of those that can use adobeconnect plugin for testing
 */
function helpmenow_adobeconnect_tester() {
    global $USER;

    switch ($USER->id) {
    case 5:         // matt
    case 52650:     // dave
    case 57885:     // jc
    case 930:       // elizabeth
    case 56528:     // "
    case 56093:     // jason
    case 62589:     // "
    case 11:        // Ollire
    case 56895:     // "
    case 4:         // Heather
    case 50710:     // Karen
    case 10:        // Tony
    case 37479:     // lisa
    case 907:       # temmett1
    case 29:        # khanley3
    case 41256:     # bledrew1
    case 41252:     # ptempleton2
    case 33:        # bmorrissette1
    case 24:        # tbryde1
    case 44248:     # jbabcock15
    case 35:        # ewhittington2
    case 56546:     # ewhittingtonadmin
    case 45710:     # mdecker1
    case 56497:     # mdecker1admin
    case 62589:     # jfitzpatrickadmin
    case 56093:     # jfitzpatrick
    case 62776:     # jfitzpatricktest
    case 64813:     # jfitzpatricktemplatetest
    case 930:       # eohare1
    case 56528:     # eohare1admin
    case 57118:     # eohare
    case 59151:     # etest
    case 1352:      # vgancarz1
    case 45:        # mdudek3
        return true;
    default:
        return false;
    }
}

/**
 *     _____ _
 *    / ____| |
 *   | |    | | __ _ ___ ___  ___  ___
 *   | |    | |/ _` / __/ __|/ _ \/ __|
 *   | |____| | (_| \__ \__ \  __/\__ \
 *    \_____|_|\__,_|___/___/\___||___/
 */

/**
 * adobeconnect helpmenow plugin class
 */
class helpmenow_plugin_adobeconnect extends helpmenow_plugin {
    /**
     * Plugin name
     * @var string $plugin
     */
    public $plugin = 'adobeconnect';

    public static function display($sessionid, $privileged = false) {
        global $CFG, $USER;

        if (!helpmenow_adobeconnect_tester()) {
            return '';
        }

        if ($privileged) {
            $connect = new moodle_url("$CFG->wwwroot/blocks/helpmenow/plugins/adobeconnect/connect.php");
            $connect->param('sessionid', $sessionid);
            return link_to_popup_window($connect->out(), "adobe_connect", 'Invite to Adobe Connect', 400, 500, null, null, true);
        }
        return '';
    }

    /**
     * returns formatted information to put in the main block
     * @return a link to adobe connect user page
     */
    public static function block_display() {
        global $CFG, $USER;

        if (!helpmenow_adobeconnect_tester()) {
            return false;
        }

        $test = new moodle_url("$CFG->wwwroot/blocks/helpmenow/plugins/adobeconnect/meetnow.php");
        $test->param('username', $USER->username);
        return link_to_popup_window($test->out(), "adobeconnect", 'My Classroom', 800, 900, null, null, true);
    }

}

?>
