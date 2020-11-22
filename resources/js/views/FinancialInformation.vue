<template>
  <div class="row container">
    <div class="col-md-5 ml-md-3 my-3">
      <div class="page-title__font">Financial Information</div>
      <form>
        <div class="form-group">
          <label for="total-cost-budget">Total Cost Budget</label>
          <input type="number" class="form-control" id="total-cost-budget" />
        </div>
        <div class="form-group">
          <label for="total-funds-secured">Total Funds Secured</label>
          <input type="number" class="form-control" id="total-funds-secured" />
        </div>
        <div class="form-group">
          <label for="total-funds-anticipated">Total Funds Anticipated</label>
          <input type="number" class="form-control" id="total-funds-anticipated" />
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</template>