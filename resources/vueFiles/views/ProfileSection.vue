<template>
  <section id="profile" class="h-screen py-16 bg-gray-200 flex items-center">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2
        class="text-4xl font-extrabold text-center mb-12 animate-fade-in-down text-black"
      >
        Student ID Card
      </h2>
      <div class="bg-white rounded-lg shadow-md p-6 sm:p-8 animate-fade-in">
        <div
          class="flex flex-col sm:flex-col md:flex-row items-center md:items-stretch space-y-8 sm:space-y-4 md:space-y-0 md:space-x-8"
        >
          <!-- Image Section -->
          <div class="w-full sm:w-2/3 md:w-1/3">
            <img
              v-if="avatarUrl"
              :src="avatarUrl"
              alt="Avatar"
              class="w-full h-auto rounded-full shadow-md"
            />
            <input
              type="file"
              @change="handleAvatarUpload"
              class="mt-4 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
            />
          </div>

          <!-- Details Section -->
          <div class="w-full sm:w-full md:w-2/3">
            <h3 class="text-2xl font-semibold mb-4 text-center md:text-left">
              {{ user.name }}
            </h3>
            <p class="text-gray-700 mb-2 text-center md:text-left">
              Email: {{ user.email }}
            </p>

            <!-- Phone Number Section with Flex -->
            <div class="flex items-center space-x-4 p-6">
              <label for="phone" class="text-gray-700">Phone:</label>
              <input
                v-model="user.phone"
                id="phone"
                type="text"
                class="border border-gray-300 rounded-lg p-2 mt-2 w-full sm:w-1/8 md:w-1/3"
                style="color: black; background-color: white"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from "vue";

const user = ref({
  name: "John Doe",
  email: "john.doe@example.com",
  phone: "123-456-7890",
});

const avatarUrl = ref(null);

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
