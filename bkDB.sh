#!/bin/bash
bkdate=$(date '+%Y%m%d' )
folder='/data/dbsave/'$bkdate
rm -rf $folder
mkdir $folder
arr=(chuanqi_login chuanqi_main chuanqi_rexue1 chuanqi_rexue2 chuanqi_rexue3 chuanqi_rexue4 chuanqi_rexue5 chuanqi_rexue6 chuanqi_rexue7 chuanqi_rexue8)
for i in ${arr[*]}
do
    echo 'current database:'${i}
    mysqldump -uroot -prexue888 -h172.21.16.7 -P3306 ${i}  > $folder/${i}.sql   
done
cd $folder
tar -zcvf log.tar.gz *.sql
rm -rf *.sql
echo 'backup finished'

