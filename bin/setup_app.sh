#! /usr/bin/env bash
set -e
SCRIPT_DIR=$(dirname $(readlink -fn ${BASH_SOURCE[0]}))

cd $SCRIPT_DIR/..

mkdir -p var/cache
chgrp http var/cache
chmod g+w var/cache
