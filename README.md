# Druxt Experiments

This repository contains experiments and proof of concepts using DruxtJS with various different types of Drupal modules and setups.

Each experiment lives in it's own branch of the repository:
- https://github.com/Decipher/druxt-experiments/branches/all


## Druxt + Layout builder

This is a Druxt + Layout Builder proof of concept.

![Druxt LayoutBuilder](https://github.com/Decipher/druxt-experiments/raw/feature/layout_builder/images/Druxt%20LayoutBuilder.png)

It requires a Drupal core patch to expose Layout Builder data to the JSON:API: https://www.drupal.org/project/drupal/issues/2942975

The backend is pre-configured and pre-seeded with content using the Tome sync module.

The frontend `pages/index.vue` is connected to the Basic Page content using the `DruxtEntity` component which passes it's data through to a custom `DruxtLayoutBuilder` component for rendering.

Try this demo in Gitpod: https://gitpod.io#github.com/Decipher/druxt-experiments/tree/feature/layout_builder
