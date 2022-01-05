# Druxt Experiments

This repository contains experiments and proof of concepts using DruxtJS with various different types of Drupal modules and setups.

Each experiment lives in it's own branch of the repository:
- https://github.com/Decipher/druxt-experiments/branches/all


## Druxt with a custom Entity Router for Full view mode

This is to demonstrate a workaround for https://github.com/druxt/druxt.js/issues/412

The issue is that the DruxtRouterEntity component is rendering all Content Entities using the Default view mode, but Nodes should use the Full view mode, and fallback to the Default view mode.

This proof of concept uses the DruxtRouterEntityNotFront component to render the DruxtEntity using the Full view mode, but it does not fall back to Default if the Full mode is missing.
