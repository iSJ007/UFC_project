#!/bin/bash



score=0
qnum=15
db="ufc.sqlite"

#sqlite3 $db < empty-tables.sql
sqlite3 $db < load-tpch.sql

