<?php

namespace Liquipedia\VariablesLua;

use ExtVariables;

class Scribunto_LuaVariablesLuaLibrary extends \Scribunto_LuaLibraryBase {

	public function register() {
		$lib = [
			'var' => [ $this, 'fn_var' ],
			'var_final' => [ $this, 'fn_var_final' ],
			'vardefine' => [ $this, 'fn_vardefine' ],
			'vardefineecho' => [ $this, 'fn_vardefineecho' ],
			'varexists' => [ $this, 'fn_varexists' ],
		];
		return $this->getEngine()->registerInterface(
				__DIR__ . '/mw.ext.VariablesLua.lua', $lib, []
		);
	}

	public function fn_var() {
		$params = func_get_args();
		$parser = $this->getParser();
		return [ ExtVariables::pfObj_var( $parser, $parser->getPreprocessor()->newFrame(), $params ) ];
	}

	public function fn_var_final() {
		$params = func_get_args();
		$parser = $this->getParser();
		return [ ExtVariables::pf_var_final( $parser, ...$params ) ];
	}

	public function fn_vardefine() {
		$params = func_get_args();
		$parser = $this->getParser();
		return [ ExtVariables::pf_vardefine( $parser, ...$params ) ];
	}

	public function fn_vardefineecho() {
		$params = func_get_args();
		$parser = $this->getParser();
		return [ ExtVariables::pf_vardefineecho( $parser, ...$params ) ];
	}

	public function fn_varexists() {
		$params = func_get_args();
		$parser = $this->getParser();
		if ( method_exists( 'ExtVariables', 'pf_varexists' ) ) {
			return [ ExtVariables::pf_varexists( $parser, ...$params ) ];
		} else {
			return [ ExtVariables::pfObj_varexists( $parser, $parser->getPreprocessor()->newFrame(), $params ) ];
		}
	}

}
