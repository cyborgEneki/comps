<template>
  <div>
    <SelectInitiative @fetchGoalTeam="cacheGoalTeam"></SelectInitiative>
    <EditInitiative v-if="initiative" :initiativeProp="initiative" :goalTeamProp="goalTeam"></EditInitiative>
    <AddInitiative v-else :goalTeamProp="goalTeam"></AddInitiative>
  </div>
</template>

<script>
import SelectInitiative from "../views/SelectInitiative";
import AddInitiative from "../views/AddInitiative";
import EditInitiative from "../views/EditInitiative";

export default {
  data() {
    return {
      goalTeam: null,
      initiative: null,
    };
  },

  components: {
    SelectInitiative,
    AddInitiative,
    EditInitiative,
  },

  methods: {
    cacheGoalTeam(value) {
      this.goalTeam = value;
    },
  },

  mounted() {
    this.$root.$on("fetchSelectedInitiative", (value) => {
      this.initiative = value;
    });
  },
};
</script>
