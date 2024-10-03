<template>
  <div id="app" class="body_sign_in">
    <!-- Background image -->
    <img class="video-background" src="./assets/img/trike.gif" alt="Background image">

    <!-- Form wrapper -->
    <div id="form-wrapper" class="max-w-md w-full rounded-xl shadow-2xl overflow-hidden p-8 space-y-8 welcome_style">
      <div id="form-container">
        <!-- Login Form -->
        <div v-show="!isSignUp" id="login-form" class="form-slide">
          <h2 class="text-center text-4xl font-extrabold text-black">WELCOME</h2>
          <p class="text-center text-black">Sign in to your account</p>
          <form @submit.prevent="handleLogin" class="space-y-6 text-black">
            <div class="relative">
              <input 
                v-model="loginForm.email" 
                placeholder="Email address"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                required 
                id="email" 
                type="email" 
              />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="email">Email address</label>
            </div>
            <div class="relative">
              <input 
                v-model="loginForm.password" 
                placeholder="Password"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                required 
                id="password" 
                type="password" 
              />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="password">Password</label>
            </div>
            <div class="flex items-center justify-between">
              <label class="flex items-center text-sm text-black">
                <input v-model="loginForm.rememberMe" class="form-checkbox h-4 w-4 text-black bg-black border-black rounded" type="checkbox" />
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
            <a href="#" @click.prevent="toggleForm" class="text-black hover:underline">Sign up</a>
          </div>
        </div>

        <!-- Sign Up Form -->
        <div v-show="isSignUp" id="signup-form" class="form-slide">
          <h2 class="text-center text-4xl font-extrabold text-black">SIGN UP</h2>
          <p class="text-center text-black">Create your account</p>
          <form @submit.prevent="handleSignUp" class="space-y-6 text-black">
            <div class="relative">
              <input 
                v-model="signUpForm.fullName" 
                placeholder="Full Name"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                required 
                id="full-name" 
                type="text" 
              />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="full-name">Full Name</label>
            </div>
            <div class="relative">
              <input 
                v-model="signUpForm.email" 
                placeholder="Email address"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                required 
                id="signup-email" 
                type="email" 
              />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="signup-email">Email address</label>
            </div>
            <div class="relative">
              <input 
                v-model="signUpForm.password" 
                placeholder="Password"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                required 
                id="signup-password" 
                type="password" 
              />
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
            <a href="#" @click.prevent="toggleForm" class="text-black hover:underline">Sign in</a>
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
      isSignUp: false,
      loginForm: {
        email: '',
        password: '',
        rememberMe: false,
      },
      signUpForm: {
        fullName: '',
        email: '',
        password: '',
      },
    };
  },
  methods: {
    toggleForm() {
      this.isSignUp = !this.isSignUp;
    },
    handleLogin() {
      // Handle login logic here
      console.log("Logging in with:", this.loginForm);
    },
    handleSignUp() {
      // Handle sign-up logic here
      console.log("Signing up with:", this.signUpForm);
    },
  },
};
</script>

<style scoped>
html {
    scroll-behavior: smooth;
    overflow-x: hidden;
}

.body {
    overflow-x: hidden;
}

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


/* Homepage */
.logoedit {
    filter: invert(1);
    width: auto;
    height: 32px;
}


.section1 {
    background-image: linear-gradient(to right, #FBF6E2, #ECCEAE);
    overflow-x: hidden;
}


.card {
    width: 100%;
    padding: 20px;
    background: #fff;
    border: 6px solid #000;
    box-shadow: 12px 12px 0 #000;
    transition: transform 0.3s, box-shadow 0.3s;
    z-index: 1 !important;
}

.card:hover {
    transform: translate(-5px, -5px);
    box-shadow: 17px 17px 0 #000;
}

.card__title {
    font-size: 32px;
    font-weight: 900;
    color: #000;
    text-transform: uppercase;
    margin-bottom: 15px;
    display: block;
    position: relative;
    overflow: hidden;
}

.card__title::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 90%;
    height: 3px;
    background-color: #000;
    transform: translateX(-100%);
    transition: transform 0.3s;
}

.card:hover .card__title::after {
    transform: translateX(0);
}

.card__content {
    font-size: 16px;
    line-height: 1.4;
    color: #000;
    margin-bottom: 20px;
}

.card__form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.card__form input {
    padding: 10px;
    border: 3px solid #000;
    font-size: 16px;
    font-family: inherit;
    transition: transform 0.3s;
    width: calc(100% - 26px);
    /* Adjust for padding and border */
}

.card__form input:focus {
    outline: none;
    transform: scale(1.05);
    background-color: #000;
    color: #ffffff;
}

.card__button {
    border: 3px solid #000;
    background: #000;
    color: #fff;
    padding: 10px;
    font-size: 18px;
    left: 20%;
    font-weight: bold;
    text-transform: uppercase;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: transform 0.3s;
    width: 50%;
    height: 100%;
}

.card__button::before {
    content: "Sure?";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 105%;
    background-color: #5ad641;
    color: #000;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateY(100%);
    transition: transform 0.3s;
}

.card__button:hover::before {
    transform: translateY(0);
}

.card__button:active {
    transform: scale(0.95);
}

@keyframes glitch {
    0% {
        transform: translate(2px, 2px);
    }

    25% {
        transform: translate(-2px, -2px);
    }

    50% {
        transform: translate(-2px, 2px);
    }

    75% {
        transform: translate(2px, -2px);
    }

    100% {
        transform: translate(2px, 2px);
    }
}

.glitch {
    animation: glitch 0.3s infinite;
}

#card {
    width: max-content;
}




@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }

    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOutLeft {
    from {
        transform: translateX(0);
        opacity: 1;
    }

    to {
        transform: translateX(-100%);
        opacity: 0;
    }
}

@keyframes slideOutRight {
    from {
        transform: translateX(0);
        opacity: 1;
    }

    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

.animate-slide-in-left {
    animation: slideInLeft 1s forwards;
}

.animate-slide-in-right {
    animation: slideInRight 1s forwards;
}

.animate-slide-out-left {
    animation: slideOutLeft 1s forwards;
}

.animate-slide-out-right {
    animation: slideOutRight 1s forwards;
}
</style>
