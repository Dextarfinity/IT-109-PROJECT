<template>
  <section
    id="profile"
    class="h-screen bg-cover bg-center relative flex items-center justify-center"
    :style="{ backgroundImage: 'url(/placeholder.svg?height=1080&width=1920)' }"
  >
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8" style="z-index: 1">
      <h2
        class="text-4xl font-extrabold text-center mb-12 animate-fade-in-down text-white"
      >
        Student ID Card
      </h2>
      <div class="bg-white rounded-lg shadow-md p-6 sm:p-8 animate-fade-in">
        <div class="flex:col items-center md:items-stretch space-y-8 sm:space-y-4">
          <!-- Image Section -->
          <div class="w-full flex flex-col items-center">
            <div v-if="avatarUrl" class="w-full">
              <img
                :src="avatarUrl"
                alt="Avatar"
                class="w-full h-auto rounded-full shadow-md"
              />
            </div>
            <div
              v-else
              class="flex items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-full"
            >
              <i class="bx bx-user text-gray-400 text-6xl"></i>
            </div>
            <input
              type="file"
              @change="handleAvatarUpload"
              class="mt-4 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
            />
          </div>

          <!-- Details Section -->
          <div class="w-full text-left">
            <h3
              class="text-2xl font-semibold mb-2 mt-3"
              style="text-align: left; color: black"
            >
              {{ user.name }}
            </h3>
            <p class="text-gray-700 mb-2" style="text-align: left">
              Email: {{ user.email }}
            </p>

            <!-- Phone Number Section -->
            <div class="pr-6" style="text-align: left">
              <div class="flex items-center space-x-4">
                <label for="phone" class="text-gray-700">Phone:</label>
                <div
                  class="border border-gray-300 rounded-lg p-2 w-full"
                  style="color: black; background-color: white"
                >
                  {{ user.phone }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from "vue";

// Define the user object with ref
const user = ref({
  name: "John Doe",
  email: "john.doe@example.com",
  phone: "123-456-7890",
});

// Define avatarUrl as a reactive ref
const avatarUrl = ref(null);

// Function to handle avatar upload
const handleAvatarUpload = (event) => {
  const file = event.target.files[0];
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = (e) => {
      avatarUrl.value = e.target.result;
    };
    reader.readAsDataURL(file);
  } else {
    alert("Please upload a valid image file.");
  }
};
</script>

<style scoped>
/* Optional animation styles if you're using them */
@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in-down {
  animation: fadeInDown 0.5s ease-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.animate-fade-in {
  animation: fadeIn 1s ease-in-out;
}
</style>
