<template>
  <div>
    <label v-text="element['#title']" />:
    <input type="email" :name="name" />
  </div>
</template>

<script>
import DruxtWebformElementMixin from '~/mixins/webform'

export default {
  mixins: [DruxtWebformElementMixin],
}
</script>
