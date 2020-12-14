<template>
  <div>
    <div class="d-flex" id="wrapper">
      <Sidebar></Sidebar>

      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar--height interface-border">
          <button class="btn home-page__button" id="menu-toggle">
            <i class="fas fa-bars"></i>
          </button>
        </nav>
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from "../views/Sidebar";
export default {
  components: {
    Sidebar,
  },
};
</script>
