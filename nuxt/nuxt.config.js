export default {
  target: 'static',
  generate: { routes: ['/'] },

  buildModules: [
    '@nuxtjs/eslint-module',
    '@nuxtjs/tailwindcss',
    'druxt-site',
  ],

  druxt: {
    baseUrl: `https://8080-${process.env.GITPOD_WORKSPACE_ID}.${process.env.GITPOD_WORKSPACE_CLUSTER_HOST}`,
    views: {
      query: {
        bundleFilter: true,
      }
    }
  },

  telemetry: true
}
