<?php

namespace Liquipedia\VariablesLua;

class Hooks {

	/**
	 * Register Lua Library
	 */
	public static function onScribuntoExternalLibraries( $engine, array &$extraLibraries ) {
		if ( $engine === 'lua' ) {
			$extraLibraries[ 'mw.ext.VariablesLua' ] = 'Liquipedia\\VariablesLua\\Scribunto_LuaVariablesLuaLibrary';
		}
		return true;
	}

}
