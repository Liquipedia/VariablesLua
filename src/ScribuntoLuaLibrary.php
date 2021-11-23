<?php

namespace Liquipedia\Extension\VariablesLua;

use ExtVariables;
use Scribunto_LuaLibraryBase;

class ScribuntoLuaLibrary extends Scribunto_LuaLibraryBase {

	public function register() {
		$lib = [
			'var' => [ $this, 'fnVar' ],
			'var_final' => [ $this, 'fnVarFinal' ],
			'vardefine' => [ $this, 'fnVardefine' ],
			'vardefineecho' => [ $this, 'fnVardefineecho' ],
			'varexists' => [ $this, 'fnVarexists' ],
		];
		return $this->getEngine()->registerInterface(
				__DIR__ . '/../lua/mw.ext.VariablesLua.lua', $lib, []
		);
	}

	public function fnVar() {
		$params = func_get_args();
		$parser = $this->getParser();
		return [ ExtVariables::pfObj_var( $parser, $parser->getPreprocessor()->newFrame(), $params ) ];
	}

	public function fnVarFinal() {
		$params = func_get_args();
		$parser = $this->getParser();
		return [ ExtVariables::pf_var_final( $parser, ...$params ) ];
	}

	public function fnVardefine() {
		$params = func_get_args();
		$parser = $this->getParser();
		return [ ExtVariables::pf_vardefine( $parser, ...$params ) ];
	}

	public function fnVardefineecho() {
		$params = func_get_args();
		$parser = $this->getParser();
		return [ ExtVariables::pf_vardefineecho( $parser, ...$params ) ];
	}

	public function fnVarexists() {
		$params = func_get_args();
		$parser = $this->getParser();
		if ( method_exists( 'ExtVariables', 'pfObj_varexists' ) ) {
			return [ ExtVariables::pfObj_varexists(
					$parser, $parser->getPreprocessor()->newFrame(), $params
				) ];
		} else {
			return [ ExtVariables::pf_varexists( $parser, ...$params ) ];
		}
	}

}
