<template>
  <div v-if="!code" class="flex flex-col">
    <h1 class="text-4xl mb-8" v-text="entity.attributes.title" />

    <figure class="mb-4">
      <img :src="entity.included[0].attributes.uri.url" />
    </figure>

    <div class="prose">
      <slot name="body" />
    </div>
  </div>

  <!-- Code -->
  <pre v-else><code>{{ entity }}</code></pre>
</template>

<script>
import { DruxtEntityMixin } from 'druxt-entity'

export default {
  mixins: [DruxtEntityMixin],

  props: {
    code: {
      type: Boolean,
      default: false,
    },
  },

  druxt: {
    query: {
      fields: [
        ['body', 'field_image', 'title'],
        ['file--file', ['uri']],
      ],
      include: ['field_image'],
    },
  },
}
</script>
