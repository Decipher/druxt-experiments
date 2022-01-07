<template>
  <VCard>
    <VImg
      :src="imgSrc"
      height="150"
    />

    <VCardTitle v-text="entity.attributes.title" />

    <VCardText>
      <VChip
        v-for="(tag, key) of tags"
        :key="key"
        v-text="tag.attributes.name"
      />

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
    imgSrc: ({ entity }) => entity.included.find((o) => o.type === 'file--file').attributes.uri.url,
    summary: ({ fields }) => ellipsize(fields.body.data.summary, fields.body.schema.settings.display.trim_length),
    tags: ({ entity }) => entity.included.filter((o) => o.type === 'taxonomy_term--tags'),
  },
  druxt: {
    query: {
      fields: [
        ['body', 'drupal_internal__nid', 'field_image', 'title'],
        ['file--file', ['uri']],
        ['taxonomy_term--tags', ['name']]
      ],
      include: ['field_image', 'field_tags'],
    },
  },
}
</script>
