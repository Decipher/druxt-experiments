#!/usr/bin/env bash

# Misc housekeeping before start
ddev config global --instrumentation-opt-in=true --omit-containers=ddev-router

DRUPAL_DIR="${GITPOD_REPO_ROOT}/drupal"
cd "$DRUPAL_DIR" && ddev start
