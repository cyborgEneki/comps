<template>
  <div>
    <SidebarNavbar></SidebarNavbar>
    <InitiativeForm></InitiativeForm>
  </div>
</template>

<script>
import SidebarNavbar from "../views/SidebarNavbar";
import InitiativeForm from "../views/InitiativeForm";

export default {
  components: {
    SidebarNavbar,
    InitiativeForm,
  },
};
</script>
