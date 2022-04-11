<template>
  <div class="about">
    <HomeHeader/>
    <FirstContent title="ABOUT DENTAL HOUSE" msg1="Building lifetime" msg2="relationships through" msg3="positive experiences" />
    <div class="second">
      <div class="left" data-aos="fade-right" data-aos-duration="1000">
        <h3>Serving patients with <span class="text-success" >quality</span> </h3>
        <p>We’re a group of energetic, values-driven dental clinicians dedicated to caring for all people — young to young at heart. Since 2002, we’ve been combining exciting technology with a warm and friendly team to deliver exceptional dentistry in Greenwood Village.</p>
      </div>
      <div class="right" data-aos="fade-left" data-aos-duration="1000">
        <div class="right-im">
          <img src="../assets/care.jpg" alt="">
        </div>
        <p>At Dental House, you are in good hands. With every treatment, we promise to do it right, quickly, and for a fair price. And we provide a lifetime warranty on all our work — because it’s the right thing to do.</p>
      </div>
    </div>
    <ForthView/>
    <FooterView/>
  </div>
</template>

<script>
import FooterView from "@/components/FooterView.vue"
import FirstContent from "@/components/FirstContent.vue"
import ForthView from "@/components/ForthView.vue"
import HomeHeader from "@/components/HomeHeader.vue"


export default {
  name: 'AboutView',
  components: {
    FooterView,
    FirstContent,
    ForthView,
    HomeHeader
  }
}
</script>

<style scoped>
.first{
  width: 100%;
  height: 100vh;
  background: linear-gradient(to top, rgb(0,0,0,0.3)50%,rgb(0,0,0,0.3)50%), url(../assets/about.jpg);
  background-position: center;
  background-size: cover;
}

.second{
  padding: 2rem;
  width: 100%;
  display: flex;
  justify-content: space-between;
  background-color: #F4F7F2;
}
.left{
  width: 45%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.left > h3{
  font-size: 2.3rem;
  font-weight: bold;
  font-family: 'ubuntu';
}
.left > p{
  text-align: center;
  font-size: 1.2rem;
  font-weight: 500;
  font-family: 'poppins';
}
.right{
  width: 50%;
  /* height: 80vh; */
  background: url(../assets/bg2.jpg);
  background-position: center;
  background-size: cover;
  border-radius: 0 45px 0 45px;
  display: flex;
  flex-direction: column;
}
.right-im{
  padding: 2rem;
  display: flex;
  justify-content: center;
}
.right-im img{
  width: 90%;
  border-radius: 1.2rem;
}

.right > p{
  padding: 1rem;
  text-align: center;
  font-size: 1.2rem;
  font-family: 'poppins';
  color: #fff;
  font-weight: bold;
}

@media (max-width: 800px){
  .second{
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .left , .right{
    width: 100%;
  }
}

</style>