<template>
  <div>
    <h1 class="text-bold text-black">This is Body.vue mounted on Main-content</h1>
    <h1 class="text-bold text-black">NAVBAR</h1>
    <router-link to="/"><button class="text-black px-5">Go to Dashboard</button></router-link>
    <router-link to="/profile"><button class="text-black">Go to Profile</button></router-link>
    <router-view></router-view>
    <!-- Removed the router-view to prevent nesting -->
  </div>
</template>

<script>
export default {
  name: 'Body'
}
</script>

<style scoped>
/* Your styles here */
</style>
