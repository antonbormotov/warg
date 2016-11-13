#### Requirements:
In order to get hdd input/output statistics, make sure `sysstat` package is presented in the system
For Redhat/CentOS:
```
yum install -y sysstat
```
For Debian/Ubuntu:
```
apt-get install -y sysstat
```

#### Installation:
It is necessary to get php dependancies. Run in project root dirrectory:
```
composer install
```

#### Configuration:
Statistics can be collected by running cron.php script:

```
php cron.php
```
or, using crontab:
```
*  *  *  * 0 root cd /patch/to/project && /usr/bin/php cron.php
```
