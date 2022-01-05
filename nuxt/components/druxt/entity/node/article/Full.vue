<template>
  <div>
    <h1 v-text="$attrs.entity.attributes.title" />
    <blockquote>This is being rendered via the <code>full</code> view mode</blockquote>
    <DruxtDebug :json="$attrs.entity" />
    <slot />
  </div>
</template>
