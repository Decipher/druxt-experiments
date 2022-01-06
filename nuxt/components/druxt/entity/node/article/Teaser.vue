<template>
  <VCard>
    <VImg src="https://cdn.vuetifyjs.com/images/cards/cooking.png" />

    <VCardText>
      <div v-text="summary" />
    </VCardText>

    <VCardActions>
      <NuxtLink
        tag="VBtn"
        :to="`node/${entity.attributes.drupal_internal__nid}`"
      >
        Read more
      </NuxtLink>
    </VCardActions>
  </VCard>
</template>

<script>
import { DruxtEntityMixin } from 'druxt-entity'
import ellipsize from 'ellipsize'

export default {
  mixins: [DruxtEntityMixin],
  computed: {
    summary: ({ fields }) => ellipsize(fields.body.data.summary, fields.body.schema.settings.display.trim_length),
  }
}
</script>
