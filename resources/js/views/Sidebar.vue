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
        <p
          class="list-group-item list-group-item-action bg-light border-0 mb-0"
        >
          Select an Initiative
        </p>
        <select
          class="custom-select custom-select-sm"
          v-model="initiativeId"
          @change="emitFetchSelectedInitiative"
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
        <p
          class="list-group-item list-group-item-action bg-light border-0 mb-0"
        >
          Pathways
        </p>
        <router-link
          :to="{ name: 'pathway' }"
          class="list-group-item list-group-item-action bg-light border-0"
        >
          <span class="ml-3">Pathway 1</span>
        </router-link>
      </div>
      <div class="border-bottom">
        <p
          class="list-group-item list-group-item-action bg-light border-0 mb-0"
        >
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

export default {
  data() {
    return {
      initiativeId: null,
      initiatives: null,
      initiative: null,
    };
  },

  created() {
    this.fetchInitiatives();
  },
  methods: {
    fetchInitiatives() {
      this.initiatives = null;

      axios.get("/api/initiatives").then((response) => {
        this.initiatives = response.data.initiatives;
      });
    },

    async emitFetchSelectedInitiative(event) {
      await axios
        .get("/api/initiative/" + this.initiativeId)
        .then((response) => {
          this.initiative = response.data.initiative;
        });

      this.$root.$emit("fetchSelectedInitiative", this.initiative);
    },
  },
};
</script>
