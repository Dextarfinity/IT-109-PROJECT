<template>
  <nav class="bg-black shadow-lg fixed w-full z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex-shrink-0 flex items-center">
          <!-- <img class="h-8 w-auto" src="/placeholder.svg?height=32&width=32" alt="Hatid Kita Logo" /> -->
        </div>
        <div class="flex space-x-8">
          <a
            v-for="(item, index) in navItems"
            :key="index"
            :href="item.href"
            class="text-white hover:text-green-500 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium transition-colors duration-200"
            :class="{
              'text-green-500 border-green-500': activeSection === item.href.slice(1),
            }"
            @click="setActiveSection(item.href.slice(1))"
          >
            {{ item.name }}
          </a>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref } from "vue";

const navItems = [
  { name: "Home", href: "#home" },
  { name: "FAQs", href: "#faqs" },
  { name: "Profile", href: "#profile" },
  { name: "Settings", href: "#settings" },
];

const activeSection = ref("home");
const setActiveSection = (section) => {
  activeSection.value = section;
};
</script>
