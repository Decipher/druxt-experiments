<script>
import DruxtModule from 'druxt/dist/components/DruxtModule.vue'

export default {
  extends: DruxtModule,

  name: 'DruxtWebformElement',

  props: {
    element: {
      type: Object,
      required: true,
    },

    name: {
      type: String,
      required: true,
    }
  },

  druxt: {
    componentOptions: ({ element, name }) => [[element['#type'], name]],

    propsData: ({ element, name }) => ({ element, name }),

    slots(h) {
      return {
        default: () => h('DruxtDebug', {
          props: {
            json: this.element,
            summary: this.name,
          }
        })
      }
    }
  }
}
</script>
