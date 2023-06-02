#!/usr/bin/env bash

composer  update
composer  run permission
composer  run cs-fix
composer  dumpautoload -o