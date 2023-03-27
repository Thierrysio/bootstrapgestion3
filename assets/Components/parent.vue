<template>
   <div><h1> <ChildComponents :maVariable = "variableParent"/></h1></div> 
   <div><h1>sss</h1></div>
</template>
  
  <script>
  import ChildComponents from "../Components/enfant.vue";
  export default {
    components: {
        ChildComponents
  },
    data() {
      return {
        variableParent: "valeur de la variable parent",
      };
    }
  };
  </script>