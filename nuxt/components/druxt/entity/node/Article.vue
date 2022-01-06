<template>
  <div>
    <h1 v-text="$attrs.entity.attributes.title" />
    <!-- <DruxtDebug :json="$attrs" summary="$attrs" /> -->
    <slot name="body" />
  </div>
</template>
