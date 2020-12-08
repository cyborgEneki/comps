<template>
  <div class="row container">
    <div class="col-12 col-md-6 ml-md-3 my-3">
      <div class="page-title__font">Initiative Information</div>
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="initiative-name">Initiative Name</label>
          <input
            type="text"
            class="form-control"
            id="initiative-name"
            name="name"
            v-model="initiative.Name"
          />
        </div>
        <div class="form-group">
          <label for="initiative-name">Name of Initiative Lead</label>
          <input
            type="text"
            class="form-control"
            id="name-of-initiative-lead"
            name="lead_name"
            v-model="initiative.Lead_Name"
          />
        </div>
        <div class="form-group">
          <label for="initiative-lead-email">Initiative Lead Email</label>
          <input
            type="email"
            class="form-control"
            id="initiative-lead-email"
            name="lead_email"
            v-model="initiative.Lead_Email"
          />
        </div>
        <div class="form-group">
          <label for="initiative-start-year">Initiative Start Year</label>
          <select
            class="form-control"
            id="initiative-start-year"
            name="start_year"
            v-model="initiative.Start_Year"
          >
            <option value="">{{ initiative.Start_Year }}</option>
          </select>
        </div>
        <div class="form-group">
          <label for="initiative-end-year">Initiative End Year</label>
          <select
            class="form-control"
            id="initiative-end-year"
            name="end_year"
            v-model="initiative.End_Year"
          >
            <option value="">{{ initiative.End_Year }}</option>
          </select>
        </div>
        <div class="form-group">
          <label for="initiative-statement">Initiative Statement</label>
          <textarea
            class="form-control"
            id="initiative-statement"
            name="statement"
            rows="3"
            v-model="initiative.Statement"
          ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</template>

<script>
import clientApi from "../api/initiatiave";
export default {
  props: {
    goalTeamIdFromUserProp: Number,
  },
  data() {
    return {
      initiative: {
        Initiative_Key: null,
        Name: "",
        Lead_Name: "",
        Lead_Email: "",
        Start_Year: "",
        End_Year: "",
        Statement: "",
      },
    };
  },
  watch: {
    // call the method if the route changes
    $route: {
      handler: "getInitiative",
      immediate: true, // runs immediately with mount() instead of calling method on mount hook
    },
  },
  mounted() {
    let startYearDropdown = document.getElementById("initiative-start-year"),
      endYearDropdown = document.getElementById("initiative-end-year"),
      currentYear = new Date().getFullYear(),
      earliestYear = 1970,
      furthestYear = 2050,
      earliestYear2 = 1970;

    // Set start year dropdown
    while (currentYear >= earliestYear) {
      let dateOption = document.createElement("option");
      dateOption.text = currentYear;
      dateOption.value = currentYear;
      startYearDropdown.add(dateOption);
      currentYear -= 1;
    }

    // Set end year dropdown
    while (furthestYear >= earliestYear2) {
      let dateOption = document.createElement("option");
      dateOption.text = furthestYear;
      dateOption.value = furthestYear;
      endYearDropdown.add(dateOption);
      furthestYear -= 1;
    }
  },
  methods: {
    getInitiative() {
      clientApi.find(this.$route.params.initiativeId).then((response) => {
        this.initiative = response.data.initiative;
      });
    },
    submitForm() {
      this.initiative.Practice_Key = this.goalTeamIdFromUserProp;
      axios
        .post(`/api/initiatives/${this.initiative.Initiative_Key}`, this.initiative)
        .then((res) => {
          this.emitPassInitiativeGoalTeam(); // How to reset the goal team dropdown null for new ones but maintain the value for already set initiatives
        });
    },
    emitPassInitiativeGoalTeam(event) {
      this.$emit("passInitiativeGoalTeamIdFromDb", this.goalTeamIdFromUserProp);
    },
  },
};
</script>
