<template>
  <h1 v-text="entity.attributes.title" />
</template>

<script>
export default {
  props: {
    component: {
      type: Object,
      require: true,
    },

    entity: {
      type: Object,
      require: true,
    }
  }
}
</script>
