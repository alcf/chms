#!/bin/bash
################################################
# Quasidea Database Build Script
# Copyright 2008-2009, Quasidea Development, LLC
################################################

# Specify Path to DB Scripts and DB Name here
dbpath=/var/www/alcf/chms/database
dbname=alcf_chms_old
dblogname=alcf_chms_old_log
version=007

# Perform DB Tasks
echo -n "Building [$dbname] on version [$version]... "
mysql -uroot mysql -e "DROP DATABASE IF EXISTS $dbname"
mysql -uroot mysql -e "CREATE DATABASE $dbname DEFAULT CHARACTER SET UTF8"
mysql -uroot $dbname < $dbpath/versions/$version/create.sql
mysql -uroot $dbname < $dbpath/versions/$version/data.sql
echo "Done."

if [ $1 ]; then
	exit 0
fi

echo -n "Building [$dblogname] on version [$version]... "
mysql -uroot mysql -e "DROP DATABASE IF EXISTS $dblogname"
mysql -uroot mysql -e "CREATE DATABASE $dblogname DEFAULT CHARACTER SET UTF8"
sed -e s/InnoDB/MyISAM/ -e s/AUTO_INCREMENT// -e s/PRIMARY\ KEY/INDEX/ -e s/UNIQUE// $dbpath/versions/$version/create.sql | mysql -uroot $dblogname
echo "Done."

$dbpath/create_log.php $dblogname