// функция wc на php

<?php
function mysum(){
	$count =0;
	while(fgets(STDIN)){
$count++;
	}


echo $count;	
}
mysum();

?>

//level 1 и level 2

echo 'Harry: '>> testfile.txt && cat Harry_Potter.1|grep Harry|wc -w  >> testfile.txt  && echo ' [' >> testfile.txt && cat Harry_Potter.1 | grep -n Harry|cut -d':' -f1 | paste -d', ' -s >>testfile.txt && echo ' ]' >> testfile.txt 


echo 'Lord: '>> testfile.txt && cat Harry_Potter.1|grep Lord|wc -w  >> testfile.txt  && echo ' [' >> testfile.txt && cat Harry_Potter.1 | grep -n Lord|cut -d':' -f1 | paste -d', ' -s >>testfile.txt && echo ' ]' >> testfile.txt 
olga@olga-HP-ProBook-430-G2:~/harry$ 

echo 'Hogwarts: '>> testfile.txt && cat Harry_Potter.1|grep Hogwarts|wc -w  >> testfile.txt  && echo ' [' >> testfile.txt && cat Harry_Potter.1 | grep -n Hogwarts|cut -d':' -f1 | paste -d', ' -s >>testfile.txt && echo ' ]' >> testfile.txt 



//level 3

#! /bin/sh
wget -O mylink.html $2
echo "$1: " >> $3 && cat mylink.html |grep $1 |wc -w  >> $3  && echo ' [' >> $3 && cat mylink.html | grep -n $1 |cut -d':' -f1 | paste -d', ' -s >> $3 

запускаю

./script.sh Linux https://dandreamsofcoding.com/2016/01/15/linux-commands-cut-and-tr/ newfile.txt
