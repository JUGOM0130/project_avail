<script setup>
import { ref,defineProps } from "vue/dist/vue.esm-bundler";

const props = defineProps({
  val_json:""
});


let temp = props.val_json;
let area = ref([]);
console.log(typeof(temp),temp);

if(temp != undefined){
  for(let i = 0; i < temp.length;i++){
    area.value.push(temp[i].exchange);
  }
}else{
  area.value.push("");
}

const plus = ()=>{
  area.value.push("");
}

const minus = ()=>{
  let now = area.value.length;
  if(now > 1){
    area.value.pop();
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
        <textarea name="ex[]" rows="5" class="form-control">{{ item }}</textarea>
      </div>
      </div>
  </div>
</template>
