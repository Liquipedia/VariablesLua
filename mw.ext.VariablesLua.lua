local VariablesLua = {}
local php

function VariablesLua.var( name, default )
	return php.var( name, default )
end

function VariablesLua.var_final( name, default )
	return php.var_final( name, default )
end

function VariablesLua.vardefine( name, value )
	return php.vardefine( name, value )
end

function VariablesLua.vardefineecho( name, value )
	return php.vardefineecho( name, value )
end

function VariablesLua.varexists( name )
	return php.varexists( name )
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