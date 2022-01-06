<template>
  <VRow>
    <slot
      name="results"
      :wrapper="{
        component: 'VCol',
        propsData: {
          cols: 4
        }
      }"
    />
  </VRow>
</template>
