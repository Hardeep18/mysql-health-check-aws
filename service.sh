#!/bin/bash

set -e

/etc/init.d/apache2 restart

#tail -f /dev/null
tail -f /var/log/apache2/access.log
