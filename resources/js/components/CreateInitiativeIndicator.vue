<template>
  <div class="row container">
    <div class="col-12 col-md-6 ml-md-3 my-3">
      <div class="page-title__font" v-if="currentRoute == 'create-outcome'">
        Create Outcome
      </div>
      <div class="page-title__font" v-if="currentRoute == 'create-pathway'">
        Create Pathway
      </div>
      <form @submit.prevent="savePathwayOutcome">
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

      <div class="border mt-3">
        <div class="mt-3 ml-3">Subcategories</div>
        <div class="border m-3">
          <div class="row">
            <div class="col-md-6 col-8">
              <div class="mt-3 pathway-outcome-form__subcategories-title">
                Subcategories 1
              </div>
            </div>
            <div class="col-md-2 offset-md-3 col-3 mr-3">
              <button type="submit" class="btn btn-primary mt-3">Delete</button>
            </div>
          </div>
          <div class="row ml-0 ml-md-3">
            <div class="col-10 col-md-8">
              <form class="mt-3">
                <div class="form-group">
                  <label for="label">Label</label>
                  <input type="text" class="form-control" id="label" />
                </div>
                <div class="form-group">
                  <label for="target-year">Target Year</label>
                  <select class="form-control" id="target-year">
                    <option value="" v-for="year in years" :key="year.YearId"></option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="target-value">Target Value</label>
                  <input type="number" class="form-control" id="target-value" />
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Year</th>
                      <th scope="col">Value</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
                <button class="btn btn-primary mb-3">Add Row</button>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2 offset-8 col-md-2 offset-md-9">
            <button type="submit" class="btn btn-primary mb-3 mr-4">Add</button>
          </div>
        </div>
      </div>
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
      years: null
    };
  },
  mounted() {
    this.fetchYears();
  },
  methods: {
    fetchYears() {
      
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
