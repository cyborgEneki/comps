<template>
  <div class="row container">
    <div class="col-12 col-md-3 ml-md-3">
      <div class="my-3 font-weight-bold">Goal Team</div>
      <select
        v-if="goalTeamIdFromDb"
        class="custom-select custom-select-sm"
        v-model="goalTeam"
        @change="emitFetchGoalTeam"
      >
        <option disabled value=""></option>
        <option
          v-for="{ Name, Practice_Key } in goalTeams"
          :value="goalTeamIdFromDbProp"
          :key="Practice_Key"
        >
          {{ Name }}
        </option>
      </select>

      <select
        v-else
        class="custom-select custom-select-sm"
        v-model="goalTeam"
        @change="emitFetchGoalTeam"
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
</template>

<script>
import axios from "axios";

export default {
  props: {
    goalTeamIdFromDbProp: Number
  },
  data() {
    return {
      goalTeams: null,
      goalTeam: null,
      initiatives: null,
      initiative: null,
      initiativeInformationFormDiv: null,
    };
  },
  computed: {
    goalTeamIdFromDb() {
      console.log(this.goalTeamIdFromDbProp, 'gtdb'); // Pass this and show dropdown with value else show blank select option
      return this.goalTeamIdFromDbProp;
    }
  },
  created() {
    this.fetchGoalTeams();
    this.fetchInitiatives();
  },

  mounted() {
    this.initiativeInformationFormDiv = document.getElementById(
      "initiative-information-form"
    );
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

    emitFetchGoalTeam(event) {
      this.$emit("fetchGoalTeamIdFromUser", this.goalTeam);
    },
  },
};
</script>
