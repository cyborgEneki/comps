<template>
  <div class="row container">
    <div class="col-12 col-md-6 ml-md-3 my-3">
      <div class="page-title__font header--font" v-if="currentRoute == 'create-outcome'">
        CREATE OUTCOME
      </div>
      <div class="page-title__font header--font" v-if="currentRoute == 'create-pathway'">
        CREATE PATHWAY
      </div>
      <form @submit.prevent="savePathwayOutcome">
        <div class="form-group">
          <label for="pathway-statement">PATHWAY STATEMENT</label>
          <textarea
            class="form-control"
            id="pathway-statement"
            rows="3"
            v-model="initiativeIndicator.Statement"
          ></textarea>
        </div>
        <div class="form-group">
          <label for="indicator-description">INDICATOR DESCRIPTION</label>
          <textarea
            class="form-control"
            id="indicator-description"
            rows="3"
            v-model="initiativeIndicator.Indicator_Description"
          ></textarea>
        </div>
        <div class="form-group">
          <label for="indicator-label">INDICATOR LABEL</label>
          <input
            type="text"
            class="form-control"
            id="indicator-label"
            v-model="initiativeIndicator.Indicator_Label"
          />
        </div>
        <div class="form-group">
          <label for="indicator-units">INDICATOR UNITS</label>
          <input
            type="text"
            class="form-control"
            id="indicator-units"
            v-model="initiativeIndicator.Indicator_Units"
          />
        </div>
        <div class="form-group">
          <label for="indicator-data-source">INDICATOR DATA SOURCE</label>
          <textarea
            class="form-control"
            id="indicator-data-source"
            rows="3"
            v-model="initiativeIndicator.Indicator_Data_Source"
          ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">SAVE</button>
      </form>
    </div>
  </div>
</template>

<script>
import clientApi from "../api/initiatiave";

export default {
  computed: {
    currentRoute() {
      return this.$route.name;
    },
  },
  data() {
    return {
      initiativeIndicator: {
        Indicator_Key: null,
        Statement: null,
        Indicator_Description: null,
        Indicator_Label: null,
        Indicator_Units: null,
        Indicator_Data_Source: null,
        Number_of_Subcategories: null,
        Indicator_Type: null,
      },
      years: null,
      currentData: {
        Year_Key: null,
        Initiative_Key: null,
        Value: null
      }
    };
  },
  mounted() {
    this.fetchYears();
  },
  methods: {
    fetchYears() {
      clientApi.allYears().then(response => {
        this.years = response.data.years;
      });
    },
    savePathwayOutcome() {
      if (this.currentRoute == "create-outcome") {
        clientApi.storeInitiativeIndicator(
          this.$route.params.initiativeId,
          0,
          Object.assign(this.initiativeIndicator, {Indicator_Type: "O"})
        );
      }
      if (this.currentRoute == "create-pathway") {
        clientApi.storeInitiativeIndicator(
          this.$route.params.initiativeId,
          0,
          Object.assign(this.initiativeIndicator, {Indicator_Type: "P"})
        );
      }
    },
  },
};
</script>
