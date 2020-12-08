<template>
  <div>
    <SelectGoalTeam :goalTeamIdFromDbProp="goalTeamIdFromDb" @fetchGoalTeamIdFromUser="cacheGoalTeamIdFromUser"></SelectGoalTeam>
    <EditInitiative
      v-if="initiative"
      :initiativeProp="initiative"
      :goalTeamIdFromUserProp="goalTeamIdFromUser"
      id="edit-initiative-component"
      @passInitiativeGoalTeamIdFromDb="cacheInitiativeGoalTeamIdFromDb"
    ></EditInitiative>
  </div>
</template>

<script>
import SelectGoalTeam from "../views/SelectGoalTeam";
import EditInitiative from "../views/EditInitiative";

export default {
  data() {
    return {
      goalTeamIdFromUser: null,
      initiative: null,
      goalTeamIdFromDb: null
    };
  },

  components: {
    SelectGoalTeam,
    EditInitiative,
  },

  methods: {
    cacheGoalTeamIdFromUser(value) {
      this.goalTeamIdFromUser = value;
    },
    cacheInitiativeGoalTeamIdFromDb(value) {
      this.goalTeamIdFromDb = value
    }
  },

  mounted() {
    this.$root.$on("fetchSelectedInitiative", (value) => {
      this.initiative = value;
    });
  },
};
</script>
