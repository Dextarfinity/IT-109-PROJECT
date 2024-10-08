<template>
  <section id="faqs" class="h-screen py-16 bg-white flex items-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 mt-24 mb-24">
      <!-- Title -->
      <h2
        class="text-4xl font-extrabold text-center pt-24 mt-24 animate-fade-in-down text-black"
      >
        Frequently Asked Questions
      </h2>

      <!-- FAQs Container -->
      <div class="space-y-8 mb-24">
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
</template>

<script setup>
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
</script>

<style scoped>
/* Fade-in and Slide animations */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Animations */
.animate-fade-in {
  animation: fadeIn 1s ease-in-out forwards;
}

.animate-fade-in-down {
  animation: fadeInDown 1s ease-in-out forwards;
}
</style>
