<template>
  <AppointmentHeader />
  <div class="first">
    <div class="container">
      <div class="result">
        <div class="row" v-if="CrnS.length > 0">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title text-light text-center">
                  Your Appointment
                </h3>
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
                          <th>id</th>
                          <th>Day Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Service</th>
                          <th>Update</th>
                          <th>Cancel</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="crn in CrnS" :key="crn.id">
                          <td>
                            {{ crn.id }}
                            <input type="text" v-model="crn.id" hidden />
                          </td>
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
                            {{ crn.service }}
                            <input type="text" v-model="crn.service" hidden />
                          </td>
                          <td>
                            <input type="text" v-model="crn.id" hidden />
                            <button
                              @click="SelectOne(crn.id)"
                              class="btn btn-info"
                              data-bs-toggle="modal"
                              data-bs-target="#exampleModal"
                            >
                              <i class="fa fa-eye"></i>Update
                            </button>
                          </td>
                          <td>
                            <input type="text" v-model="crn.id" hidden />
                            <button
                              @click="cancel(crn.id)"
                              class="btn btn-danger"
                            >
                              <i class="fa fa-eye"></i>Cancel
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
        <div class="no_appointment" v-else>
          <h1>You have no appointment for now</h1>
          <span>book now and get our service</span>
          <button @click="goToBooking()" class="btn btn-primary">Book Now</button>
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
              <form v-on:submit.prevent="update()">
                <div class="form-group">
                  <!-- <label for="date">Day</label> -->
                  <input
                    type="text"
                    name="id"
                    class="form-control"
                    v-model="crn[0].id"
                    readonly
                  />
                </div>
                <div class="form-group">
                  <label for="end_date">Service</label>
                  <input
                    type="text"
                    name="service"
                    class="form-control"
                    v-model="crn[0].service"
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
  name: "MyBooking",
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
          service: "",
        },
      ],
      CrnS: [],
      idClient: localStorage.getItem("storedData"),
    };
  },
  methods: {
    //   go to booking page
    goToBooking() {
      this.$router.push("/search");
    },

    // booking function
    MyBooking() {
      axios
        .get(
          `http://localhost/youcode/back-end/client/myBooking/${this.idClient}`
        )
        .then((Response) => {
          this.CrnS = Response.data;
          console.log(Response.status);
          console.log(Response.data);
          console.log(this.idClient);
        });
    },

    // cancel function
    cancel(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post(`http://localhost/youcode/back-end/client/cancel/${id}`)
            .then((Response) => {
              this.CrnS = Response.data;
              if (Response.status === 200) {
                Swal.fire({
                  title: "Your file has been deleted.",
                  icon: "success",
                  showCancelButton: false,
                  confirmButtonText: "Ok",
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  }
                });
              }
            });
        }
      });
    },

    // select one function
    SelectOne(id) {
      axios
        .get(`http://localhost/youcode/back-end/client/selectone/${id}`)
        .then((Response) => {
          this.crn = Response.data;
          console.log(this.crn.Target[0]);
        });
    },

    // update function
    update() {
      const formData = new FormData();
      formData.append("id", this.crn[0].id);
      formData.append("service", this.crn[0].service);
      Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          axios
            .post(`http://localhost/youcode/back-end/client/update`, formData)
            .then((response) => {
              this.CrnS = response.data;
              if (response.status === 200) {
                Swal.fire({
                  title: "Your changed has been saved successfully",
                  icon: "success",
                  showCancelButton: false,
                  confirmButtonText: "Ok",
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  }
                });
              }
            });
        } else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
        }
      });
    },
  },
  mounted() {
    this.MyBooking();
  },
};
</script>

<style scoped>
.first {
  width: 100%;
  height: 90vh;
  background: linear-gradient(to top, rgb(0, 0, 0, 0.3), rgb(0, 0, 0, 0.3)),
    url(../assets/appoi.jpg);
  background-position: center;
  background-size: cover;
}

.container {
  height: 80%;
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

.modal-backdrop.show {
  display: none !important;
}

.no_appointment {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #fff;
  font-size: 1.5rem;
  font-weight: bold;
  text-align: center;
  gap: 1rem;
}
.no_appointment button {
  width: 100px;
}
</style>
