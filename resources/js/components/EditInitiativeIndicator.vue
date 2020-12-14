<template>
  <div class="row container">
    <div class="col-12 col-md-6 ml-md-3 my-3">
      <div class="page-title__font" v-if="currentRoute == 'edit-outcome'">
        Edit Outcome
      </div>
      <div class="page-title__font" v-if="currentRoute == 'edit-pathway'">
        Edit Pathway
      </div>
      <form @submit.prevent="editPathwayOutcome">
        <div class="form-group">
          <label for="pathway-statement">Pathway Statement</label>
          <textarea
            class="form-control"
            id="pathway-statement"
            rows="3"
            v-model="initiativeIndicator.Statement"
          ></textarea>
        </div>
        <div class="form-group">
          <label for="indicator-description">Indicator Description</label>
          <textarea
            class="form-control"
            id="indicator-description"
            rows="3"
            v-model="initiativeIndicator.Indicator_Description"
          ></textarea>
        </div>
        <div class="form-group">
          <label for="indicator-label">Indicator Label</label>
          <input
            type="text"
            class="form-control"
            id="indicator-label"
            v-model="initiativeIndicator.Indicator_Label"
          />
        </div>
        <div class="form-group">
          <label for="indicator-units">Indicator Units</label>
          <input
            type="text"
            class="form-control"
            id="indicator-units"
            v-model="initiativeIndicator.Indicator_Units"
          />
        </div>
        <div class="form-group">
          <label for="indicator-data-source">Indicator Data Source</label>
          <textarea
            class="form-control"
            id="indicator-data-source"
            rows="3"
            v-model="initiativeIndicator.Indicator_Data_Source"
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
    initiativeIndicatorProp: Object,
  },
  computed: {
    currentRoute() {
      return this.$route.name;
    },
    initiativeIndicator() {
      return this.initiativeIndicatorProp;
    },
  },
  mounted() {
    let yearDropdown = document.getElementById("target-year"),
      earliestYear = 1970,
      furthestYear = 2050;

    // Set start year dropdown
    while (furthestYear >= earliestYear) {
      let dateOption = document.createElement("option");
      dateOption.text = earliestYear;
      dateOption.value = earliestYear;
      yearDropdown.add(dateOption);
      earliestYear += 1;
    }
  },
  methods: {
    editPathwayOutcome() {
      if (this.currentRoute == "edit-outcome") {
        clientApi.storeInitiativeIndicator(
          this.$route.params.initiativeId,
          this.$route.params.outcomeId,
          Object.assign(this.initiativeIndicator, { Indicator_Type: "O" })
        );
      }
      if (this.currentRoute == "edit-pathway") {
        clientApi.storeInitiativeIndicator(
          this.$route.params.initiativeId,
          this.$route.params.pathwayId,
          Object.assign(this.initiativeIndicator, { Indicator_Type: "P" })
        );
      }
    },
  },
};
</script>
