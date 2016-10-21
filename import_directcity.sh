#!/bin/bash
for province in `php index.php spider2 list_all_directcity`
do
    nohup php index.php spider2 cityregion $province &
done
