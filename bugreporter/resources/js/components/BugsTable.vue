<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Bug ID</th>
          <th scope="col">Bug Title</th>
          <th scope="col">Bug Description</th>
          <th scope="col">Bug Current State</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="Bug in Bugs" :key="Bug.id">
          <th scope="row">{{ Bug.id }}</th>
          <td>{{ Bug.title.substring(0, 10) + ".." }}</td>
          <td>{{ Bug.description.substring(0, 15) + ".." }}</td>
          <td>
            <div v-if="Bug.status">
              <button @click="markAsNon(Bug.id)" class="btn btn-success">
                Completed
              </button>
            </div>
            <div v-else>
              <button @click="markAs(Bug.id)" class="btn btn-danger">
                Non Completed
              </button>
            </div>
          </td>
          <td>
            <button @click="delBugs(Bug.id)">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
          </td>
          <td>
            <a :href="base + Bug.id">Show</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import { bus } from "../app";
export default {
  data() {
    return {
      Bugs: [],
      editBug: {
        status: "",
      },
      base: "/bugs/",
    };
  },
  mounted() {
    this.getBugs();
  },
  methods: {
    getBugs: function () {
      axios.get("/bugs").then((response) => {
        this.Bugs = response.data;
      });
    },
    delBugs(id) {
      axios.delete("/bugs/" + id).then((response) => {
        this.getBugs();
      });
    },
    markAsNon(id) {
      this.editBug.status = false;
      axios.put("/bugs/" + id, this.editBug).then((response) => {
        this.getBugs();
      });
    },
    markAs(id) {
      this.editBug.status = true;
      axios.put("/bugs/" + id, this.editBug).then((response) => {
        this.getBugs();
      });
    },
  },
  created() {
    bus.$on("updatingBugs", (data) => {
      this.getBugs();
    });
  },
};
</script>
<style>
</style>
