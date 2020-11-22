<template>
  <div>
    <SelectInitiative @fetchGoalTeam="cacheGoalTeamProp"></SelectInitiative>
    <AddInitiative :goalTeamProp="goalTeam"></AddInitiative>
  </div>
</template>

<script>
import SelectInitiative from "../views/SelectInitiative";
import AddInitiative from "../views/AddInitiative";

export default {
  data() {
    return {
      goalTeam: null
    }
  },

  components: {
    SelectInitiative,
    AddInitiative,
  },

  methods: {
    cacheGoalTeamProp(value) {
      this.goalTeam = value;
    }
  },
};
</script>
