<?php
/**
 * Slack Integration
 * Copyright (C) 2014 Karim Ratib (karim.ratib@gmail.com)
 *
 * Slack Integration is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.
 *
 * Slack Integration is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Slack Integration; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA
 * or see http://www.gnu.org/licenses/.
 */

form_security_validate( 'plugin_Slack_config_edit' );

auth_reauthenticate( );
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

$f_instance = gpc_get_string( 'instance' );
$f_token = gpc_get_string( 'token' );
$f_bot_name = gpc_get_string( 'bot_name' );
$f_bot_icon = gpc_get_string( 'bot_icon' );
$f_default_channel = gpc_get_string( 'default_channel' );

if( plugin_config_get( 'instance' ) != $f_instance ) {
  plugin_config_set( 'instance', $f_instance );
}

if( plugin_config_get( 'token' ) != $f_token ) {
  plugin_config_set( 'token', $f_token );
}

if( plugin_config_get( 'bot_name' ) != $f_bot_name ) {
  plugin_config_set( 'bot_name', $f_bot_name );
}

if( plugin_config_get( 'bot_icon' ) != $f_bot_icon ) {
  plugin_config_set( 'bot_icon', $f_bot_icon );
}

if( plugin_config_get( 'default_channel' ) != $f_default_channel ) {
  plugin_config_set( 'default_channel', $f_default_channel );
}

form_security_purge( 'plugin_Slack_config_edit' );

print_successful_redirect( plugin_page( 'config', true ) );
