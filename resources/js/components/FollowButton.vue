<template>
  <div>
    <button class="btn btn-primary ml-5" @click="followUser">Follow</button>
  </div>
</template>

<script>
export default {
  props: ["userId"],

  mounted() {
    console.log("Component mounted.");
  },

  methods: {
    followUser() {
      axios
        .post("/follow", {
          userId: this.userId
        })
        .then(response => {
          console.log(response.data);
        });
    }
  }
};
</script>
