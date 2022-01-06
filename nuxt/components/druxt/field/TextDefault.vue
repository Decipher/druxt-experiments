<template>
  <div>
    <p>
      This is the raw CKEditor markup, transpiled using the RuntimeTemplateCompiler to render a DrupalMedia component.
    </p>
    <p>
      The DrupalMedia component registers the required props and passes them through to the DupalEntity component to render the Media Entity using the Default view mode schema configuration.
    </p>
    <p>
      Note: Ideally you would use the Processed data, but currently Drupal doesn't allow you to disable the Drupal Media filter when using the CKEDitor plugin.
    </p>

    <DruxtDebug open>
      <!-- @TODO - ClientOnly required due to runtime-template-compiler hydration leak? -->
      <ClientOnly>
        <runtime-template-compiler :template="`<div>${$attrs.value.value}</div>`" />
      </ClientOnly>
    </DruxtDebug>
  </div>
</template>

<script>
import Vue from 'vue'
import RuntimeTemplateComiler from 'vue-runtime-template-compiler'
Vue.use(RuntimeTemplateComiler)

export default {}
</script>
