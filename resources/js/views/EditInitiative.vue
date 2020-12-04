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
export default {
  props: {
    goalTeamProp: Number,
    initiativeProp: Object,
  },

  computed: {
    initiative() {
      return this.initiativeProp
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
    submitForm() {
      this.initiative.goal_team = this.goalTeamProp;
      axios.post(`/api/initiatives/${this.initiative.Initiative_Key}`, this.initiative).then((res) => {
        //Reload the page with data filled
        console.log(res, 'test')
      });
    },
  },
};
</script>
