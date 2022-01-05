<template>
  <div>
    <DruxtDebug
      summary="Webform node"
      :json="entity"
    />

    <slot name="webform" />
  </div>
</template>

<script>
import { DruxtEntityMixin } from 'druxt-entity'

export default {
  mixins: [DruxtEntityMixin],
}
</script>
