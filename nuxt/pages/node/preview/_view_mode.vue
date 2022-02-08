<template>
  <div v-if="!$fetchState.pending">
    <DruxtDebug :summary='url' :json="entity" />
    <!-- @TODO - use v-model to bind preview data. -->
    <DruxtEntity v-bind="props" />
  </div>
</template>

<script>
export default {
  layout: 'preview',

  data: () => ({
    entity: null,
  }),

  async fetch() {
    try {
      const response = await this.$druxt.axios.get(this.url)
      this.entity = response.data
    } catch(err) {
      console.log('ERR', err)
    }
  },

  computed: {
    props: ({ $route, url }) => {
      const parts = url.split('/')
      return {
        mode: $route.params.view_mode,
        type: [parts[parts.length - 4], parts[parts.length - 3]].join('--'),
        uuid: parts[parts.length - 2]
      }
    },
    url: ({ $route }) => $route.hash.substring(1).replace(':/', '://')
  }
}
</script>
