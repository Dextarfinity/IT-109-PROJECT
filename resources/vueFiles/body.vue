<template>
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900 font-space-mono">
    <!-- Navbar -->
    <nav class="bg-black shadow-lg fixed w-full z-10">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex-shrink-0 flex items-center">
            <!-- <img class="h-8 w-auto" src="/placeholder.svg?height=32&width=32" alt="Hatid Kita Logo" /> -->
          </div>
          <div class="flex space-x-8">
            <router-link to="/main"><button>Home</button></router-link>
            <router-link to="/faq"><button>FAQs</button></router-link>
            <router-link to="/setting"><button>Setting</button></router-link>
            <router-link to="/profile"><button>User</button></router-link>
            
          </div>
        </div>
      </div>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script setup>
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap");

.font-space-mono {
  font-family: "Space Mono", monospace;
}
</style>
