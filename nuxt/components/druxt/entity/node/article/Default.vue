<template>
  <VRow>
    <VCol :cols="12">
      <h1 v-text="entity.attributes.title" />
    </VCol>
    <VCol :cols="8">
      <VChip
        v-for="(tag, key) of tags"
        :key="key"
        v-text="tag.attributes.name"
      />

      <slot name="body" />
    </VCol>
    <VCol :cols="4">
      <DruxtView
        :arguments="viewArgs"
        view-id="related_articles"
      />
    </VCol>
  </VRow>
</template>

<script>
import { DruxtEntityMixin } from 'druxt-entity'

export default {
  mixins: [DruxtEntityMixin],
  computed: {
    tags: ({ entity }) => entity.included.filter((o) => o.type === 'taxonomy_term--tags'),
    viewArgs: ({ entity, tags }) => [
      entity.attributes.drupal_internal__nid,
      tags.map((o) => o.attributes.drupal_internal__tid).join('+')
    ]
  },
  druxt: {
    query: {
      fields: [
        ['body', 'drupal_internal__nid', 'title'],
        ['taxonomy_term--tags', ['drupal_internal__tid', 'name']]
      ],
      include: ['field_tags'],
    },
  },
}
</script>
