<template>
  <div class="row container">
    <div class="col-12 col-md-3 ml-md-3">

      <div class="my-3 font-weight-bold">Initiative Name</div>

      <select class="custom-select custom-select-sm" v-model="initiativeName" @change="showInitiativeInformationFormDiv">
        <option disabled value=""></option>
        <option v-for="{ Name, Initiative_Key } in initiatives" :value="Initiative_Key" :key="Initiative_Key">{{ Name }}</option>
      </select>

      <br />

      <div class="my-3 font-weight-bold">Goal Team</div>

      <select class="custom-select custom-select-sm" v-model="goalTeam">
        <option disabled value=""></option>
        <option v-for="{ Name, Practice_Key } in goalTeams" :value="Practice_Key" :key="Practice_Key">{{ Name }}</option>
      </select>
      
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      goalTeams: null,
      goalTeam: null,
      initiativeName: null,
      initiatives: null,
      initiativeInformationFormDiv: null,
    };
  },
  created() {
    this.fetchGoalTeams();
    this.fetchInitiatives();
  },
  mounted() {
    this.initiativeInformationFormDiv = document.getElementById("initiative-information-form");
  },
  methods: {
    fetchGoalTeams() {
      this.goalTeams = null;

      axios.get("/api/practices").then((response) => {
        this.goalTeams = response.data.practices;
      });
    },

    fetchInitiatives() {
      this.initiatives = null;

      axios.get("/api/initiatives").then((response) => {
        this.initiatives = response.data.initiatives;
      });
    },

    showInitiativeInformationFormDiv() {
      this.initiativeInformationFormDiv.style.display = "block";
    },
  },
};
</script>
