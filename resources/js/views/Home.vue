<template>
  <div>
    <SelectGoalTeam :goalTeamIdFromDbProp="goalTeamIdFromDb" @fetchGoalTeamIdFromUser="cacheGoalTeamIdFromUser"></SelectGoalTeam>
   
  </div>
</template>

<script>
import SelectGoalTeam from "../views/SelectGoalTeam";

export default {
  data() {
    return {
      goalTeamIdFromUser: null,
      initiative: null,
      goalTeamIdFromDb: null
    };
  },

  components: {
    SelectGoalTeam
  },

  methods: {
    cacheGoalTeamIdFromUser(value) {
      this.goalTeamIdFromUser = value;
    },
    cacheInitiativeGoalTeamIdFromDb(value) {
      this.goalTeamIdFromDb = value
    }
  }
};
</script>
