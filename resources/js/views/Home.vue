<template>
  <div>
    <SelectInitiative @fetchGoalTeam="cacheGoalTeam"></SelectInitiative>
    <EditInitiative
      v-if="initiative"
      :initiativeProp="initiative"
      :goalTeamProp="goalTeam"
      id="edit-initiative-component"
    ></EditInitiative>
    <AddInitiative
      v-else
      :goalTeamProp="goalTeam"
      id="add-initiative-component"
    ></AddInitiative>
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
      initiativeInformationFormDiv: null,
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

      if (!this.initiative) {
        this.initiativeInformationFormDiv = document.getElementById(
          "add-initiative-component"
        );
        console.log("test", this.initiativeInformationFormDiv);
      }
      this.initiativeInformationFormDiv.style.display = "block";
    });
  },
};
</script>
