<template>
  <div class="p-4 h-screen flex flex-col">
    <!-- Header -->
    <DuiNavbar class="mb-8" />

    <!-- Controls -->
    <div class="flex">
      <div class="btn-group flex-1 mb-2">
        <!-- Previous -->
        <button class="btn" :disabled="!hasPrev" @click="onPrev">
          Previous
        </button>

        <!-- Next -->
        <button class="btn" :disabled="!hasNext" @click="onNext">Next</button>
      </div>

      <!-- Selected controls -->
      <div v-if="selected" class="flex gap-2">
        <div
          v-if="selected"
          class="text-xl h-full mt-2 mr-2"
          v-text="selected.attributes.title"
        />

        <div class="btn-group">
          <!-- View -->
          <button
            class="btn btn-square"
            :class="{ 'btn-active': tab === 'view' }"
            @click="tab = 'view'"
          >
            <SvgIconView class="text-black" />
          </button>

          <!-- Comments -->
          <button
            class="btn btn-square"
            :class="{ 'btn-active': tab === 'comments' }"
            @click="tab = 'comments'"
          >
            <SvgIconComments class="text-black" />
          </button>

          <!-- Edit -->
          <!-- <button
            class="btn btn-square"
            :class="{ 'btn-active': tab === 'edit' }"
            @click="tab = 'edit'"
          >
            <SvgIconEdit class="text-black" />
          </button> -->

          <!-- Code -->
          <button
            class="btn btn-square"
            :class="{ 'btn-active': tab === 'code' }"
            @click="tab = 'code'"
          >
            <SvgIconCode class="text-black" />
          </button>
        </div>

        <!-- Close -->
        <button class="btn btn-square" @click="selected = undefined">
          <SvgIconClose class="text-black" />
        </button>
      </div>
    </div>

    <!-- Main -->
    <div class="card bordered">
      <div
        class="card-body overflow-auto grid gap-8"
        :class="{ 'grid-cols-4': selected }"
      >
        <!-- Results -->
        <div
          class="grid gap-4 overflow-auto"
          :class="{ 'grid-cols-2': !selected }"
        >
          <DruxtEntity
            v-for="result of results"
            :key="result.id"
            class="h-full"
            mode="teaser"
            :type="result.type"
            :uuid="result.id"
            :selected="selected"
            @click.native="selected = result"
          />
        </div>

        <!-- Selected -->
        <div v-if="selected" class="col-span-3 overflow-auto">
          <!-- View / Code -->
          <DruxtEntity
            v-if="tab === 'view' || tab === 'code'"
            :code="tab === 'code'"
            :uuid="selected.id"
            :type="selected.type"
          />

          <!-- Edit -->
          <DruxtEntityForm
            v-if="tab === 'edit'"
            :uuid="selected.id"
            :type="selected.type"
          />

          <script
            v-if="tab === 'comments'"
            src="https://giscus.app/client.js"
            data-repo="Decipher/druxt-experiments"
            data-repo-id="R_kgDOGNQrNw"
            data-category="Show and tell"
            data-category-id="DIC_kwDOGNQrN84CAUb2"
            data-mapping="specific"
            :data-term="`DruxtViews - ${selected.attributes.title}`"
            data-reactions-enabled="1"
            data-emit-metadata="0"
            data-theme="light"
            data-lang="en"
            crossorigin="anonymous"
            async
          ></script>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { DruxtViewsViewMixin } from 'druxt-views'

export default {
  mixins: [DruxtViewsViewMixin],

  data: () => ({
    selected: undefined,
    tab: 'view',
  }),

  computed: {
    entity: ({ $store, selected }) =>
      selected && $store.state.druxt.resources[selected.type][selected.id],
    hasNext: ({ $parent }) => $parent.resource.links.next,
    hasPrev: ({ $parent }) => $parent.resource.links.prev,
  },

  watch: {
    async 'selected.id'() {
      if (this.tab === 'comments') {
        this.tab = undefined
        await this.$nextTick()
        this.tab = 'comments'
      }
    }
  },

  methods: {
    onNext() {
      this.model.page = (this.model.page || 0) + 1
      this.$parent.model.page = this.model.page
    },
    onPrev() {
      this.model.page = this.model.page - 1
      this.$parent.model.page = this.model.page
    },
  },

  druxt: {},
}
</script>
