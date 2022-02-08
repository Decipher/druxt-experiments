<template>
  <div>
    {{ url }}
    {{ entity }}
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
    url: ({ $route }) => $route.hash.substring(1).replace(':/', '://')
  }
}
</script>
