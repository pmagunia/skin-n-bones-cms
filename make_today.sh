#!/usr/bin/env bash

date=$(date '+%Y-%m-%d')

cp tpl "src/$date"
if [ -f tpl.meta ]; then
  cp tpl.meta "src/$date.meta"
fi

exit 0

