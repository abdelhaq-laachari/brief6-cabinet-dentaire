<template>
  <div class="">
    <FirstContent title="GENERAL DENTAL CARE IN DENTAL HOUSE" msg1="Everything you" msg2="expect and then" msg3="some" />
    <div class="second">
      <div class="card-s" data-aos="fade-up" data-aos-duration="1000">
        <div class="card-img">
          <img src="../assets/card1.jpg" alt="">
        </div>
        <div class="title">
          <h2>General</h2>
          <p>Everything you expect and then some. Cleanings, fillings, and x-rays are just the beginning.</p>
        </div>
        <button class="btn btn-info">Book Online</button>
      </div>
      <div class="card-s" data-aos="fade-up" data-aos-duration="1000">
        <div class="card-img">
          <img src="../assets/card2.jpg" alt="">
        </div>
        <div class="title">
          <h2>Cosmetic</h2>
          <p>Discover your “wow!” factor. Invisalign, veneers, and in-office or take-home teeth whitening.</p>
        </div>
        <button class="btn btn-info">Book Online</button>
      </div>
      <div class="card-s" data-aos="fade-up" data-aos-duration="1000">
        <div class="card-img">
          <img src="../assets/card3.jpg" alt="">
        </div>
        <div class="title">
          <h2>Surgical</h2>
          <p>We can fix anything. Our dentists repair damaged or lost teeth with cutting-edge implants and more.</p>
        </div>
        <button class="btn btn-info">Book Online</button>
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

export default {
  name: 'ServiceView',
  components: {
    FirstContent,
    ForthView,
    FooterView,
  }
}
</script>

<style scoped>

.first{
  width: 100%;
  height: 100vh;
  background: linear-gradient(to top, rgb(0,0,0,0.3)50%,rgb(0,0,0,0.3)50%), url(../assets/car2.jpg);
  background-position: center;
  background-size: cover;
}

.second{
    width: 100%;
    height: auto;
    padding: 10px 20px 10px 20px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-row-gap: 2rem;
    grid-column-gap: 2rem;
    background-color: #F8F8F8;
}
.card-s{
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    justify-content: space-evenly;
    background-color: #EFFFFD;
  border-radius: 45px 45px 0 0;
}
.card-img{
  width: 100%;
  padding: 2rem;
}
.card-img img{
  width: 100%;
  border-radius: 35px 35px 0 0;
}
.title{
  padding: 2rem 0 1.2rem 0;
}
.title h2{
  font-family: 'ubuntu';
  font-size: 2.3rem;
  font-weight: bold;
}
.title p{
  font-family: 'poppins';
  font-size: 1.2rem;
}

@media (max-width: 900px){
  .second{
        grid-template-columns: repeat(1, 1fr);
  }
}

</style>