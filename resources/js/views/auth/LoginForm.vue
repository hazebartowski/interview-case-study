<template>
  <form class="flex flex-col pt-3 md:pt-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
      <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
          Email
        </label>
        <input v-model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email" name="email" type="email" placeholder="Email">
      </div>
      <div class="mb-6">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
          Password
        </label>
        <input v-model="password" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="******************">
      </div>
      <p id="text" style="color:green; margin-left:100px;">{{output}}</p>
      <div class="flex items-center justify-between">
        <input type="submit" value="Sign In" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8" @click="handleSubmit">
        <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
          Forgot Password?
        </a>
      </div>
    </div>
  </form>

</template>

<script>
export default {
  data(){
    return {
      email : "",
      password : "",
      output:""
    }
  },
  methods : {
    handleSubmit(e){
      e.preventDefault()
      let currentObj = this;
      if (this.password.length > 0) {
        axios.post('auth/login', {
          email: this.email,
          password: this.password
        })
            .then(response => {
              if(response.data.error === true) {
                currentObj.output = 'login failed!';
              } else {
                currentObj.output = 'login Successful!';
                localStorage.setItem('user',response.data.data.user_data.name)
                localStorage.setItem('access_token',response.data.data.token_data.accessToken)

                if (localStorage.getItem('access_token') != null){
                  this.$emit('loggedIn')
                  if(this.$route.params.nextUrl != null){
                    this.$router.push(this.$route.params.nextUrl)
                  } else {
                    this.$router.push('/')
                  }
                }
              }
            })
            .catch(function (error) {
              console.error(error);
            });
      }
    }
  },
}
</script>