<script setup>
import { ref,defineProps } from "vue/dist/vue.esm-bundler";

const props = defineProps({
  item_num:1,
});
const textareaname = "exchange";

let area = ref(props.item_num);


const plus = ()=>{
  let now = area.value;
  area.value = now + 1;
}

const minus = ()=>{
  let now = area.value;
  if(now > 1){
    area.value = now - 1;
  }else{
    console.log("これ以上減らすことはできません")
  }
}

</script>
<template>

  <div class="mb-3">
    <div class="row row-cols-auto">
      <div class="col">
        <label for="exchange" class="form-label">やりとり</label>
      </div>
      <div class="col">
        <button type="button" @click="plus" class="btn btn-outline-primary">+</button><span> </span><button type="button" @click="minus" class="btn btn-outline-primary">-</button>
      </div>
    </div>
    <div class="row" v-for="item in area">
      <div class="col">
        <textarea name="ex[]" rows="5" class="form-control"></textarea>
      </div>
      </div>
  </div>
</template>
<style scoped>

.flexbox{
  display: flex;
  flex-direction: row;
}

.flexitem{
  flex-grow: 0;
}

.flexboxrow{
  display: flex;
  flex-direction: column;
}
.flexboxrowitem{
  flex-grow: 0;
}

</style>
