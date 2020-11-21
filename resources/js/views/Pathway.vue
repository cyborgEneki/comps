<template>
  <div class="row container">
    <div class="col-12 col-md-6 ml-md-3 my-3">
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
          <label for="indicator-statement">Indicator Statement</label>
          <textarea class="form-control" id="indicator-statement" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="initiative-description">Initiative Description</label>
          <textarea class="form-control" id="initiative-description" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="initiative-label">Initiative Label</label>
          <input type="text" class="form-control" id="initiative-label" />
        </div>
        <div class="form-group">
          <label for="initiative-units">Initiative Units</label>
          <input type="text" class="form-control" id="initiative-units" />
        </div>
        <div class="form-group">
          <label for="initiative-data-source">Initiative Data Source</label>
          <textarea class="form-control" id="initiative-data-source" rows="3"></textarea>
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
export default {
  
};
</script>
