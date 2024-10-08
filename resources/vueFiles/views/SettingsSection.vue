<template>
  <section id="settings" class="h-screen py-16 bg-gray-300 flex items-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-4xl font-extrabold text-center mb-12 animate-fade-in-down">
        Settings
      </h2>
      <div class="bg-white rounded-lg shadow-md p-6">
        <div class="space-y-4">
          <h3 class="text-2xl font-semibold">Notification Settings</h3>
          <label class="inline-flex items-center">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-green-600" />
            <span class="ml-2 text-gray-700">Enable Notifications</span>
          </label>
          <h3 class="text-2xl font-semibold">Privacy Settings</h3>
          <label class="inline-flex items-center">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-green-600" />
            <span class="ml-2 text-gray-700">Share location with drivers</span>
          </label>
        </div>
      </div>
    </div>
  </section>
</template>
