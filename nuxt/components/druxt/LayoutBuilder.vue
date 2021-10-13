<template>
  <div class="layout_builder">
    <component v-for="(section, index) of sections" :is="componentIs(section.layout_id)" :key="index">
      <template v-for="component of Object.values(section.components)" v-slot:[component.uuid]>
        <component
          v-if="componentIs(component.configuration.id) !== 'div'"
          :is="componentIs(component.configuration.id)"
          :key="component.uuid"
          :component="component"
          :entity="entity"
        />

        <DruxtDebug v-else :key="component.uuid" :summary="`${componentName(component.configuration.id)} missing`">
          <pre><code>{{ JSON.stringify(component, null, '  ') }}</code></pre>
        </DruxtDebug>
      </template>
    </component>
  </div>
</template>

<script>
import { pascalCase, upperFirst } from 'scule'

export default {
  props: {
    entity: {
      type: Object,
      required: true,
    }
  },

  computed: {
    sections: ({ entity }) => entity.attributes.layout_builder__layout
  },

  methods: {
    componentIs(id) {
      const name = this.componentName(id)
      return this.$nuxt.$options.components[name] ? name : 'div'
    },

    componentName(id) {
      return `DruxtLayoutBuilder${pascalCase(id.split(':').map((s) => upperFirst(s)).join(''))}`
    },
  }
}
</script>
