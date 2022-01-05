<template>
  <div>
    <h2 v-text="$attrs.entity.attributes.title" />
    <DruxtDebug :json="$attrs.entity" />
    <slot />
    <NuxtLink :to="`node/${$attrs.entity.attributes.drupal_internal__nid}`">Read more</NuxtLink>
  </div>
</template>
