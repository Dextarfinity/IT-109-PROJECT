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

    <!-- Home Section -->
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

    <!-- FAQs Section -->
    <section id="faqs" class="h-screen py-16 bg-gray-100 flex items-center">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        <h2 class="text-4xl font-extrabold text-center mb-12 animate-fade-in-down">
          Frequently Asked Questions
        </h2>
        <div class="space-y-8">
          <div
            v-for="(faq, index) in faqs"
            :key="index"
            class="bg-white rounded-lg shadow-md p-6 transition-all duration-300 hover:shadow-xl animate-fade-in"
            :style="{ animationDelay: `${index * 150}ms` }"
          >
            <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ faq.question }}</h3>
            <p class="text-gray-600">{{ faq.answer }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Profile Section -->
    <section id="profile" class="h-screen py-16 bg-gray-200 flex items-center">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-extrabold text-center mb-12 animate-fade-in-down">
          Student ID Card
        </h2>
        <div class="bg-white rounded-lg shadow-md p-8 animate-fade-in">
          <div
            class="flex flex-col md:flex-row items-center md:items-stretch space-y-8 md:space-y-0 md:space-x-8"
          >
            <!-- Left: User's face -->
            <div
              class="w-full md:w-1/4 flex flex-col items-center justify-center bg-green-100 rounded-lg p-4"
            >
              <img
                :src="user.avatar"
                :alt="`${user.name}'s Avatar`"
                class="w-40 h-40 rounded-full shadow-lg mb-4"
              />
              <p class="text-lg font-semibold text-green-800">{{ user.studentId }}</p>
            </div>

            <!-- Middle: User's information -->
            <div
              class="w-full md:w-1/2 flex flex-col justify-center bg-white rounded-lg p-6 border-2 border-green-500"
            >
              <h3 class="text-3xl font-semibold text-black mb-4">{{ user.name }}</h3>
              <p class="text-xl text-green-800 mb-2">{{ user.role }}</p>
              <p class="text-lg text-green-700 mb-2">{{ user.course }}</p>
              <div class="mt-4 space-y-2">
                <p class="flex items-center text-black">
                  <MailIcon class="w-5 h-5 mr-2 text-green-500" />
                  {{ user.email }}
                </p>
                <p class="flex items-center text-black">
                  <PhoneIcon class="w-5 h-5 mr-2 text-green-500" />
                  {{ user.phone }}
                </p>
              </div>
            </div>

            <!-- Right: Recent rides -->
            <div class="w-full md:w-1/4 bg-green-100 rounded-lg p-4">
              <h4 class="text-xl font-semibold mb-4 text-green-900">Recent Rides</h4>
              <ul class="space-y-2">
                <li
                  v-for="(ride, index) in recentRides.slice(0, 3)"
                  :key="index"
                  class="bg-white rounded-lg p-2 text-sm text-green-800"
                >
                  {{ ride.date }} - {{ ride.route }}
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Settings Section -->
    <section id="settings" class="h-screen py-16 bg-gray-100 flex items-center">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-extrabold text-center mb-12 animate-fade-in-down">
          Settings
        </h2>
        <div class="bg-white rounded-lg shadow-md p-8 animate-fade-in">
          <div
            class="flex flex-col md:flex-row items-center md:items-stretch space-y-8 md:space-y-0 md:space-x-8"
          >
            <!-- Left: User's face -->
            <div
              class="w-full md:w-1/3 flex flex-col items-center justify-center bg-green-100 rounded-lg p-4"
            >
              <img
                :src="settings.avatar"
                :alt="`${user.name}'s Avatar`"
                class="w-40 h-40 rounded-full shadow-lg mb-4"
              />
              <input
                type="file"
                @change="handleAvatarChange"
                accept="image/*"
                class="hidden"
                ref="avatarInput"
              />
              <button
                @click="$refs.avatarInput.click()"
                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300"
              >
                Change Profile Picture
              </button>
            </div>

            <!-- Right: User's information form -->
            <div
              class="w-full md:w-2/3 bg-white rounded-lg p-6 border-2 border-green-500"
            >
              <form @submit.prevent="updateSettings" class="space-y-4">
                <div>
                  <label for="name" class="block text-sm font-medium text-gray-700"
                    >Full Name</label
                  >
                  <input
                    type="text"
                    id="name"
                    v-model="user.name"
                    disabled
                    class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                  />
                </div>
                <div>
                  <label for="studentId" class="block text-sm font-medium text-gray-700"
                    >Student ID</label
                  >
                  <input
                    type="text"
                    id="studentId"
                    v-model="user.studentId"
                    disabled
                    class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                  />
                </div>
                <div>
                  <label for="course" class="block text-sm font-medium text-gray-700"
                    >Course</label
                  >
                  <input
                    type="text"
                    id="course"
                    v-model="user.course"
                    disabled
                    class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                  />
                </div>
                <div>
                  <label for="email" class="block text-sm font-medium text-gray-700"
                    >Email</label
                  >
                  <input
                    type="email"
                    id="email"
                    v-model="user.email"
                    disabled
                    class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                  />
                </div>
                <div>
                  <label for="phone" class="block text-sm font-medium text-gray-700"
                    >Phone</label
                  >
                  <input
                    type="tel"
                    id="phone"
                    v-model="settings.phone"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                  />
                </div>
                <div>
                  <button
                    type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                  >
                    Update Settings
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, computed, reactive } from "vue";
import { TruckIcon, MailIcon, PhoneIcon } from "lucide-vue-next";

