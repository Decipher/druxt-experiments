<template>
  <DruxtEntity type="file--file" :uuid="model.data.id">
    <template #default="{ entity }">
      <img :src="entity.links.thumbnail.href" />
    </template>
  </DruxtEntity>
</template>

<script>
import { DruxtFieldMixin } from 'druxt-entity'
export default {
  mixins: [DruxtFieldMixin]
}
</script>
