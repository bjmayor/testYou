#!/bin/bash
for province in `php index.php spider3 list_all_province`
do
    nohup php index.php spider3 city $province &
done
