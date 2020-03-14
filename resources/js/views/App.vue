<template>
  <v-app>
      <v-navigation-drawer app></v-navigation-drawer>
      <v-app-bar app></v-app-bar>
      <v-content>
          <v-container fluid>
              <router-link tag="li" to="/">Inicio</router-link>
              <router-link tag="li" to="/nosotros">Nosotros</router-link>
              <router-view></router-view>
          </v-container>
      </v-content>
      <v-footer app></v-footer>
  </v-app>
</template>

<script>
export default {

}
</script>

<style>

</style>