const activeSection = ref("home");
const setActiveSection = (section) => {
  activeSection.value = section;
};

const navItems = [
  { name: "Home", href: "#home" },
  { name: "FAQs", href: "#faqs" },
  { name: "Profile", href: "#profile" },
  { name: "Settings", href: "#settings" },
];

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

const faqs = [
  {
    question: "How do I request a ride?",
    answer:
      "To request a ride, select your location from the dropdown menu, provide a specific location if necessary, and click the 'Call Driver' button on the home screen.",
  },
  {
    question: "How long does it usually take for a driver to arrive?",
    answer:
      "Driver arrival times can vary depending on your location and driver availability. Typically, you can expect a driver to arrive within 5-15 minutes of your request.",
  },
  {
    question: "Is Hatid Kita available 24/7?",
    answer:
      "Hatid Kita operates during school hours and for a set period before and after school. Please check the app for the exact operating hours in your area.",
  },
];

const user = reactive({
  name: "John Doe",
  role: "Student",
  course: "Bachelor of Science in Computer Science",
  email: "john.doe@example.com",
  phone: "+1 234 567 8900",
  avatar: "/placeholder.svg?height=150&width=150",
  studentId: "2023-12345",
});

const recentRides = [
  { date: "May 15, 2023", route: "CED to HOSTEL" },
  { date: "May 14, 2023", route: "HOSTEL to CCIS" },
  { date: "May 13, 2023", route: "LIBRARY to CED" },
];

const settings = reactive({
  phone: user.phone,
  avatar: user.avatar,
});

const updateSettings = () => {
  user.phone = settings.phone;
  user.avatar = settings.avatar;
  alert("Settings updated successfully!");
};

const handleAvatarChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      settings.avatar = e.target.result;
    };
    reader.readAsDataURL(file);
  }
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap");

.font-space-mono {
  font-family: "Space Mono", monospace;
}

@keyframes fade-in-down {
  0% {
    opacity: 0;
    transform: translateY(-10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fade-in-up {
  0% {
    opacity: 0;
    transform: translateY(10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fade-in {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes fade-in-left {
  0% {
    opacity: 0;
    transform: translateX(-10px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fade-in-right {
  0% {
    opacity: 0;
    transform: translateX(10px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-fade-in-down {
  animation: fade-in-down 0.5s ease-out;
}

.animate-fade-in-up {
  animation: fade-in-up 0.5s ease-out;
}

.animate-fade-in {
  animation: fade-in 0.5s ease-out;
}

.animate-fade-in-left {
  animation: fade-in-left 0.5s ease-out;
}

.animate-fade-in-right {
  animation: fade-in-right 0.5s ease-out;
}
</style>
