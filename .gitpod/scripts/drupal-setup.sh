#!/usr/bin/env bash

DRUPAL_DIR="${GITPOD_REPO_ROOT}/drupal"

cd "$DRUPAL_DIR" && ddev drupal-install
