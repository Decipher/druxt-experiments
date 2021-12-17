export default {
  target: 'static',
  ssr: false,

  vue: {
    config: {
      // Ignore A-Frame elements.
      ignoredElements: [/^a-/]
    }
  },

  buildModules: [
    '@nuxtjs/eslint-module',
    'druxt-site',
  ],

  druxt: {
    baseUrl: 'https://demo-api.druxtjs.org',
    site: { layout: false },
    router: { wildcard: false },
  },

  telemetry: true
}
