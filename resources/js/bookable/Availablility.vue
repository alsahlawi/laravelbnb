<template>
  <div>
    <h6 class="text-uppercase text-secondary font-weight-bolder">
      Check Availability
      <span v-if="noAvailability" class="text-danger">
        (Not Available)
      </span>
      <span v-if="hasAvailability" class="text-success">
        (Available)
      </span>
    </h6>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="from">From</label>
        <input
          v-model="from"
          type="text"
          name="from"
          class="form-control form-control-sm"
          placeholder="Start Date"
          :class="[{ 'is-invalid': this.errorFor('from') }]"
        />
        <div class="invalid-feedback" v-for="(error,index) in this.errorFor('from')" :key="'from'+ index">
            {{error}}
        </div>
      </div>
      <div class="form-group col-md-6">
        <label for="from">To</label>
        <input
          v-model="to"
          type="text"
          name="to"
          class="form-control form-control-sm"
          placeholder="End Date"
          @keyup.enter="check()"
          :class="[{ 'is-invalid': this.errorFor('to') }]"
        />
        <div class="invalid-feedback" v-for="(error2,index) in this.errorFor('to')" :key="'to'+ index">
            {{error2}}
        </div>
      </div>
        
    </div>
    <button
      class="btn btn-secondary btn-block"
      @click="check()"
      :disabled="loading"
    >
      Check
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      from: null,
      to: null,
      loading: false,
      status: null,
      errors: null,
    };
  },
  computed: {
    hasErrors() {
      return 422 == this.status || this.errors != null;
    },
    hasAvailability() {
      return 200 == this.status;
    },
    noAvailability() {
      console.log(this.status);
      return 404 == this.status;
    },
  },
  methods: {
    errorFor: function (field) {
      return this.hasErrors && this.errors[field] ? this.errors[field] : null;
    },
    check() {
      this.loading = true;
      this.errors = null;
      axios
        .get(
          `/api/bookables/${this.$route.params.id}/availability?from=${this.from}&to=${this.to}`
        )
        .then((response) => (this.status = response.status))
        .catch((error) => {
          console.log(error.response.status);
          if (422 == error.response.status) {
            this.errors = error.response.data.errors;
          }
         
          this.status = error.response.status;
        })
        .then(() => (this.loading = false));
    },
  },
};
</script>

<style scoped>
label {
  font-size: 0.7 rem;
  text-transform: uppercase;
  color: grey;
  font-weight: bolder;
}

invalid-feedback {
  color:maroon
}

</style>
    
