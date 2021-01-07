<template >
  <div>
    <span
      >Enter Your Bugs Here
      <button type="button" class="btn btn-outline-info" @click="addBugs()">
        <i class="fa fa-plus" aria-hidden="true"></i></button
    ></span>
    <!-- model -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Enter Your Bug</h5>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"
                >Bug Title</label
              >
              <input
                type="text"
                v-model="bugData.title"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder="Bug title"
                required
                autofocus
              />
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label"
                >Bug Description</label
              >
              <textarea
                class="form-control"
                v-model="bugData.description"
                id="exampleFormControlTextarea1"
                rows="3"
              ></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" @click="sendBug(bugData)">
              Add Bug
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { bus } from "../app";
export default {
  data() {
    return {
      bugData: {
        title: "",
        description: "",
      },
    };
  },
  methods: {
    addBugs() {
      $("#exampleModal").modal("show");
    },
    sendBug(bugData) {
      axios.post("/bugs", bugData).then((response) => {
        bus.$emit("updatingBugs");
        (this.bugData.title = ""), (this.bugData.description = "");
        $("#exampleModal").modal("hide");
      });
    },
  },
};
</script>
<style scoped>
span {
  font-size: 50px;
}
button {
  margin-left: 10px;
}
</style>
