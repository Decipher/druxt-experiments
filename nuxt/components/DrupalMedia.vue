<template>
  <DruxtEntity v-bind="props" />
</template>

<script>
export default {
  name: 'DrupalMedia',

  props: {
    'data-entity-type': {
      type: String,
      default: 'media',
    },
    'data-entity-uuid': {
      type: String,
      required: true,
    },
  },

  computed: {
    props: ({ dataEntityType, dataEntityUuid }) => ({
      // @todo - The Bundle is currently hardcoded to 'image'.
      type: [dataEntityType, 'image'].join('--'),
      uuid: dataEntityUuid
    })
  }
}
</script>
