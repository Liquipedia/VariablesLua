<?php

namespace Liquipedia\Extension\VariablesLua\Hooks;

use Liquipedia\Extension\VariablesLua\ScribuntoLuaLibrary;

class LegacyHooks {

	/**
	 * Register Lua Library
	 * @param string $engine
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
