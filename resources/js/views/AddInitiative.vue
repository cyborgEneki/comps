<template>
  <div class="row container display-none">
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
            v-model="form.name"
          />
        </div>
        <div class="form-group">
          <label for="initiative-name">Name of Initiative Lead</label>
          <input
            type="text"
            class="form-control"
            id="name-of-initiative-lead"
            name="lead_name"
            v-model="form.lead_name"
          />
        </div>
        <div class="form-group">
          <label for="initiative-lead-email">Initiative Lead Email</label>
          <input
            type="email"
            class="form-control"
            id="initiative-lead-email"
            name="lead_email"
            v-model="form.lead_email"
          />
        </div>
        <div class="form-group">
          <label for="initiative-start-year">Initiative Start Year</label>
          <select
            class="form-control"
            id="initiative-start-year"
            name="start_year"
            v-model="form.start_year"
          >
            <option value=""></option>
          </select>
        </div>
        <div class="form-group">
          <label for="initiative-end-year">Initiative End Year</label>
          <select
            class="form-control"
            id="initiative-end-year"
            name="end_year"
            v-model="form.end_year"
          >
            <option value=""></option>
          </select>
        </div>
        <div class="form-group">
          <label for="initiative-statement">Initiative Statement</label>
          <textarea
            class="form-control"
            id="initiative-statement"
            name="statement"
            rows="3"
            v-model="form.statement"
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

  data() {
    return {
      form: {
        name: null,
        lead_name: null,
        lead_email: null,
        start_year: null,
        end_year: null,
        statement: null,
        goal_team: null,
      },
      initiative: null,
    };
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
      this.form.goal_team = this.goalTeamProp;
      axios.post("/api/initiatives", this.form).then(() => {
        //Reload the page with data filled
      });
    },
  },
};
</script>
