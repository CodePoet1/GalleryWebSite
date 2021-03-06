#!/bin/bash

InScriptFile=$1
ClearScr=$2
User="root"
Password="monty123"

run_script(){
    
    case "$ClearScr" in
	"-c")
	    eval "clear"
	    ;;
	*)
	    ;;
    esac

    echo "Script file -> $InScriptFile "
    eval "mysql -u $User -p$Password < $InScriptFile "

}

error_end(){ 
    echo
    echo "  Error - script file not specified in command line"
    echo
    return -1
}

if [ $InScriptFile ]
then
    run_script
else
    error_end
fi


