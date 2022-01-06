import colors from 'vuetify/es5/util/colors'

export default {
  buildModules: [
    '@nuxtjs/eslint-module',
    '@nuxtjs/vuetify',
    'druxt-site',
  ],

  druxt: {
    baseUrl: `https://8080-${process.env.GITPOD_WORKSPACE_ID}.${process.env.GITPOD_WORKSPACE_CLUSTER_HOST}`
  },

  vuetify: {
    customVariables: ['~/assets/variables.scss'],
    theme: { dark: false }
  },

  telemetry: true
}
