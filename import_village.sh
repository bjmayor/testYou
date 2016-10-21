#!/bin/bash
i=0
for province in `php index.php spider list_all_town`
do
    ((i++))
    echo $i
   nohup php index.php spider district $province 7&
    if (( $i%80 == 1 ));
        then 
            sleep 2
    fi 
done
