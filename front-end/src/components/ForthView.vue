<template>
    <div class="forth">
      <h1>Book your visit online</h1>
      <h4>View available appointments and enjoy dentistry done right. <br> +FREE teeth whitening for life.</h4>
      <button class="btn btn-info">Book Online</button>
    </div>
</template>

<script>

export default({
    name: 'ForthView',
})
</script>

<style scoped>

.forth{
  width: 100%;
  height: 60vh;
  background: url(../assets/1gr.jpg);
  background-position: center;
  background-size: cover;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-family: 'ubuntu';
}
.forth > h1{
  font-size: 3rem;
  color: #fff;
  margin-bottom: 1rem;
}
.forth > h4{
  font-size: 2rem;
  color: #000;
  text-align: center;
  margin-bottom: 1rem;
}

@media (max-width: 800px){
    .forth > h1{
    font-size: 2rem;
  }
  .forth > h4{
      font-size: 1.4rem;
  }
}

</style>