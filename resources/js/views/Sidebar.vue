<template>
  <div class="bg-light border-right interface-border" id="sidebar-wrapper">
    <div class="sidebar-heading page-title__font"><span @click="clearInitiativeData">COMPS</span></div>
    <div class="list-group list-group-flush">
      <div class="border-bottom interface-border">
        <div v-if="initiative">
          <p class="list-group-item list-group-item-action bg-light border-0 mb-0">
            SELECT GOAL TEAM
          </p>
          <div v-if="initiativeGoalTeam">
            <select
              class="custom-select custom-select-sm"
              v-model="initiativeGoalTeam.Practice_Key"
              @change="storeInitiativeGoalTeam"
            >
              <option disabled value=""></option>
              <option
                v-for="{ Name, Practice_Key } in goalTeams"
                :value="Practice_Key"
                :key="Practice_Key"
              >
                {{ Name }}
              </option>
            </select>
          </div>
          <div v-else>
            <select
              class="custom-select custom-select-sm"
              v-model="goalTeamPracticeKey"
              @change="storeInitiativeGoalTeam"
            >
              <option disabled value=""></option>
              <option
                v-for="{ Name, Practice_Key } in goalTeams"
                :value="Practice_Key"
                :key="Practice_Key"
              >
                {{ Name }}
              </option>
            </select>
          </div>
        </div>
        <p class="list-group-item list-group-item-action bg-light border-0 mb-0">
          SELECT INITIATIVE
        </p>
        <select
          class="custom-select custom-select-sm"
          v-model="initiativeId"
          @change="selectInitiative"
        >
          <option disabled value=""></option>
          <option
            v-for="{ Name, Initiative_Key } in initiatives"
            :value="Initiative_Key"
            :key="Initiative_Key"
          >
            {{ Name }}
          </option>
        </select>
      </div>
      <div class="border-bottom interface-border">
        <div v-if="initiative">
          <p class="list-group-item list-group-item-action bg-light border-0 mb-0">
            PATHWAY
            <router-link
              :to="{ name: 'create-pathway' }"
              class="list-group-item list-group-item-action bg-light border-0 d-inline"
            >
              <i class="fas fa-plus-circle"></i>
            </router-link>
          </p>
          <div :key="pathway.Initiative_Indicator_Key" v-for="pathway in pathways">
            <router-link
              :to="{
                name: 'edit-pathway',
                params: {
                  pathwayId: pathway.Initiative_Indicator_Key,
                  initiativeIndicatorProp: pathway,
                },
              }"
              class="list-group-item list-group-item-action bg-light border-0"
            >
              <span class="ml-3">{{ pathway.Indicator_Label }}</span>
            </router-link>
          </div>
        </div>
      </div>
      <div class="border-bottom interface-border">
        <div v-if="initiative">
          <p class="list-group-item list-group-item-action bg-light border-0 mb-0">
            OUTCOMES
            <router-link
              :to="{ name: 'create-outcome' }"
              class="list-group-item list-group-item-action bg-light border-0 d-inline"
            >
              <i class="fas fa-plus-circle"></i>
            </router-link>
          </p>
          <div :key="outcome.Initiative_Indicator_Key" v-for="outcome in outcomes">
            <router-link
              :to="{
                name: 'edit-outcome',
                params: {
                  outcomeId: outcome.Initiative_Indicator_Key,
                  initiativeIndicatorProp: outcome,
                },
              }"
              class="list-group-item list-group-item-action bg-light border-0"
            >
              <span class="ml-3">{{ outcome.Indicator_Label }}</span>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import clientApi from "../api/initiatiave";

export default {
  data() {
    return {
      initiativeId: null,
      initiatives: null,
      initiative: null,
      goalTeamId: null,
      goalTeams: null,
      initiativeGoalTeam: null,
      goalTeamPracticeKey: null,
      pathways: null,
      outcomes: null,
    };
  },

  created() {
    this.fetchGoalTeams();
    this.fetchInitiatives();
  },

  watch: {
    $route(to, from) {
      if (to.name == "initiative") {
        this.fetchInitiativeData();
      }
    },
  },

  methods: {
    fetchGoalTeams() {
      axios.get("/api/practices").then((response) => {
        this.goalTeams = response.data.practices;
      });
    },

    fetchInitiatives() {
      clientApi.all().then((response) => {
        this.initiatives = response.data.initiatives;
      });
    },

    fetchInitiativeIndicators() {
      clientApi
        .allInitiativeIndicators(this.$route.params.initiativeId)
        .then((response) => {
          this.initiativeIndicators = response.data.initiativeIndicators;
        });
    },

    fetchInitiativeData() {
      getGoalTeam(this, this.$route.params.initiativeId);
      getPathways(this, this.$route.params.initiativeId, "P");
      getOutcomes(this, this.$route.params.initiativeId, "O");

      async function getGoalTeam(thisObject, initiativeId) {
        await clientApi
          .find(initiativeId)
          .then((response) => {
            thisObject.initiativeGoalTeam = response.data.initiativeGoalTeam;
          })
          .catch((err) => console.log(err));
      }

      async function getPathways(thisObject, initiativeId, indicatorType) {
        await clientApi
          .allInitiativeIndicators(initiativeId, indicatorType)
          .then((response) => {
            thisObject.pathways = response.data.initiativeIndicators;
          })
          .catch((err) => console.log(err));
      }

      async function getOutcomes(thisObject, initiativeId, indicatorType) {
        await clientApi
          .allInitiativeIndicators(initiativeId, indicatorType)
          .then((response) => {
            thisObject.outcomes = response.data.initiativeIndicators;
          })
          .catch((err) => console.log(err));
      }
    },

    storeInitiativeGoalTeam() {
      this.initiative.Practice_Key = this.goalTeamPracticeKey;
      clientApi.storeInitiativeGoalTeam(this.$route.params.initiativeId, {
        Practice_Key: this.initiative.Practice_Key,
        Initiative_Key: this.$route.params.initiativeId,
      });
    },

    async selectInitiative(event) {
      await clientApi
        .find(this.initiativeId)
        .then((response) => {
          this.initiative = response.data.initiative;
        })
        .catch((err) => console.log(err));

      this.$router.push({ path: "/initiative/" + this.initiative.Initiative_Key });
    },

    clearInitiativeData() {
      this.initiative = '';
      this.initiativeId = ''
    }
  },
};
</script>
