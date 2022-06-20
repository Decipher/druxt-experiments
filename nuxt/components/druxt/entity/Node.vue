
<template>
  <component :is="component.is" v-bind="component.bind">
    <h2 v-text="entity.attributes.title" />
    <slot />
  </component>
</template>

<script>
import { DruxtEntityMixin } from 'druxt-entity'

export default {
  mixins: [DruxtEntityMixin],

  computed: {
    component: ({ $parent, entity }) => ({
      is: $parent.mode === 'full' ? 'div' : 'nuxt-link',
      bind: $parent.mode === 'full' ? undefined : {
        to: entity.attributes.path.alias
      }
    })
  }
}
</script>
