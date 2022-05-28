<template>
  <AppointmentHeader />
  <div class="first">
    <div class="container">
      <div class="search">
        <div class="first-title">
          <strong id="title">Search for appointment</strong>
          <form v-on:submit.prevent="search()">
            <div class="mb-3">
              <label class="form-label">Date de depart</label>
              <input
                type="date"
                name="day"
                class="form-control"
                id="dt"
                v-model="date"
              />
            </div>
            <button
              type="submit"
              name="submit"
              class="btn btn-primary btn-block mt-4"
            >
              Search
            </button>
          </form>
        </div>
      </div>
      <!-- v-if="CrnS.length > 0" -->
      <div class="result">
        <div class="row" v-if="CrnS.length > 0">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title text-light">Result</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-sm-12 table-responsive">
                    <table
                      id="table"
                      class="table bg-light table-striped table-bordered"
                      cellspacing="0"
                      width="100%"
                    >
                      <thead>
                        <tr>
                          <th>Day Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="crn in CrnS" :key="crn.id">
                          <td>
                            {{ crn.date }}
                            <input type="text" v-model="crn.date" hidden />
                          </td>
                          <td>
                            {{ crn.start_date }}
                            <input
                              type="text"
                              v-model="crn.start_date"
                              hidden
                            />
                          </td>
                          <td>
                            {{ crn.end_date }}
                            <input type="text" v-model="crn.end_date" hidden />
                          </td>
                          <td>
                            <input type="text" v-model="crn.id" hidden />
                            <button
                              @click="SelectOne(crn.id)"
                              class="btn btn-success"
                              data-bs-toggle="modal"
                              data-bs-target="#exampleModal"
                            >
                              <i class="fa fa-eye"></i>book
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
      <!-- pop up -->
      <!-- Modal -->
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form v-on:submit.prevent="Booking()">
                <div class="form-group">
                  <!-- <label for="date">Day</label> -->
                  <input
                    type="text"
                    name="id"
                    class="form-control"
                    v-model="crn[0].id"
                    readonly
                    hidden
                  />
                </div>
                <div class="form-group">
                  <label for="date">Day Date</label>
                  <input
                    type="text"
                    name="date"
                    class="form-control"
                    v-model="date"
                    readonly
                  />
                </div>
                <div class="form-group">
                  <label for="start_date">Start Time</label>
                  <input
                    type="text"
                    name="start_date"
                    class="form-control"
                    v-model="crn[0].start_date"
                    readonly
                  />
                </div>
                <div class="form-group">
                  <label for="end_date">End Time</label>
                  <input
                    type="text"
                    name="end_date"
                    class="form-control"
                    v-model="crn[0].end_date"
                    readonly
                  />
                </div>
                <div class="form-group">
                  <label for="end_date">Service</label>
                  <input
                    type="text"
                    name="service"
                    class="form-control"
                    v-model="service"
                  />
                </div>
                <div class="form-group">
                  <!-- <label for="end_date">id client</label> -->
                  <input
                    type="text"
                    name="id_client"
                    class="form-control"
                    v-model="idClient"
                    readonly
                    hidden
                  />
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                  >
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary">
                    Save changes
                  </button>
                </div>
              </form>
            </div>
            <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AppointmentHeader from "@/components/AppointmentHeader.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  name: "HomeSearch",
  components: {
    AppointmentHeader,
  },
  data() {
    return {
      crn: [
        {
          id: "",
          start_date: "",
          end_date: "",
          start_time: "",
          end_time: "",
          status: "",
        },
      ],
      CrnS: [],
      date: "",
      idClient: localStorage.getItem("storedData"),
      service: "",
    };
  },
  methods: {
    // search function
    search() {
      const formData = new FormData();
      formData.append("date", this.date);
      formData.append("id_client", this.idClient);
      axios
        .post("http://localhost/youcode/back-end/client/search", formData)
        .then((response) => {
          this.CrnS = response.data;
        })
        .catch((error) => {
          console.log(error.response.data);
          this.errorMessage = error.response.data.message;
          if (error.response.status == 400) {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: this.errorMessage,
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                this.$router.go(this.$router.currentRoute);
              }
            });
          }
        });
    },

    // select one function
    SelectOne(id) {
      axios
        .get(`http://localhost/youcode/back-end/client/selectsingle/${id}`)
        .then((response) => {
          this.crn = response.data;
          console.log(this.crn);
        });
    },

    // booking function
    Booking() {
      const formData = new FormData();
      formData.append("id_appointment", this.crn[0].id);
      formData.append("service", this.service);
      formData.append("id_client", this.idClient);
      axios
        .post("http://localhost/youcode/back-end/client/Booking", formData)
        .then((Response) => {
          console.log(Response.status);
          console.log(Response.data);
          if (Response.status == 200) {
            Swal.fire({
              title: "your booking has been confirmed successfully.",
              text: "",
              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              confirmButtonText: "OK",
            }).then((result) => {
              if (result.value) {
                this.$router.push({ name: "MyBooking" });
              }
            });
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    var date = new Date();
    var tdate = date.getDate();
    var tmonth = date.getMonth() + 1;
    if (tdate < 10) {
      tdate = "0" + tdate;
    }
    if (tmonth < 10) {
      tmonth = "0" + tmonth;
    }
    var year = date.getUTCFullYear();
    var maxMont = 0 + +tmonth + +1;
    var tomorrow = tdate;
    if (maxMont < 10) {
      maxMont = "0" + maxMont;
    }
    var minDate = year + "-" + tmonth + "-" + tomorrow;
    var maxDate = year + "-" + maxMont + "-" + tdate;
    document.getElementById("dt").setAttribute("min", minDate);
    document.getElementById("dt").setAttribute("max", maxDate);
    console.log(maxDate);
  },
};
</script>

<style scoped>
.first {
  width: 100%;
  height: 120vh;
  background: linear-gradient(to top, rgb(0, 0, 0, 0.3), rgb(0, 0, 0, 0.3)),
    url(../assets/appoi.jpg);
  background-position: center;
  background-size: cover;
}

.container {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.search {
  /* height: 100%; */
  width: 50%;
}
.first-title {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  /* align-items: center; */
}
#title {
  color: #fff;
  font-size: 2rem;
}
.form-label {
  font-size: 1.2rem;
  color: #fff;
}
.select {
  width: 100%;
  display: flex;
  flex-direction: column;
}
.custom-select {
  width: 100%;
  height: 40px;
  border-radius: 0;
  border: 1.5px solid #fff;
}
#overlay {
  position: fixed;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  background-color: rgba(0, 0, 0, 0.5);
}
.modal-backdrop.show {
  display: block !important;
}
</style>
