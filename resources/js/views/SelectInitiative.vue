<template>
  <div class="row container">
    <div class="col-12 col-md-3">
      <div class="ml-md-3 my-3">Select your initiative here:</div>
      <div class="dropdown">
        <button class="btn ml-md-3 home-page__button" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Goal Team</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
      <br />
      <div class="dropdown">
        <button class="btn ml-md-3 home-page__button" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Initiative name</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      goalTeams: null,
      error: null,
    };
  },
  created() {
    this.fetchGoalTeams();
  },
  methods: {
    fetchGoalTeams() {
      this.error = this.goalTeams = null;
      axios.get("/api/practices").then((response) => {
        console.log(response);
      });
    }
  }
};
</script>
