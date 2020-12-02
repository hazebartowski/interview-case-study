<template>
  <form action="#" class="flex flex-col pt-3 md:pt-8" @submit.prevent="login">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
      <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
          Email
        </label>
        <input v-model="form.email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email"name="name" type="email" placeholder="Email">
        <has-error :form="form" field="name"></has-error>
      </div>
      <div class="mb-6">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
          Password
        </label>
        <input v-model="form.password" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="******************">
        <has-error :form="form" field="password"></has-error>
      </div>
      <div class="flex items-center justify-between">
        <input type="submit" value="Sign In" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
        <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
          Forgot Password?
        </a>
      </div>
    </div>
  </form>

</template>

<script>
export default {

  data () {
    return {
      form: new Form({
        email: '',
        password: '',
      })
    }
  },

  methods: {

    login () {
      var token = document.head.querySelector('meta[name="csrf-token"]');
      window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
      this.form.post('/login')
          .then(( response ) => {
            console.log(response)
            //this.$router.push('/');
          })
          .catch(error => {
            console.log(error);
          })
    },
  }
}
</script>