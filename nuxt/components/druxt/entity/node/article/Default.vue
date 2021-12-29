<template>
  <div>
    <DruxtDebug
      :json="entity.attributes.metatag"
      summary="entity.attributes.metatag"
    />
    <slot />
  </div>
</template>

<script>
import { DruxtEntityMixin } from 'druxt-entity'

export default {
  mixins: [DruxtEntityMixin],

  head() {
    return {
      title: this.title,
      meta: this.metatags
    }
  },

  computed: {
    title: ({ entity }) => entity.attributes.metatag.find((o) => o.attributes.name === 'title').attributes.content,
    metatags: ({ entity }) => entity.attributes.metatag
      .filter((o) => o.tag === 'meta')
      .map((o) => ({
        hid: o.attributes.name,
        name: o.attributes.name,
        content: o.attributes.content,
      })),
  }
}
</script>
