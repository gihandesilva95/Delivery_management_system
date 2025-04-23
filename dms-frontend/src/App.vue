<template>
  <div>
    <nav>
      <router-link to="/">Delivery Form</router-link> |
      <router-link to="/deliveries">Delivery List</router-link>
    </nav>
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>

<style scoped>
nav {
  margin-bottom: 1rem;
}
nav a {
  margin-right: 1rem;
  text-decoration: none;
}
</style>
