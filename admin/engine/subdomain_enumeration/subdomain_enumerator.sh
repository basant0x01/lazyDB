#!/bin/bash

# Author: basant0x01
# Engine Writter/Coder: basant0x01 (basant Karki)
# Subdomain Enumerator Engine Version: 0.1 (beta)

function exit(){
	exit
}

function_run_findomain(){

findomain -f subdomain_enumeration/wildcard_domains.txt -u subdomain_enumeration/temp-subdomains.txt
exit

}

exec_tools(){
	function_run_findomain
}


function main(){
	exec_tools
}

main