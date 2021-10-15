# Druxt Experiments

This repository contains experiments and proof of concepts using DruxtJS with various different types of Drupal modules and setups.

Each experiment lives in it's own branch of the repository:
- https://github.com/Decipher/druxt-experiments/branches/all


## Druxt + Paragraph View Mode

This is a Druxt + Paragraph View Mode proof of concept.

![Druxt Paragraph View Mode](https://github.com/Decipher/druxt-experiments/raw/feature/paragraph_view_mode/images/druxt-paragraph-view-mode.png)

It requires the Paragraphs and Paragraph View Mode modules:
- https://www.drupal.org/project/paragraphs
- https://www.drupal.org/project/paragraph_view_mode

The backend is pre-configured and pre-seeded with content using the Tome sync module.

The frontend has a custom `DruxtFieldEntityReferenceRevisionsEntityView` component that loads the Paragraph View Mode from the Paragraph and uses it to render the Paragraph via the `DruxtEntity` component:

https://github.com/Decipher/druxt-experiments/blob/feature/paragraph_view_mode/nuxt/components/druxt/field/EntityReferenceRevisionsEntityView.vue

This allows for each Paragraph to have a View mode specific DruxtWrapper component to theme the available data.

Example:
- `~/components/druxt/entity/paragraph/text/Alt.vue`
- `~/components/druxt/entity/paragraph/text/Default.vue`

Try this demo in Gitpod: https://gitpod.io#github.com/Decipher/druxt-experiments/tree/feature/paragraph_view_mode
