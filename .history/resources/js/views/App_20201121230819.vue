<template>
  <div>
    <div class="d-flex" id="wrapper">
      <h1>Vue Router Demo App</h1>

      <p>
        <router-link :to="{ name: 'home' }">Home</router-link> |
        <router-link :to="{ name: 'hello' }">Hello World</router-link>
      </p>

      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Start Bootstrap</div>
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action bg-light"
            >Dashboard</a
          >
          <a href="#" class="list-group-item list-group-item-action bg-light"
            >Shortcuts</a
          >
          <a href="#" class="list-group-item list-group-item-action bg-light"
            >Overview</a
          >
          <a href="#" class="list-group-item list-group-item-action bg-light"
            >Events</a
          >
          <a href="#" class="list-group-item list-group-item-action bg-light"
            >Profile</a
          >
          <a href="#" class="list-group-item list-group-item-action bg-light"
            >Status</a
          >
        </div>
      </div>
      <!-- /#sidebar-wrapper -->

      <div id="page-content-wrapper">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>