<template>
  <div v-if="!$fetchState.pending">
    <DruxtEntity
      v-for="paragraph of paragraphs"
      :key="paragraph.data.id"
      :mode="(paragraph.data.attributes || {}).paragraph_view_mode || 'default'"
      :type="paragraph.data.type"
      :uuid="paragraph.data.id"
    />
  </div>
</template>

<script>
import { DrupalJsonApiParams } from "drupal-jsonapi-params";
import { DruxtFieldMixin } from "druxt-entity";

export default {
  mixins: [DruxtFieldMixin],
  data: () => ({ paragraphs: [] }),
  async fetch() {
    this.paragraphs = await Promise.all(
      this.model.data.map((o) =>
        this.$store.dispatch("druxt/getResource", {
          type: o.type,
          id: o.id,
          query: new DrupalJsonApiParams().addFields(o.type, [
            "paragraph_view_mode",
          ]),
        })
      )
    );
  },
};
</script>
