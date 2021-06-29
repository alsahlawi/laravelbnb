<template>
  <div>
    <bookable-list-item v-if="bookable1"
      :item-title="bookable1.title"
      :item-content="bookable1.content"
      :price="1000"
    ></bookable-list-item>
    <bookable-list-item v-if="bookable2"
      :item-title="bookable2.title"
      :item-content="bookable2.content"
      :price="1050"
    ></bookable-list-item>
  </div>
</template>
<script>

import BookableListItem from "./BookableListItem";

export default {
  components: {
    BookableListItem: BookableListItem,
  },
  data() {
    return {
      bookable1: null,
      bookable2: null,
    };
  },

  created() {

    setTimeout(() => {
      this.bookable1 = {
        title: "Cheap Villa 1",
        content: "A very Cheap villa 1 ",
        price: 1000,
      };
      this.bookable2 = {
        title: "Cheap Villa 2",
        content: "A very Cheap villa 2 ",
        price: 1500,
      };
      
    }, 2000);
  },
};
</script>