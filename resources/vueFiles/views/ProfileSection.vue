<template>
  <section id="profile" class="h-screen py-16 bg-gray-200 flex items-center">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-4xl font-extrabold text-center mb-12 animate-fade-in-down">
        Student ID Card
      </h2>
      <div class="bg-white rounded-lg shadow-md p-8 animate-fade-in">
        <div
          class="flex flex-col md:flex-row items-center md:items-stretch space-y-8 md:space-y-0 md:space-x-8"
        >
          <div class="w-full md:w-1/3">
            <img
              v-if="avatarUrl"
              :src="avatarUrl"
              alt="Avatar"
              class="w-full h-auto rounded-full shadow-md"
            />
            <input type="file" @change="handleAvatarUpload" class="mt-4" />
          </div>
          <div class="w-full md:w-2/3">
            <h3 class="text-2xl font-semibold">{{ user.name }}</h3>
            <p class="text-gray-700 mb-2">Email: {{ user.email }}</p>
            <p class="text-gray-700">Phone: <input v-model="user.phone" type="text" /></p>
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
