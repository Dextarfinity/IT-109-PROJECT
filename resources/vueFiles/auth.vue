<template>
  <div class="">
    <div id="form-wrapper" class="max-w-md w-full rounded-xl shadow-2xl overflow-hidden p-8 space-y-8 welcome_style">
      <!-- Container holding both login and sign-up forms side by side -->
      <div id="form-container" :class="{'signup-active': currentForm === 'signup'}">
        <!-- Login Form -->
        <div id="login-form" class="form-slide">
          <h2 class="text-center text-4xl font-extrabold text-black">WELCOME</h2>
          <p class="text-center text-black">Sign in to your account</p>
          <form method="POST" action="#" class="space-y-6 text-black">
            <div class="relative">
              <input placeholder=""
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                required="" id="email" name="email" type="email" />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="email">Email address</label>
            </div>
            <div class="relative">
              <input placeholder="Password"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                required="" id="password" name="password" type="password" />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="password">Password</label>
            </div>
            <div class="flex items-center justify-between">
              <label class="flex items-center text-sm text-black">
                <input class="form-checkbox h-4 w-4 text-black bg-black border-black rounded" type="checkbox" />
                <span class="ml-2">Remember me</span>
              </label>
              <a class="text-sm text-black hover:underline" href="#">Forgot your password?</a>
            </div>
            <button
              class="w-full py-2 px-4 bg-black hover:bg-black rounded-md shadow-lg text-white font-semibold transition duration-200"
              type="submit">
              Sign In
            </button>
          </form>
          <div class="text-center text-black">
            Don't have an account?
            <button @click="toggleForm('signup')" id="toggle-signup" class="text-black hover:underline">Sign up</button>
          </div>
        </div>

        <!-- Sign Up Form -->
        <div id="signup-form" class="form-slide">
          <h2 class="text-center text-4xl font-extrabold text-black">SIGN UP</h2>
          <p class="text-center text-black">Create your account</p>
          <form method="POST" action="#" class="space-y-6 text-black">
            <div class="relative">
              <input placeholder="Full Name"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                required="" id="full-name" name="full-name" type="text" />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="full-name">Full Name</label>
            </div>
            <div class="relative">
              <input placeholder="Email address"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                required="" id="signup-email" name="signup-email" type="email" />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="signup-email">Email address</label>
            </div>
            <div class="relative">
              <input placeholder="Password"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                required="" id="signup-password" name="signup-password" type="password" />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="signup-password">Password</label>
            </div>
            <button
              class="w-full py-2 px-4 bg-black hover:bg-black rounded-md shadow-lg text-white font-semibold transition duration-200"
              type="submit">
              Sign Up
            </button>
          </form>
          <div class="text-center text-black">
            Already have an account?
            <button @click="toggleForm('login')" id="toggle-login" class="text-black hover:underline">Sign in</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentForm: 'login', // Track which form is active (login or signup)
    };
  },
  methods: {
    toggleForm(formType) {
      // Update the current form state
      this.currentForm = formType;
    },
  },
};
</script>

<style scoped>
.body_sign_in {
    background-image: linear-gradient(to right, #E2DAD6, #363333);
    overflow-x: hidden;
    overflow-y: auto;
}

.video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    z-index: -1;
}


.welcome_style {
    background-color: rgba(255, 255, 255, 0);
    background-size: 100% 300px;
    background-position: 0% 100%;
    margin: 0 auto;
    max-width: 400px;
    margin-top: 10%;
    backdrop-filter: blur(10px) !important;
    color: #000000 !important;
}

@media (max-width: 768px) {
    .welcome_style {
        max-width: 90%;
        margin-top: 45%;
    }

    h2.text-4xl {
        font-size: 3rem;
        /* Increase size for medium screens */
    }
}

@media (max-width: 480px) {
    .welcome_style {
        max-width: 95%;
        margin-top: 45%;
    }

    h2.text-4xl {
        font-size: 1.7rem;
        /* Enlarge "WELCOME" text for mobile screens */
    }

    p.text-center.text-black {
        font-size: 1.2rem;
        /* Slightly adjust paragraph size */
    }
}



/* Container for both forms */
#form-wrapper {
    position: relative;
    width: 100%;
    max-width: 600px;
    /* Increase max-width for larger forms */
    overflow: hidden;
    padding: 2rem;
    /* Add padding around the container */
    background-color: rgba(255, 255, 255, 0);
    /* Slightly transparent background color */
    border-radius: 12px;
    /* Rounded corners */
    backdrop-filter: blur(10px);
    /* Apply blur effect to the background */
}

/* Form container with transition */
#form-container {
    display: flex;
    transition: transform 1s ease-in-out;
    width: 200%;
    /* Because two forms are side by side */
}

/* Individual forms taking 50% width each */
.form-slide {
    width: 50%;
    padding: 2rem;
    /* Increase padding for larger forms */
    box-sizing: border-box;
    /* Ensures padding doesn't affect total width */
}

/* Hide non-active form */
.hidden {
    display: none;
    /* Hide the form that is not active */
}

/* Slide to the sign-up form */
#form-container.signup-active {
    transform: translateX(-50%);
}
</style>
