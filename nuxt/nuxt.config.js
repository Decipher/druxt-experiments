export default {
  buildModules: [
    '@nuxtjs/eslint-module',
    'druxt-site',
  ],

  druxt: {
    baseUrl: `https://8080-${process.env.GITPOD_WORKSPACE_ID}.${process.env.GITPOD_WORKSPACE_CLUSTER_HOST}`,
    endpoint: '/api/v1',
    entity: { components: { fields: false }},
    site: { layout: false },
  },

  telemetry: true
}
