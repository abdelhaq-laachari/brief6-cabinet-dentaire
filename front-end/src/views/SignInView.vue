<template>
  <div class="home">
    <HomeHeader/>
    <div class="first">
      <div class="content container">
        <div class="title" data-aos="fade-right" data-aos-duration="1000">
          <h1>Welcome Back!</h1>
        </div>
        <div class="form-s" data-aos="fade-left" data-aos-duration="1000">
          <form  v-on:submit.prevent="signIn()">
            <!-- Key input -->
            <div class="form-outline mb-4">
              <input type="text" name="loginKey" class="form-control form-control-lg" placeholder="Enter your log in key" v-model="key" required />
            </div>
            <div class="text-center text-lg-start">
              <button class="btn btn-primary col-6 btn-lg" type="submit" name="submit">Sign In</button>
              <p class="small fw-bold mt-2 pt-1 mb-0 text-light">Create an account 
                <router-link class="nav-link text-dark" to="/signup">Sign Up</router-link>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


import HomeHeader from "@/components/HomeHeader.vue"
import axios from 'axios'
export default {
  name: 'SignInView',
  components: {
    // ForthView,
    HomeHeader,
  },
  data() {
    return {
    key: '',
    }
  },
  methods: {
    signIn() {
    const formData = new FormData()
    formData.append('loginKey',this.key)
    axios.post("http://localhost/youcode/back-end/client/login",formData)
      .then(Response=>{
          console.log(Response.status);
          console.log(Response.data);
          localStorage.setItem('storedData', this.key)
          this.$router.push({ name: 'HomeSearch' });
      })
     
    },
  },

}
</script>

<style scoped>
.first{
  width: 100%;
  height: 100vh;
  background: linear-gradient(to top, rgb(0,0,0,0.3)50%,rgb(0,0,0,0.3)50%), url(../assets/dentist.jpg);
  background-position: center;
  background-size: cover;
}
.content{
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
}
.title{
  width: 50%;
}
.title h1{
  font-size: 3rem;
  font-family: 'ubuntu';
  color: #fff;
}
.form-s{
  width: 45%;
  height: 70%;
}
.form-s form{
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: rgba(255, 255, 255, 0.247);
  border-radius: 0 45px 0 45px;
  padding: 2rem;
}

@media (max-width: 900px){
  .content{
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .title{
    width: 100%;
    text-align: center;
  }
  .form-s{
    width: 100%;
  }
}
</style>

