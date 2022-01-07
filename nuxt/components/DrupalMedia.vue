<template>
  <DruxtEntity v-bind="props" />
</template>

<script>
export default {
  name: 'DrupalMedia',

  props: {
    dataEntityBundle: {
      type: String,
      required: true,
    },
    dataEntityType: {
      type: String,
      default: 'media',
    },
    dataEntityUuid: {
      type: String,
      required: true,
    },
  },

  computed: {
    props: ({ dataEntityBundle, dataEntityType, dataEntityUuid }) => ({
      type: [dataEntityType, dataEntityBundle].join('--'),
      uuid: dataEntityUuid
    })
  }
}
</script>
