<template>
  <div>
    <DruxtWebformElement
      v-for="[key, child] in Object.entries(children)"
      :key="key"
      :element="child"
      :name="key"
    />
  </div>
</template>

<script>
import DruxtWebformElementMixin from '~/mixins/webform'

export default {
  mixins: [DruxtWebformElementMixin],
}
</script>
