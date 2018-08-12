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

namespace Nebucord\Models;

use Nebucord\Interfaces\Nebucord_IModelREST;

/**
 * Class Nebucord_Model_RESTGetChannelMessages
 *
 * A model representing a request object for all channel messages to a gateway.
 *
 * For more information regarding the properties of this model @see https://discordapp.com/developers/docs/intro
 *
 * @package Nebucord\Models
 */
class Nebucord_Model_RESTGetChannelMessages extends Nebucord_Model implements Nebucord_IModelREST {

    /** @var string $_requesttype The request type needed by this model. */
    private $_requesttype = "GET";

    protected $_channelid;
    protected $_limit;
    protected $_around = null;
    protected $_before = null;
    protected $_after = null;

    /**
     * Nebucord_Model_RESTGetChannelMessages constructor.
     *
     * Sets up the request.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Nebucord_Model_RESTGetChannelMessages destructor.
     */
    public function __destruct() {
        parent::__destruct();
    }

    /**
     * Gets the API endpoint.
     *
     * @see Nebucord_IModelREST::getApiEndpoint()
     *
     * @return string The API endpoint for this model.
     */
    public function getApiEndpoint() {
        $aroundparam = $beforeparam = $afterparam = "";

        if(!is_null($this->_around)) { $aroundparam = "&around=".$this->_around; }
        if(!is_null($this->_before)) { $beforeparam = "&before=".$this->_before; }
        if(!is_null($this->_after)) { $afterparam = "&after=".$this->_after; }

        return "/channels/".$this->_channelid."/messages?limit=".$this->_limit.$aroundparam.$beforeparam.$afterparam;
    }

    /**
     * Gets the http request type.
     *
     * @see Nebucord_IModelREST::getRequestType()
     *
     * @return string The http request type for this model.
     */
    public function getRequestType() {
        return $this->_requesttype;
    }
}