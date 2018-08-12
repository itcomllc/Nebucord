<?php
/**
 *
 * Nebucord - A Discord Websocket and REST API
 *
 * Copyright (C) 2018 Bernd Robertz
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Bernd Robertz <brobertz.net@gmail.com>
 *
 */

namespace Nebucord\Interfaces;

use Nebucord\Models\Nebucord_Model;

/**
 * Interface Nebucord_IActionTable
 *
 * This sets the needed methods to be implemented by an Nebucord_ActionTable class if it needs to be overwritten.
 *
 * @package Nebucord\Interfaces
 */
interface Nebucord_IActionTable {
    /** @const string The const for shutting down Nebucord. */
    const SHUTDOWN = "!shutdown";

    /** @const string The const for setting a bot status. */
    const SETSTATUS = "!setstatus";

    /** @const string The const for getting commands help. */
    const GETHELP = "!commands";

    /** @const string The const for sending an test echo command. */
    const DOECHO = "!echotest";

    /** @const string The const for repeating a message by a bot. */
    const DOSAY = "!say";

    /** @var string The const for requesting status. */
    const DOSTATUS = "!status";

    /**
     * Stops Nebucord and sets runtime to exit.
     *
     * Can be overwritten. This does everything wich is needed to shut down the webclient properly.
     *
     * @param string $command The command on wich this action shoud fire (default: !shutdown).
     * @return Nebucord_Model|null The model returned to the runtime controller to execute the action by the ActionController.
     */
    public function doShutdown($command);

    /**
     * Sets the bot status
     *
     * Can be overwritten. This sets a new status for the Nebucord driven bot.
     *
     * @param string $command The command on wich this action shoud fire (default: !setstatus).
     * @return Nebucord_Model|null The model returned to the runtime controller to execute the action by the ActionController.
     */
    public function setStatus($command);

    /**
     * Shows the available commands.
     *
     * Sends a message to the channel where it received the command and returns a list of available internal commands.
     *
     * @param string $command The command on wich this action shoud fire (default: !commands).
     * @return Nebucord_Model|null The model returned to the runtime controller to execute the action by the ActionController.
     */
    public function getHelp($command);

    /**
     * Does a test echo.
     *
     * Sends an echo with the same text wich was entered on the command to the channel where it was posted.
     *
     * @param string $command The command on wich this action shoud fire (default: !echotest).
     * @return Nebucord_Model|null The model returned to the runtime controller to execute the action by the ActionController.
     */
    public function doEcho($command);

    /**
     * Repeats what a user send.
     *
     * Repeats exactly what a user typed.
     *
     * @param string $command The command on wich this action shoud fire (default: !say).
     * @return Nebucord_Model|null The model returned to the runtime controller to execute the action by the ActionController.
     */
    public function doSay($command);

    /**
     * Returns bot status.
     *
     * Returns simply if bot is available.
     *
     * @param string $command The command on wich this action shoud fire (default: !status).
     * @return Nebucord_Model|null The model returned to the runtime controller to execute the action by the ActionController.
     */
    public function doStatus($command);
}