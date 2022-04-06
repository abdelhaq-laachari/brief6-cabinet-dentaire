<template>
  <div class="home">
    <div class="first">
      <div class="content container">
        <div class="title" data-aos="fade-right" data-aos-duration="1000">
          <h1>Create a free account <br> to get started.</h1>
        </div>
        <div class="form-s" data-aos="fade-left" data-aos-duration="1000">
          <form action="#" method="POST" >
            <!-- Key input -->
            <div class="form-outline mb-4">
              <input type="text" name="text" class="form-control form-control-lg mb-2" placeholder="Enter your First Name" required />
              <input type="text" name="text" class="form-control form-control-lg mb-2" placeholder="Enter your Last Name" required />
              <input type="email" name="text" class="form-control form-control-lg mb-2" placeholder="Enter your Email" required />
              <input type="text" name="text" class="form-control form-control-lg mb-2" placeholder="Enter your Phone Number" required />
            </div>
            <div class="text-center text-lg-start">
              <button class="btn btn-primary col-6 btn-lg" type="submit" name="submit">Sign Up</button>
              <p class="small fw-bold mt-2 pt-1 mb-0 text-light">You already have an account
                <router-link class="nav-link text-dark link-r" to="/signIn">Sign Up</router-link>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


// import FooterView from "@/components/FooterView.vue"
// import ForthView from "@/components/ForthView.vue"

export default {
  name: 'SignUpView',
  components: {
    // ForthView,
    // FooterView,
  }
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

