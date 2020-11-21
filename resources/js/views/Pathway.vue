<template>
  <div class="row container">
    <div class="col-12 col-md-6 ml-md-3 my-3">
      <div class="page-title__font">Pathway 1</div>
      <form>
        <div class="form-group">
          <label for="pathway-statement">Pathway Statement</label>
          <textarea class="form-control" id="pathway-statement" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="indicator-description">Indicator Description</label>
          <textarea class="form-control" id="indicator-description" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="indicator-label">Indicator Label</label>
          <input type="text" class="form-control" id="indicator-label" />
        </div>
        <div class="form-group">
          <label for="indicator-units">Indicator Units</label>
          <input type="text" class="form-control" id="indicator-units" />
        </div>
        <div class="form-group">
          <label for="indicator-data-source">Indicator Data Source</label>
          <textarea class="form-control" id="indicator-data-source" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="number-of-subcategories">Number of Subcategories</label>
          <input type="number" class="form-control" id="number-of-subcategories" />
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {};
</script>
