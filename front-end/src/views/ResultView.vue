<template>
    <AppointmentHeader/>
    <div class="first">
        <div class="container">
            <div class="result">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title text-light">Result</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 table-responsive">
                                        <table id="table" 
                                            class="table bg-light table-striped table-bordered"
                                            cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="crn in CrnS" :key="crn.id">
                                                    <td></td>
                                                    <td>{{crn.date}}</td>
                                                    <td>{{crn.start_date}}</td>
                                                    <td>{{crn.end_date}}</td>
                                                    <td>{{crn.start_time}}</td>
                                                    <td>{{crn.end_time}}</td>
                                                    <td>
                                                        <button class="btn btn-success">
                                                            <i class="fa fa-eye"></i>book
                                                        </button>
                                                        <button class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>cancel
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AppointmentHeader from "@/components/AppointmentHeader.vue";
import axios from "axios";

export default {
    name: 'ResultView',	
    components: 
    {
    AppointmentHeader
    },
    data() {
        return {
        date: '',
        crn: [
            { date: '', start_date: '', end_date: '', start_time: '', end_time: '', status: '' },
        ],
        CrnS: [],
        }
        },
    methods: {
        search() {
        const formData = new FormData()
        formData.append('date',this.date)
        axios.post("http://localhost/youcode/back-end/client/search",formData)
        .then(response => {
            this.CrnS = response.data
            console.log(this.CrnS)
        })
        },
    },
}

</script>


<style scoped>
.first{
  width: 100%;
  height: 90vh;
  background: linear-gradient(to top, rgb(0,0,0,0.3)50%,rgb(0,0,0,0.3)50%), url(../assets/appoi.jpg);
  background-position: center;
  background-size: cover;
}
.container{
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.search{
    /* height: 100%; */
    width: 50%;
}
.first-title{
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  /* align-items: center; */
}
#title{
    color: #fff;
    font-size: 2rem;
}
.form-label{
    font-size: 1.2rem;
    color: #fff;
}
.select{
    width: 100%;
    display: flex;
    flex-direction: column;
}
.custom-select{
    width: 100%;
    height: 40px;
    border-radius: 0;
    border: 1.5px solid #fff;
}
</style>