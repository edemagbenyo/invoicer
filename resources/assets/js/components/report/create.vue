<template>
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Create new report</h3>
      </div>

      <div class="panel-body">
        <div class="alert alert-info" role="alert" v-show="saveReportStatus==1">Saving...</div>
        <div class="alert alert-success" role="alert" v-show="saveReportStatus==2">Reports saved!</div>
        <form class="form-horizontal" enctype="multipart/form-data" novalidate>
          <div class="form-group">
            <div class="col-sm-12">
              <label for>Company Name</label>
              <input type="text" class="form-control" v-model="form.name">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-6">
              <label for>Work Date</label>
              <date-picker v-model="form.workdate" :config="options"></date-picker>
            </div>
            <div class="col-sm-6">
              <label for>Report By</label>
              <input type="text" class="form-control" v-model="form.reportby">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for>Premises Name</label>
              <input type="text" class="form-control" v-model="form.premises">
            </div>
            <div class="col-sm-6">
              <label for>Premises Address</label>
              <input type="text" class="form-control" v-model="form.address">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for>Site contact name</label>
              <input type="text" class="form-control" v-model="form.contactname">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <label for>Observation</label>
              <textarea class="form-control" rows="3" v-model="form.observation"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for>Conclusion</label>
              <textarea class="form-control" rows="3" v-model="form.conclusion"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for>FAO</label>
              <input type="text" class="form-control" v-model="form.fao">
            </div>
            <div class="col-sm-6">
              <label for>RE</label>
              <input type="text" class="form-control" v-model="form.re">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for>Price</label>
              <input type="text" class="form-control" v-model="form.price">
            </div>
            <div class="col-sm-6">
              <label for>Schedule of Works:</label>
              <input type="text" class="form-control" v-model="form.schedule">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for>Scope of Works:</label>
              <textarea class="form-control" rows="3" v-model="form.scope"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for>Terms</label>
              <input type="text" class="form-control" v-model="form.terms">
            </div>
            <div class="col-sm-6">
              <label for>Validity</label>
              <input type="text" class="form-control" v-model="form.validity">
            </div>
          </div>
          <div class="form-group dropbox">
            <input
              type="file"
              multiple
              :name="image.uploadFieldName"
              :disabled="saveReportStatus==2"
              @change="onImageChange($event);"
              accept="image/*"
              class="input-file"
            >
            <p v-if="saveReportStatus==0">
              Drag your file(s) here to begin
              <br>or click to browse
            </p>
            <p v-if="filesCount>0">Uploading {{ filesCount }} files...</p>
          </div>
          <div class="form-group">
            <button type="submit" @click.prevent="saveReports" class="btn btn-default">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import datePicker from "vue-bootstrap-datetimepicker";

export default {
  created() {},
  computed: {
    saveReportStatus() {
      return this.$store.getters.getSaveReportsStatus;
    }
  },
  data() {
    return {
      form: {
        name: "",
        workdate: "",
        reportby: "",
        premises: "",
        address: "",
        contactname: "",
        observation: "",
        conclusion: "",
        fao: "",
        re: "",
        price: "",
        schedule: "",
        scope: "",
        terms: "",
        validity: ""
      },
      image: {
        uploadedFiles: [],
        uploadError: null,
        currentStatus: null,
        uploadFieldName: "photos"
      },
      options: {
        format: "DD-MM-YYYY",
        useCurrent: true
      },
      filesCount:0
    };
  },
  methods: {
    saveReports() {
      if (this.validateFields()) {
        return this.$store.dispatch("addNewreport", this.form);
      }
    },
    validateFields() {
      let validationInfo = true;

      return validationInfo;
    },
    onImageChange(e) {
        console.log(e);
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.filesCount = files.length;
      this.createImage(files);
    },
    createImage(files) {
        this.form.image = [];
        let vms = this.form.image
        Array.from(files).forEach((element, index) => {
            let reader = new FileReader();
            reader.onload = e => {
              vms[index] = e.target.result; //or we could use reader.result
            };
            reader.readAsDataURL(files[index]);
        });
        
    }
  },
  components: {
    datePicker
  }
};
</script>


<style>
.dropbox {
  outline: 2px dashed grey; /* the dash box */
  outline-offset: -10px;
  background: lightcyan;
  color: dimgray;
  padding: 10px 10px;
  min-height: 200px; /* minimum height */
  position: relative;
  cursor: pointer;
}
.input-file {
  opacity: 0; /* invisible but it's there! */
  width: 100%;
  height: 200px;
  position: absolute;
  cursor: pointer;
}

.dropbox:hover {
  background: lightblue; /* when mouse over to the drop zone, change color */
}

.dropbox p {
  font-size: 1.2em;
  text-align: center;
  padding: 50px 0;
}
</style>
