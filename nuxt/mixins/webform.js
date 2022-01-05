export default {
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

  computed: {
    children: ({ element }) => Object.fromEntries(Object.keys(element)
      .filter((s) => s[0] !== '#')
      .map((s) => [s, element[s]]))
  }
}
