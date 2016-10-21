#!/bin/bash
for province in `php index.php spider list_all_province`
do
    nohup php index.php spider city $province &
done
