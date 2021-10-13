#!/usr/bin/env bash

DRUPAL_DIR="${GITPOD_REPO_ROOT}/drupal"

cd "$DRUPAL_DIR" && composer install
cd "$DRUPAL_DIR" && ddev start
cd "$DRUPAL_DIR" && ddev drush tome:install -y
