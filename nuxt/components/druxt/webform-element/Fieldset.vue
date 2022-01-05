<template>
  <fieldset>
    <legend v-if="element['#title']" v-text="element['#title']" />

    <DruxtWebformElement
      v-for="[key, child] in Object.entries(children)"
      :key="key"
      :element="child"
      :name="key"
    />
  </fieldset>
</template>

<script>
import DruxtWebformElementMixin from '~/mixins/webform'

export default {
  mixins: [DruxtWebformElementMixin],
}
</script>
