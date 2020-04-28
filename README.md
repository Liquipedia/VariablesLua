# VariablesLua
![Code Style](https://github.com/Liquipedia/VariablesLua/workflows/Code%20Style/badge.svg)

This extension makes Extension:Variables work with Scribunto Lua. See https://liquipedia.net/commons/Help:VariablesLua for more information.

# Installation
* Extract the extension folder to extensions/VariablesLua/
* Add the following line to LocalSettings.php:

```
wfLoadExtension( 'VariablesLua' );
```

# Dependencies
This extension requires Extension:Variables and Extension:Scribunto to be installed.

# Examples
This is how some example calls to the extension could look like in a Scribunto module
```lua
local p = {} -- p stands for package

function p.get(frame)
	local data = mw.ext.VariablesLua.var('variablename')
	-- data now holds the value of the variable "variablename"
	return data
end

function p.set(frame)
	mw.ext.VariablesLua.vardefine('variablename', 'variablevalue')
	-- The variable "variablename" now holds the value "variablevalue"
end

function p.setecho(frame)
	local data = mw.ext.VariablesLua.vardefineecho('variablename', 'variablevalue')
	-- The variable "variablename" now holds the value "variablevalue"
	-- data now has the value "variablevalue"
	return data
end

return p
```
