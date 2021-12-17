<template>
  <a-scene>
    <!-- Hand controls -->
    <a-entity id="leftHand" laser-controls="hand: left" raycaster="objects: .raycastable" />
    <a-entity id="rightHand" laser-controls="hand: right" raycaster="objects: .raycastable" line="color: #118A7E" />

    <!-- UI -->
    <!-- @TODO - Add loading indicator -->
    <a-entity
      v-if="!$fetchState.pending"
      position="0 1.6 -2.5"
    >
      <a-entity
        v-for="(item, index) of views.frontpage.data"
        :key="item.id"
        :position="[index, 0, -2.5].join(' ')"
        :text="{
          color: '#000',
          value: JSON.stringify(item)
        }"
      >
      </a-entity>
    </a-entity>

    <!-- Sky (background) -->
    <a-sky v-bind="sky" />
  </a-scene>
</template>

<script>
import 'aframe'

export default {
  data: () => ({
    // Druxt Views.
    views: {
      frontpage: undefined
    },

    // Sky (background).
    sky: {
      color: '#ECECEC'
    },
  }),

  /**
   * Nuxt fetch() hook; Loads required data:
   * - Views via the DruxtViews vuex store.
   */
  async fetch() {
    // Load all required Views.
    // @todo - add support for other displays and queries?
    this.views = Object.fromEntries(
      (await Promise.all(Object.keys(this.views).map((viewId) => this.$store.dispatch('druxt/views/getResults', { viewId, displayId: 'default' }))))
        .map((o) => [o.links.self.href.split('/').splice(o.links.self.href.split('/').length - 2, 1), o])
    )
  }
}
</script>
