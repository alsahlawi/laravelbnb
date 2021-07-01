<template>
  <div>
    <div v-if="loading">Data is loading ...</div>
    <div v-else>
      <div class="row mb-4" v-for="row in rows" :key="'row' + row">
        <div
          class="col d-flex align-items-streached"
          v-for="(bookable, column) in bookablesInRow(row)"
          :key="'row' + row + column"
        >
          <bookable-list-item v-bind="bookable"></bookable-list-item>
        </div>

        <div
          class="col"
          v-for="p in placeholdersInRow(row)"
          :key="'placeholder' + row + p"
        ></div>
      </div>
    </div>
  </div>
</template>
<script>
import BookableListItem from "./BookableListItem";

export default {
  components: {
    BookableListItem: BookableListItem,
  },
  methods: {
    bookablesInRow(row) {
      return this.bookables.slice((row - 1) * this.columns, row * this.columns);
    },
    placeholdersInRow(row) {
      return this.columns - this.bookablesInRow(row).length;
    },
  },
  data() {
    return {
      bookables: null,
      loading: false,
      columns: 3,
    };
  },
  computed: {
    rows() {
      return this.bookables == null
        ? 0
        : Math.ceil(this.bookables.length / this.columns);
    },
  },
  created() {
    this.loading = true;

    // const p = new Promise((resolve, reject) => {
    //   console.log(resolve);
    //   console.log(reject);
    //   setTimeout(() => {
    //     resolve("Hello");
    //   }, 3000);
    // })
    //   .then((result) => "Hello Again " + result)
    //   .then((result) => console.log(result))
    //   .catch((result) => console.log(`Error ${result}`));

    const request = axios.get("/api/bookables").then((response) => {
      this.bookables = response.data;

      this.loading = false;
    });
    console.log(request);

    // setTimeout(() => {
    //   this.bookables = [
    //     {
    //       id: 1,
    //       title: "Cheap Villa 1",
    //       content: "A very Cheap villa 1 ",
    //       price: 1000,
    //     },
    //     {
    //       id: 2,
    //       title: "Cheap Villa 2",
    //       content: "A very Cheap villa 2 ",
    //       price: 1500,
    //     },
    //     {
    //       id: 2,
    //       title: "Cheap Villa 2",
    //       content: "A very Cheap villa 2 ",
    //       price: 1500,
    //     },
    //     {
    //       id: 2,
    //       title: "Cheap Villa 2",
    //       content: "A very Cheap villa 2 ",
    //       price: 1500,
    //     },
    //     {
    //       id: 2,
    //       title: "Cheap Villa 2",
    //       content: "A very Cheap villa 2 ",
    //       price: 1500,
    //     },
    //     {
    //       id: 2,
    //       title: "Cheap Villa 2",
    //       content: "A very Cheap villa 2 ",
    //       price: 1500,
    //     },
    //     {
    //       id: 2,
    //       title: "Cheap Villa 2",
    //       content: "A very Cheap villa 2 ",
    //       price: 1500,
    //     },
    //   ];

    // }, 3000);
  },
};
</script>