export default {
  buildModules: [
    '@nuxtjs/eslint-module',
    'druxt-site',
  ],

  plugins: [{ src: '~/plugins/vuex-persistedstate.client.js' }],

  druxt: {
    baseUrl: `https://8080-${process.env.GITPOD_WORKSPACE_ID}.${process.env.GITPOD_WORKSPACE_CLUSTER_HOST}`
  },

  telemetry: true
}
