<template>
    <div><h1>{{ maVariable }}</h1></div>
    <h1>ccc</h1>
  </template>
  
  <script>
  export default {
    props: {
      maVariable: String,
      required : true
    }
  };
  </script>