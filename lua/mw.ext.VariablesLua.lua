local libraryUtil = require( 'libraryUtil' )
local VariablesLua = {}
local php

function VariablesLua.var( name, default )
	libraryUtil.checkTypeMulti( 'var', 1, name, { 'string', 'number' } )
	libraryUtil.checkTypeMulti( 'var', 2, default, { 'string', 'number', 'nil' } )
	name = tostring( name )
	default = tostring( default or '' )

	return php.var( name, default )
end

function VariablesLua.var_final( name, default )
	libraryUtil.checkTypeMulti( 'var_final', 1, name, { 'string', 'number' } )
	libraryUtil.checkTypeMulti( 'var_final', 2, default, { 'string', 'number', 'nil' } )
	name = tostring( name )
	default = tostring( default or '' )

	return php.var_final( name, default )
end

function VariablesLua.vardefine( name, value )
	libraryUtil.checkTypeMulti( 'vardefine', 1, name, { 'string', 'number' } )
	libraryUtil.checkTypeMulti( 'vardefine', 2, value, { 'string', 'number', 'nil' } )
	name = tostring( name )
	value = tostring( value or '' )

	return php.vardefine( name, value )
end

function VariablesLua.vardefineecho( name, value )
	libraryUtil.checkTypeMulti( 'vardefineecho', 1, name, { 'string', 'number' } )
	libraryUtil.checkTypeMulti( 'vardefineecho', 2, value, { 'string', 'number', 'nil' } )
	name = tostring( name )
	value = tostring( value or '' )

	return php.vardefineecho( name, value )
end

function VariablesLua.varexists( name )
	libraryUtil.checkTypeMulti( 'varexists', 1, name, { 'string', 'number' } )
	name = tostring( name )
    local exists = php.varexists( name )

	return exists and exists ~= ''
end

function VariablesLua.setupInterface( options )
	-- Boilerplate
	VariablesLua.setupInterface = nil
	php = mw_interface
	mw_interface = nil

	-- Register this library in the "mw" global
	mw = mw or {}
	mw.ext = mw.ext or {}
	mw.ext.VariablesLua = VariablesLua

	package.loaded['mw.ext.VariablesLua'] = VariablesLua
end

return VariablesLua
