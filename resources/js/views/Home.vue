<template>
  <div>
    <SelectInitiative @fetchGoalTeam="cacheGoalTeam"></SelectInitiative>
    <EditInitiative
      v-if="initiative"
      :initiativeProp="initiative"
      :goalTeamProp="goalTeam"
      id="edit-initiative-component"
    ></EditInitiative>
  </div>
</template>

<script>
import SelectInitiative from "../views/SelectInitiative";
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
      console.log(this.initiative);
    });
  },
};
</script>
