<template>
  <div class="row container">
    <div class="col-12 col-md-6 ml-md-3 my-3">
      <div class="page-title__font">Initiative Information</div>
      <form>
        <div class="form-group">
          <label for="initiative-name">Initiative Name</label>
          <input type="text" class="form-control" id="initiative-name" />
        </div>
        <div class="form-group">
          <label for="initiative-name">Name of Initiative Lead</label>
          <input type="text" class="form-control" id="name-of-initiative-lead" />
        </div>
        <div class="form-group">
          <label for="initiative-lead-email">Initiative Lead Email</label>
          <input type="email" class="form-control" id="initiative-lead-email" />
        </div>
        <div class="form-group">
          <label for="initiative-start-year">Initiative Start Year</label>
          <select class="form-control" id="initiative-start-year"></select>
        </div>
        <div class="form-group">
          <label for="initiative-end-year">Initiative End Year</label>
          <select class="form-control" id="initiative-end-year"></select>
        </div>
        <div class="form-group">
          <label for="initiative-statement">Initiative Statement</label>
          <textarea class="form-control" id="initiative-statement" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    let startYearDropdown = document.getElementById("initiative-start-year"),
      endYearDropdown = document.getElementById("initiative-end-year"),
      currentYear = new Date().getFullYear(),
      earliestYear = 1970,
      furthestYear = 2050,
      earliestYear2 = 1970;

    // Set start year dropdown
    while (currentYear >= earliestYear) {
      let dateOption = document.createElement("option");
      dateOption.text = currentYear;
      dateOption.value = currentYear;
      startYearDropdown.add(dateOption);
      currentYear -= 1;
    }

    // Set end year dropdown
    while (furthestYear >= earliestYear2) {
      let dateOption = document.createElement("option");
      dateOption.text = furthestYear;
      dateOption.value = furthestYear;
      endYearDropdown.add(dateOption);
      furthestYear -= 1;
    }
  },
};
</script>
