<template>
  <div class="home">
    <HomeHeader/>
    <div class="first">
      <div class="content container">
        <div class="title" data-aos="fade-right" data-aos-duration="1000">
          <h1>Create a free account <br> to get started.</h1>
        </div>
        <div class="form-s" data-aos="fade-left" data-aos-duration="1000">
          <form v-on:submit.prevent="signUp()" >
            <!-- Key input -->
            <div class="form-outline mb-4">
              <input type="text" name="Fname" class="form-control form-control-lg mb-2" placeholder="Enter your First Name" v-model="Fname" required />
              <input type="text" name="Lname" class="form-control form-control-lg mb-2" placeholder="Enter your Last Name" v-model="Lname" required />
              <input type="email" name="email" class="form-control form-control-lg mb-2" placeholder="Enter your Email" v-model="email" required />
              <input type="date" name="age" class="form-control form-control-lg mb-2" placeholder="Enter your Age" v-model="age" required />
              <input type="text" name="phone" class="form-control form-control-lg mb-2" placeholder="Enter your Phone Number" v-model="phone" required />
            </div>
            <div class="text-center text-lg-start">
              <button class="btn btn-primary col-6 btn-lg" type="submit" name="sendForm" value="Send">Sign Up</button>
              <p class="small fw-bold mt-2 pt-1 mb-0 text-light">You already have an account
                <router-link class="nav-link text-dark link-r" to="/signIn">Sign In</router-link>
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
// import emailjs from 'emailjs-com';
import axios from "axios";

export default {
  name: 'SignUpView',
  components: {
    HomeHeader
  },
  data() {
    return {
      Fname: '',
      Lname: '',
      email: '',
      age: '',
      phone: '',
      key: '',
      message: '',
    }
  },
  methods: {
    signUp() {
    const formData = new FormData()
    // formData.append('$_POST["variable"]', this.Variable2)
    // formData.append('variable', this.variable2)
    formData.append('Fname',this.Fname)
    formData.append('Lname',this.Lname)
    formData.append('email',this.email)
    formData.append('age',this.age)
    formData.append('phone',this.phone)
    axios.post("http://localhost/youcode/back-end/client/signup",formData)
      .then(Response=>{
          console.log(Response.status);
          console.log(Response.data);
          this.$router.push({ name: 'signIn' });
          // emailjs.sendForm('service_io3w1kg', 'template_6okxo91',{Fname: this.Fname,email: this.email,key: this.Lname}, '4KTh3cv1qq_6XKh-w');
          // emailjs.send("service_io3w1kg","template_6okxo91",{ Fname: "testtest", key: "test", email: "viktoriyasochka@ichstet.com", },'4KTh3cv1qq_6XKh-w');
          alert("You have successfully created your account. This is your log in key: " +Response.data.loginKey);
          
      })
     
    },

    // sendEmail()
    // {
    //   // emailjs.sendForm('service_io3w1kg', 'template_6okxo91',{Fname: this.Fname,email: this.email,key: this.Lname}, '4KTh3cv1qq_6XKh-w')
    //   // emailjs.send("service_io3w1kg","template_6okxo91",{ Fname: "hello", key: "test", email: "tobofaeeva1951@ttmgss.com", });
    // }
  },

}
</script>

<style scoped>
*{
  overflow-y: hidden;
}
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
  height: 80%;
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

