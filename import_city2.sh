#!/bin/bash
for province in `php index.php spider2 list_all_province`
do
    nohup php index.php spider2 city $province &
done
