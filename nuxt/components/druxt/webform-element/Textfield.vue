<template>
  <div>
    <label v-text="element['#title']" />:
    <input type="text" :name="name" />
  </div>
</template>

<script>
import DruxtWebformElementMixin from '~/mixins/webform'

export default {
  mixins: [DruxtWebformElementMixin],
}
</script>
