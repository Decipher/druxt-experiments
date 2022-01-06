export default {
  buildModules: [
    '@nuxtjs/eslint-module',
    'druxt-site',
  ],

  druxt: {
    baseUrl: `https://8080-${process.env.GITPOD_WORKSPACE_ID}.${process.env.GITPOD_WORKSPACE_CLUSTER_HOST}`,
    entity: { components: { fields: false }},
    router: { wildcard: false },
    site: { layout: false }
  },

  telemetry: true
}
