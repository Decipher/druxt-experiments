<template>
  <div v-html="element['#markup']" />
</template>

<script>
import DruxtWebformElementMixin from '~/mixins/webform'

export default {
  mixins: [DruxtWebformElementMixin],
}
</script>
