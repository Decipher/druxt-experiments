<template>
  <div>
    Webform:
    <DruxtDebug :json="elements" summary="Webform elements" />

    <DruxtWebformElement
      v-for="[key, element] in Object.entries(elements)"
      :key="key"
      :element="element"
      :name="key"
    />
  </div>
</template>

<script>
import yaml from 'js-yaml'
import { DruxtEntityMixin } from 'druxt-entity'

export default {
  mixins: [DruxtEntityMixin],

  props: {
    schema: undefined,
  },

  computed: {
    elements: ({ entity }) => yaml.load(entity.attributes.elements)
  },
}
</script>
