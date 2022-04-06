<template>
  <div class="test">
    <FirstContent title="TRUSTED DENTAL HOUSE CENTER DENTISTS" msg1="Exceptional care" msg2="for all age" />
    <div class="second">
      <div class="container s-bor">
        <div class="left" data-aos="fade-right" data-aos-duration="1000">
          <div class="b-title">
            <h1>Dentistry Done Right</h1>
          </div>
          <div class="b-par">
            <p>Adults and kids, we welcome patients of all ages! Our team is passionate about building lifetime relationships through positive experiences, featuring:</p>
          </div>
          <div>
            <p class="b-par2">
              <FIcons :icon="['fas','check'] " class="b-icon" />&nbsp; Transparent Pricing <br>
              <FIcons :icon="['fas','check'] " class="b-icon" />&nbsp; Unparalleled Warranty <br>
              <FIcons :icon="['fas','check'] " class="b-icon" />&nbsp; FREE Whitening (for life!) <br>
            </p>
          </div>
          <div class="b-quote">
            <div class="vl"></div>
            <p >
              "Every tooth in a man's head is more valuable than a diamond."
            </p>
          </div>
        </div>
        <div class="right" data-aos="fade-left" data-aos-duration="1000">
          <img src="../assets/dc.png" alt="">
        </div>
      </div>
    </div>
    <div class="third">
      <div class="top">
        <div class="top-left" data-aos="fade-right" data-aos-duration="1000">
          <img src="../assets/visit.jpg" alt="">
        </div>
        <div class="top-right" data-aos="fade-left" data-aos-duration="1000">
          <h1>Visit Us</h1>
          <p>You are invited to come visit us any day of the week. <br> We are located at 14 Av. Zerktouni, Safi. <br> There is lots of unrestricted parking available.</p>
          <span><FIcons :icon="['fas','clock'] " style="color:#000;" />&nbsp; Monday–Saturday: 8AM–5PM <br></span>
          
        </div>
      </div>
      <div class="bottom" data-aos="fade-in" data-aos-duration="1000">
          <iframe src="https://2u.pw/OyOTy" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
    <div>
      <ForthView/>
      <FooterView/>
    </div>
  </div>
</template>

<script>
import FooterView from "@/components/FooterView.vue"
import FirstContent from "@/components/FirstContent.vue"
import ForthView from "@/components/ForthView.vue"


export default {
  name: 'HomeView',
  components: {
    FooterView,
    FirstContent,
    ForthView,
  }
}
</script>

<style scoped>
.first{
  width: 100%;
  height: 100vh;
  background: linear-gradient(to top, rgb(0,0,0,0.3)50%,rgb(0,0,0,0.3)50%), url(../assets/11.jpg);
  background-position: center;
  background-size: cover;
}
.second{
  width: 100%;
  height: 100vh;
  background: url(../assets/bg2.jpg);
  background-position: center;
  background-size: cover;
  display: flex;
  align-items: center;
}
.s-bor{
  height: 90%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-radius: 0 45px 0 45px;
  border: 1.5px solid #fff;
}
.left{
  width: 45%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  font-family: 'ubuntu';
}
.b-title h1{
  font-size: 3rem;
  color: #fff;
  font-weight: bold;
  margin-bottom: 1rem;
}
.b-par{
  font-size: 1.3rem;
  color: #fff;
  margin-bottom: 1rem;
}
.b-par2{
  font-size: 1.2rem;
  color: #fff;
  font-weight: bold;
  margin-bottom: 1rem;
}
.b-icon{
  color: yellow;
}
.b-quote{
  display: flex;
  align-items: center;
  gap: 15px;
}
.b-quote > p{
  font-size: 2rem;
  color: #fff;
  font-weight: 500;
}
.vl {
  border-left: 6px solid #42C2FF;
  height: 100px;
  border-radius: 5px;
}
.right{
  width: 50%;
}
.right img{
  width: 100%;
}

.third{
  width: 100%;
  /* height: 100vh; */
  display: flex;
  flex-direction: column;
  padding-top: 4rem;

}
.top{
  width: 90%;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-around;
}
.top-left{
  width: 50%;
}
.top-left img{
  width: 100%;
  border-radius: 0 45px 0 45px;
}
.top-right{
  widows: 50%;
  display: flex;
  flex-direction: column;
  gap: 2rem;
  font-family: 'poppins';
}
.top-right > h1{
  font-size: 3rem;
  font-weight: bold;
  color: #fff;
}
.top-right > p{
  font-size: 1.2rem;
  font-weight: bold;
  color: #fff;
  font-family: 'poppins';
}
.top-right > span{
  font-size: 1.2rem;
  font-weight: bold;
  color: #fff;
  font-family: 'poppins';
}
.bottom{
  width: 90%;
  margin: auto;
  height: 50vh;
  margin-top: 2rem;
  margin-bottom: 2rem;
}
.bottom > iframe{
  width: 100%;
  height: 100%;
  border-radius: 3rem;
}

@media (max-width: 800px){
  .second{
    height: 120vh;
  }
  .s-bor{
    display: flex;
    flex-direction: column;
    /* margin: 1rem 0 1rem 0; */
    justify-content: center;
  }
  .left , .right{
    width: 95%;
    margin-bottom: 1rem;
  }
  .top{
    display: flex;
    flex-direction: column;
  }
  .top-left , .top-right{
    width: 100%;
    margin-bottom: 2rem;
  }
  
}

</style>