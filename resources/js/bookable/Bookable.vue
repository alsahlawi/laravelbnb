<template>
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div v-if="loading">Loading Data ..</div>
           <div v-else> 
            <h2>
              {{ bookable.title }}
            </h2>
            <hr />
            <article>
              {{ bookable.description }}
            </article>
         </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 pb-4">
      <Availability></Availability>
    </div>
  </div>
</template>

<script>
import Availability from './Availablility'
export default {
  components: {
    Availability,
  },
  data() {
    return {
      bookable: null,
      loading: false,
    };
  },
  created() {
    this.loading = true;
    axios.get(`/api/bookables/${this.$route.params.id}`).then((response) => {
      this.bookable = response.data.data;
      this.loading =  false;
    });
  },
};
</script>