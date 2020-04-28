<?php

namespace Liquipedia\VariablesLua;

class Hooks {

	/**
	 * Register Lua Library
	 * @param strin $engine
	 * @param array &$extraLibraries
	 * @return array
	 */
	public static function onScribuntoExternalLibraries( $engine, array &$extraLibraries ) {
		if ( $engine === 'lua' ) {
			$extraLibraries[ 'mw.ext.VariablesLua' ] = ScribuntoLuaLibrary::class;
		}
		return true;
	}

}
