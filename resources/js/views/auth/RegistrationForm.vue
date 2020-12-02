<template>
  <div class="w-full flex flex-wrap">

    <!-- Register Section -->
    <div class="w-full md:w-1/2 flex flex-col">

      <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-12">
        <a href="#" class="bg-black text-white font-bold text-xl p-4">Logo</a>
      </div>

      <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
        <p class="text-center text-3xl">Join Us.</p>
        <form action="#" class="flex flex-col pt-3 md:pt-8" @submit.prevent="register">
          <div class="flex flex-col pt-4">
            <label for="name" class="text-lg">Name</label>
            <input v-model="form.name" type="text" placeholder="Name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" :class="{ 'is-invalid': form.errors.has('name') }" name="name">
            <has-error :form="form" field="name"></has-error>
          </div>

          <div class="flex flex-col pt-4">
            <label for="email" class="text-lg">Email</label>
            <input v-model="form.email" type="email" placeholder="your@email.com" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" :class="{ 'is-invalid': form.errors.has('email') }" name="email">
            <has-error :form="form" field="email"></has-error>
          </div>

          <div class="flex flex-col pt-4">
            <label for="password" class="text-lg">Password</label>
            <input v-model="form.password" type="password" placeholder="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" :class="{ 'is-invalid': form.errors.has('password') }" name="password">
            <has-error :form="form" field="password"></has-error>
          </div>

          <div class="flex flex-col pt-4">
            <label for="confirm-password" class="text-lg">Confirm Password</label>
            <input v-model="form.password_confirmation" type="password" placeholder="Confirm password" id="confirm-password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" name="password_confirmation">
            <has-error :form="form" field="password_confirmation"></has-error>
          </div>
          <p id="text" style="color:green; margin-left:100px;"></p>
          <input type="submit" value="Register" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
        </form>
        <div class="text-center pt-12 pb-12">
          <p>Already have an account? <a href="login.html" class="underline font-semibold">Log in here.</a></p>
        </div>
      </div>

    </div>

    <!-- Image Section -->
    <div class="w-1/2 shadow-2xl">
      <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
    </div>
  </div>
</template>


<script>
export default {

  data () {
    return {
      form: new Form({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      })
    }
  },

  methods: {

    register () {
      this.form.post('/register')
          .then(( response ) => {
            var attr = document.getElementById("text");
            attr.innerHTML = response.data.message;

            this.form.reset();

          })
    },
  }
}
</script>