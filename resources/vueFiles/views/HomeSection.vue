<template>
  <section
    id="home"
    class="h-screen bg-cover bg-center relative flex items-center justify-center"
    :style="{ backgroundImage: 'url(/placeholder.svg?height=1080&width=1920)' }"
  >
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h1
        class="text-5xl sm:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-down text-white"
      >
        HATID KITA
      </h1>
      <h3 class="text-2xl sm:text-3xl font-bold mb-8 animate-fade-in-up text-white">
        A SYSTEM PROTOTYPE
      </h3>
      <div
        class="bg-black bg-opacity-75 text-green-400 p-4 rounded-lg shadow-lg font-mono text-sm h-64 w-full max-w-2xl mx-auto overflow-y-auto mb-6 text-left animate-fade-in"
      >
        <div v-for="(log, index) in terminalLogs" :key="index">
          <span class="text-green-400">$</span> {{ log }}
        </div>
      </div>
      <div
        class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center animate-fade-in-up"
      >
        <button
          @click="callDriver"
          class="inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 transition duration-300 ease-in-out transform hover:scale-105"
        >
          <TruckIcon class="w-5 h-5 mr-2" />
          Call Driver
        </button>
        <select
          v-model="selectedLocation"
          class="px-4 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
        >
          <option value="">Select Location</option>
          <option v-for="location in locations" :key="location" :value="location">
            {{ location }}
          </option>
        </select>
        <input
          v-model="specificLocation"
          type="text"
          placeholder="Specific location in CED"
          class="px-4 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
        />
      </div>
      <div
        :class="[
          statusColorClass,
          'mt-4 px-4 py-3 text-sm font-medium text-white rounded-lg text-center transition-all duration-500 ease-in-out inline-block',
        ]"
      >
        {{ driverStatus }}
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed } from "vue";
import { TruckIcon } from "lucide-vue-next";

const terminalLogs = ref([
  "Welcome to Hatid Kita!",
  "System initialized...",
  "Ready for ride requests.",
]);

const driverStatus = ref("Idle");
const statusColors = {
  Idle: "bg-gray-500",
  "Finding a driver": "bg-yellow-500",
  "Driver is on the way": "bg-blue-500",
  "Driver has arrived": "bg-green-500",
};

const statusColorClass = computed(() => statusColors[driverStatus.value]);

const selectedLocation = ref("");
const specificLocation = ref("");

const locations = [
  "CED",
  "NSB",
  "HOSTEL",
  "NEW ADMIN",
  "OSAS",
  "OLD CAS",
  "KINAADMAN",
  "LIBRARY",
  "CCIS",
  "CEGS",
  "VILLARES",
];

const callDriver = () => {
  if (!selectedLocation.value) {
    alert("Please select a location");
    return;
  }

  terminalLogs.value.push(
    `Requesting a driver for ${selectedLocation.value}${
      specificLocation.value ? ` - ${specificLocation.value}` : ""
    }...`
  );
  driverStatus.value = "Finding a driver";

  setTimeout(() => {
    terminalLogs.value.push("Driver found! ETA: 5 minutes");
    driverStatus.value = "Driver is on the way";
  }, 3000);

  setTimeout(() => {
    terminalLogs.value.push("Driver has arrived at your location");
    driverStatus.value = "Driver has arrived";
  }, 8000);
};
</script>
