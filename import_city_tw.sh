#!/bin/bash
for province in `php index.php spider_tw list_all_province`
do
    nohup php index.php spider_tw city $province &
done
