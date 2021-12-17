<template>
  <div class="card bordered hover:shadow-xl">
    <figure>
      <img
        :alt="image.alt"
        class="object-cover h-48"
        :src="image.src"
      />
    </figure>
    <div class="card-body">
      <h2 class="card-title">
        {{ title }}
        <!-- <div class="badge mx-2 badge-secondary">NEW</div> -->
      </h2>
      <slot />
      <div
        v-if="link.to || link.href"
        class="justify-end card-actions"
      >
        <component
          :is="link.href ? 'a' : 'NuxtLink'"
          class="btn btn-secondary"
          v-bind="{
            href: link.href,
            to: link.to,
          }"
          v-text="link.text"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    link: {
      type: Object,
      default: () => ({
        href: undefined,
        text: 'More info',
        to: undefined,
      })
    },
    image: {
      type: Object,
      default: () => ({
        alt: undefined,
        src: undefined,
      })
    }
  }
}
</script>
