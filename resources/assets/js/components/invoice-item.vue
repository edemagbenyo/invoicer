<template>
  <table class="table">
      <thead>
          <tr>
              <th colspan="5" v-show="error" style="background:red; color:white; padding:3px">{{error}}</th>
          </tr>
          <tr>
              <th width="30%">Decsription</th>
              <th width="15%">Unit Price</th>
              <th width="10%">Quantity</th>
              <th width="10%">Net Total</th>
              <th width="15%">Options</th>
          </tr>
      </thead>
      <tbody>
            <tr v-for="(line, index) in lines" v-bind:key="index">
                <td width="30%">
                    <textarea class="form-control" v-model="line.description" rows="1"></textarea>
                </td>
                <td width="20%">
                    <input type="number" class="form-control" v-model="line.unitprice" @change="calculateNet(index)">
                </td>
                <td width="10%" >
                    <input type="number" class="form-control" v-model="line.quantity" @change="calculateNet(index)">
                </td>
                <td width="25%">
                    <input type="number" class="form-control" v-model="line.nettotal" readonly>
                </td>
                <td width="15%">
                    <button class="btn-link" @click.prevent="removeLine(index)" >Delete</button>
                    <button class="btn-link" v-if="index + 1 === lines.length" @click.prevent="addLine">Add </button>
                </td>
            </tr>

            <tr>
                <td>
                    
                </td>
                <td colspan="4">
                    <h3>Vat Summary</h3>
                    <table class="table" style="float:right">
                        <thead>
                            <tr>
                                <th>Vat Rate</th>
                                <th>Subtotal</th>
                                <th>Vat Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{settings.vat}}</td>
                                <td>{{subtotal}}</td>
                                <td>{{vattotal}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table" style="float:right">
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>{{subtotal}}</td>
                            </tr>
                            <tr>
                                <td>Vat</td>
                                <td>{{vattotal}}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>{{total}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
      </tbody>
  </table>
</template>

<script>
export default {
  name: 'PhoneNumberLine',
  data () {
    return {
      lines: [],
      blockRemoval: true,
      error:null
    }
  },
  created(){
      
  },
  watch: {
    lines () {
      this.blockRemoval = this.lines.length <= 1
    }
  },
  computed:{
      subtotal(){
        return this.lines.reduce((acc, val)=>{
                    return Number(acc + val.nettotal)
                },0);
      },
      vattotal(){
          if(this.settings)
          return Number(Math.floor((this.settings.vat/100) * this.subtotal)).toFixed(2);
      },
      settings(){
          return this.$store.getters.getSettings;
      },
      total(){
          return Number(this.subtotal) + Number(this.vattotal);
      }
  },
  methods: {
    addLine () {
        //Block the creation of new inputs if the quantity field is empty
      let checkEmptyLines = this.lines.filter(line => line.quantity === 0)
      if (checkEmptyLines.length >= 1 && this.lines.length > 0) {
          this.error= "Quantity must be greate than 0";
          return;
      }
      this.error = null;
      this.lines.push({
        description: null,
        unitprice: 0,
        quantity: 0,
        nettotal: 0,
      });
      
    },
    removeLine (lineId) {
    if (!this.blockRemoval){
        this.lines.splice(lineId, 1)
      }
    },
    calculateNet(lineId){
        let line = this.lines[lineId];
        line.nettotal = Number(line.quantity * line.unitprice).toFixed(2);
    },
    
    calculateVatTotal(){
        return this.lines.reduce((acc, val)=>{
            return acc + val.nettotal
        },0);
    }
  },
  mounted () {
    this.addLine()
  }
}
</script>