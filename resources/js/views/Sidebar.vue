<template>
  <div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Comps</div>
    <div class="list-group list-group-flush">
      <div class="border-bottom">
        <router-link
          :to="{ name: 'home' }"
          class="list-group-item list-group-item-action bg-light border-0"
          >General Information</router-link
        >
      </div>
      <div class="border-bottom">
        <div v-if="initiative">
          <p class="list-group-item list-group-item-action bg-light border-0 mb-0">
            Select a Goal Team
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
          Select an Initiative
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
      <div class="border-bottom">
        <div v-if="initiative">
          <p class="list-group-item list-group-item-action bg-light border-0 mb-0">
            Pathways
          </p>
          <router-link
            :to="{ name: 'pathway' }"
            class="list-group-item list-group-item-action bg-light border-0"
          >
            <span class="ml-3">Pathway 1</span>
          </router-link>
        </div>
      </div>
      <div class="border-bottom">
        <p class="list-group-item list-group-item-action bg-light border-0 mb-0">
          Outcomes
        </p>
        <router-link
          :to="{ name: 'outcome' }"
          class="list-group-item list-group-item-action bg-light border-0"
        >
          <span class="ml-3">Outcome 1</span>
        </router-link>
      </div>
      <div class="border-bottom">
        <router-link
          :to="{ name: 'milestones' }"
          class="list-group-item list-group-item-action bg-light border-0"
          >Milestones</router-link
        >
      </div>
      <div class="border-bottom">
        <router-link
          :to="{ name: 'financial-information' }"
          class="list-group-item list-group-item-action bg-light border-0"
          >Financial Information</router-link
        >
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
    };
  },

  created() {
    this.fetchGoalTeams();
    this.fetchInitiatives();
  },

  watch: {
    // call the method if the route changes
    $route: {
      handler: "displayGoalTeamSelect",
      immediate: true, // runs immediately with mount() instead of calling method on mount hook
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

    displayGoalTeamSelect() {
      clientApi.find(this.$route.params.initiativeId).then((response) => {
        this.initiative = response.data.initiative;
        this.initiativeGoalTeam = response.data.initiativeGoalTeam;
      });
    },

    storeInitiativeGoalTeam() {
      this.initiative.Practice_Key = this.goalTeamPracticeKey;
      clientApi.storeInitiativeGoalTeam(this.$route.params.initiativeId, {
        Practice_Key: this.initiative.Practice_Key,
        Initiative_Key: this.$route.params.initiativeId,
      });
    },

    async selectInitiative(event) {
      await clientApi.find(this.initiativeId).then((response) => {
        this.initiative = response.data.initiative;
      });

      this.$router.push({ path: "/initiative/" + this.initiative.Initiative_Key });
    },
  },
};
</script>
