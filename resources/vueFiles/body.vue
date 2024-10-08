<template>
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900 font-space-mono">
    <!-- Navbar -->
    <nav class="bg-black shadow-lg fixed w-full z-10">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex-shrink-0 flex items-center">
            <!-- <img class="h-8 w-auto" src="/placeholder.svg?height=32&width=32" alt="Hatid Kita Logo" /> -->
          </div>
          <div class="hidden space-x-8 mt-8 lg:flex xl:flex">
            <router-link to="/main"><button>Home</button></router-link>
            <router-link to="/faq"><button>FAQs</button></router-link>
            <router-link to="/setting"><button>Setting</button></router-link>
            <router-link to="/profile"><button>Profile</button></router-link>
          </div>
        </div>
      </div>
    </nav>
    <router-view></router-view>
  </div>
  <footer class="footer-menu">
    <div class="footer-menu flex lg:hidden xl:hidden">
      <router-link to="/main">
        <button class="footer-button">
          <i class="bx bx-home"></i>
          <span>Home</span>
        </button>
      </router-link>

      <router-link to="/faq">
        <button class="footer-button">
          <i class="bx bx-question-mark"></i>
          <span>FAQs</span>
        </button>
      </router-link>

      <router-link to="/setting">
        <button class="footer-button">
          <i class="bx bx-cog"></i>
          <span>Setting</span>
        </button>
      </router-link>

      <router-link to="/profile">
        <button class="footer-button">
          <i class="bx bx-user"></i>
          <span>Profile</span>
        </button>
      </router-link>
    </div>
  </footer>
</template>

<script>
import "boxicons/css/boxicons.min.css";
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap");

.font-space-mono {
  font-family: "Space Mono", monospace;
}
.footer-menu {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: space-around;
  background-color: #1a202c; /* Dark background for dark mode */
  padding: 10px 0;
}

.footer-button {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #fff; /* White color for dark mode */
  background: none;
  border: none;
}

.footer-button i {
  font-size: 24px;
  color: white;
}

.footer-button span {
  font-size: 12px;
  margin-top: 4px;
}
</style>
