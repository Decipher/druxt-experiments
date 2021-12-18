<template>
  <a-scene v-if="!$fetchState.pending">
    <a-assets>
      <!-- Frontpage images -->
      <img
        v-for="entity of views.frontpage.data"
        :key="entity.id"
        v-bind="getImageProps(entity, 'field_media_image.field_media_image')"
      />
    </a-assets>

    <!-- Hand controls -->
    <a-entity id="leftHand" laser-controls="hand: left" raycaster="objects: .raycastable" />
    <a-entity id="rightHand" laser-controls="hand: right" raycaster="objects: .raycastable" line="color: #118A7E" />

    <!-- UI -->
    <a-entity position="0 1.6 -2.5">
      <!-- Frontpage -->
      <a-entity>
        <a-entity
          v-for="(entity, index) of views.frontpage.data"
          :key="entity.id"
          :position="[index * 1.1 - (views.frontpage.data.length * 1.1 / 2), 0, 0].join(' ')"
          :text="{
            color: '#000',
            value: entity.attributes.title
          }"
        >
          <a-plane
            position="0 -0.55 0"
            :src="`#${getImageProps(entity, 'field_media_image.field_media_image').id}`"
          />
        </a-entity>
      </a-entity>
    </a-entity>

    <!-- Sky (background) -->
    <a-sky v-bind="sky" />
  </a-scene>

  <!-- @todo - Add loading indicator -->
  <div v-else />
</template>

<script>
import 'aframe'
import { DrupalJsonApiParams } from 'drupal-jsonapi-params'

export default {
  data: () => ({
    // Druxt Views.
    views: {
      frontpage: {
        query: new DrupalJsonApiParams()
          .addInclude(['field_media_image.field_media_image'])
      }
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
      (await Promise.all(Object.entries(this.views).map(([viewId, { query }]) => this.$store.dispatch('druxt/views/getResults', { viewId, displayId: 'default', query }))))
        .map((o) => [o.links.self.href.split('/').splice(o.links.self.href.split('/').length - 2, 1), o])
    )
  },

  methods: {
    getImageProps(entity, relationship) {
      const fields = relationship.split('.')

      // Find the related image.
      // @TODO - Some of this logic should be done in Druxt.
      let current = entity
      for (const field of fields) {
        // @TODO - Remove dependency on the Frontpage view.
        current = this.views.frontpage.included.find((o) => o.id === current.relationships[field].data.id)
      }

      return {
        id: current.id,
        src: current.attributes.uri.url
      }
    }
  }
}
</script>
