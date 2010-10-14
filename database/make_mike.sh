#!/bin/bash
################################################
# Quasidea Database Build Script
# Copyright 2008-2009, Quasidea Development, LLC
################################################

# Specify Path to DB Scripts and DB Name here
dbpath=/var/www/alcf/chms/database
dbname=alcf_chms
dblogname=alcf_chms_log

# Perform DB Tasks
echo -n "Building [$dbname]... "
mysql -uroot mysql -e "DROP DATABASE IF EXISTS $dbname"
mysql -uroot mysql -e "CREATE DATABASE $dbname DEFAULT CHARACTER SET UTF8"
mysql -uroot $dbname < $dbpath/create.sql
mysql -uroot $dbname < $dbpath/data.sql
echo "Done."

echo -n "Building [$dblogname]... "
mysql -uroot mysql -e "DROP DATABASE IF EXISTS $dblogname"
mysql -uroot mysql -e "CREATE DATABASE $dblogname DEFAULT CHARACTER SET UTF8"
sed -e s/InnoDB/MyISAM/ -e s/AUTO_INCREMENT// -e s/PRIMARY\ KEY/INDEX/ -e s/UNIQUE// $dbpath/create.sql | mysql -uroot $dblogname
echo "Done."

$dbpath/create_log.php