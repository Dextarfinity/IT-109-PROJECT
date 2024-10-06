<template>
  <div class="">
    <img
      class="video-background"
      src="./images/authbg.gif"
      alt="Background image"
    />
    <div
      id="form-wrapper"
      class="max-w-md w-full rounded-xl shadow-2xl overflow-hidden p-8 space-y-8 welcome_style"
    >
      <div
        id="form-container"
        :class="{ 'signup-active': currentForm === 'signup' }"
      >
        <!-- Login Form -->
        <div id="login-form" class="form-slide">
          <h2 class="text-center text-4xl font-extrabold text-black">
            WELCOME
          </h2>
          <p class="text-center text-black">Sign in to your account</p>
          <form @submit.prevent="handleSubmit('login')" class="space-y-6 text-black">
            <div class="relative">
              <input
                v-model="loginEmail"
                placeholder="Email address"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                id="login-email"
                name="login-email"
                type="email"
                maxlength="50"
                required
              />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="login-email"
              >Email address</label>
            </div>
            <div class="relative">
              <input
                v-model="loginPassword"
                placeholder="Password"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                id="login-password"
                name="login-password"
                type="password"
                required
                maxlength="50"
              />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="login-password"
              >Password</label>
            </div>
            <div class="flex items-center justify-between">
              <label class="flex items-center text-sm text-black">
                <input
                  class="form-checkbox h-4 w-4 text-black bg-black border-black rounded"
                  type="checkbox"
                />
                <span class="ml-2">Remember me</span>
              </label>
              <a class="text-sm text-black hover:underline" href="#"
                >Forgot your password?</a
              >
            </div>
            <button
              class="w-full py-2 px-4 bg-black hover:bg-black rounded-md shadow-lg text-white font-semibold transition duration-200"
              type="submit"
            >
              Sign In
            </button>
          </form>
          <div class="text-center text-black">
            Don't have an account?
            <button
              @click="toggleForm('signup')"
              id="toggle-signup"
              class="text-black hover:underline"
            >
              Sign up
            </button>
          </div>
        </div>

        <!-- Sign Up Form -->
        <div id="signup-form" class="form-slide">
          <h2 class="text-center text-4xl font-extrabold text-black">
            SIGN UP
          </h2>
          <p class="text-center text-black">Create your account</p>
          <form @submit.prevent="handleSubmit('signup')" class="space-y-6 text-black">
            <div class="relative">
              <input
                v-model="fullname"
                placeholder="Full Name"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                id="signup-fullname"
                name="full-name"
                type="text"
                maxlength="50"
                required
                @keypress.enter="validateFullname"
                @input="clearNameError"
              />
              <p id="nameError" class="text-error">{{ nameError }}</p>
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="signup-fullname"
              >Full Name</label>
            </div>

            <div class="relative">
              <input
                v-model="email"
                placeholder="Email address"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                id="signup-email"
                name="signup-email"
                type="email"
                maxlength="50"
                required
              />
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="signup-email"
              >Email address</label>
            </div>

            <div class="relative">
              <input
                v-model="password"
                placeholder="Password"
                class="peer h-10 w-full border-b-2 border-black text-black bg-transparent placeholder-transparent focus:outline-none focus:border-black"
                id="signup-password"
                name="signup-password"
                type="password"
                maxlength="50"
                required
                @keypress.enter="validatePassword"
                @input="clearPasswordError"
              />
              <p id="confirmPasswordError" class="invalid">
                {{ confirmPasswordError }}
              </p>
              <label
                class="absolute left-0 -top-3.5 text-black text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-black peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm"
                for="signup-password"
              >Password</label>
            </div>

            <button
              class="w-full py-2 px-4 bg-black hover:bg-black rounded-md shadow-lg text-white font-semibold transition duration-200"
              type="submit"
            >
              Sign Up
            </button>
          </form>
          <div class="text-center text-black">
            Already have an account?
            <button
              @click="toggleForm('login')"
              id="toggle-login"
              class="text-black hover:underline"
            >
              Sign in
            </button>
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
      currentForm: "login",
      fullname: "",
      email: "",
      password: "",
      loginEmail: "",
      loginPassword: "",
      nameError: "",
      passwordError: "",
      confirmPassword: "",
      confirmPasswordError: "",
    };
  },
  methods: {
    toggleForm(formType) {
      this.currentForm = formType;
    },
    handleSubmit(formType) {
      if (formType === 'login') {
        if (this.loginEmail && this.loginPassword) {
          console.log("Email:", this.loginEmail);
          console.log("Password:", this.loginPassword);
          // Add your logic for login form submission here (e.g., call an API)
        } else {
          alert("Please fill in all fields for login.");
        }
      } else if (formType === 'signup') {
        if (
          this.validateFullname() &&
          this.validatePassword() &&
          this.validateConfirmPassword()
        ) {
          console.log("Full Name:", this.fullname);
          console.log("Email:", this.email);
          console.log("Password:", this.password);
          // Add your logic for signup form submission here (e.g., call an API)
        } else {
          alert("Please correct the errors in the signup form.");
        }
      }
    },
    clearNameError() {
      this.nameError = "";
    },
    clearPasswordError() {
      this.passwordError = "";
    },
    validateFullname() {
    try {
      if (!this.fullname.trim()) throw new Error("Empty-name");
      if (this.fullname.length < 10) throw new Error("short");
      if (!/^[A-Za-z\s]+$/.test(this.fullname)) throw new Error("invalidName");
      this.nameError = ""; // Clear error if validation passes
      return true;
    } catch (error) {
      if (error.message === "Empty-name") {
        this.nameError = "Full name is required.";
        this.fullname = ""; // Clear the fullname field if it's wrong
      } else if (error.message === "short") {
        this.nameError = "Name should be at least 10 characters long.";
        this.fullname = ""; // Clear the fullname field if it's wrong
      } else if (error.message === "invalidName") {
        this.nameError = "Name can only contain letters and spaces.";
        this.fullname = ""; // Clear the fullname field if it's wrong
      }
      return false;
    }
  },
  validatePassword() {
    try {
      if (!this.password.trim()) throw new Error("Empty-password");
      if (this.password.length < 8) throw new Error("shortPassword");
      if (!/[A-Z]/.test(this.password)) throw new Error("noUppercase");
      if (!/[a-z]/.test(this.password)) throw new Error("noLowercase");
      if (!/[0-9]/.test(this.password)) throw new Error("noDigit");
      this.passwordError = ""; // Clear error if validation passes
      return true;
    } catch (error) {
      if (error.message === "Empty-password") {
        this.passwordError = "Password field is empty. Please enter a password.";
        this.password = ""; // Clear the password field if it's wrong
      } else if (error.message === "shortPassword") {
        this.passwordError = "Password should be at least 8 characters long.";
        this.password = ""; // Clear the password field if it's wrong
      } else if (error.message === "noUppercase") {
        this.passwordError = "Password must contain at least one uppercase letter.";
        this.password = ""; // Clear the password field if it's wrong
      } else if (error.message === "noLowercase") {
        this.passwordError = "Password must contain at least one lowercase letter.";
        this.password = ""; // Clear the password field if it's wrong
      } else if (error.message === "noDigit") {
        this.passwordError = "Password must contain at least one digit.";
        this.password = ""; // Clear the password field if it's wrong
      }
      return false;
    }
  },
  }
}
</script>



<style scoped>
.body_sign_in {
  background-image: linear-gradient(to right, #e2dad6, #363333);
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
