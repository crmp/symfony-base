#!/usr/bin/env bash

echo This destroys everything.

if [[ ! -f /.dockerenv ]]; then
    echo This only runs inside docker.
    exit
fi

bin/console doctrine:migrations:migrate 1_0_0
bin/console doctrine:migrations:migrate prev -n

bin/console doctrine:migrations:migrate -n

bin/console hautelook:fixtures:load -n
