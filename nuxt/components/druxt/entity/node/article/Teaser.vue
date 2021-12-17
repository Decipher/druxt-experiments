<template>
  <DuiCard
    class="h-full"
    :class="{
      'bg-primary': selected && selected.id === entity.id,
      'shadow-2xl': selected && selected.id === entity.id
    }"
    :title="entity.attributes.title"
    :image="{
      alt: entity.relationships.field_image.data.meta.alt,
      src: entity.included[0].attributes.uri.url,
    }"
  >
    <!-- Body -->
    <div v-if="!selected" v-html="body" />
  </DuiCard>
</template>

<script>
import ellipsize from 'ellipsize'
import { DruxtEntityMixin } from 'druxt-entity'

export default {
  mixins: [DruxtEntityMixin],

  props: {
    selected: {
      type: Object,
      default: () => {},
    }
  },

  computed: {
    body: ({ entity }) => ellipsize((entity.attributes.body || {}).processed, 200)
  },

  druxt: {
    query: {
      fields: [
        ['body', 'drupal_internal__nid', 'field_image', 'path', 'title'],
        ['file--file', ['uri']],
      ],
      include: ['field_image']
    }
  }
}
</script>
