<template>
<table>
  <thead>
    <tr>
      <th>Column 1</th>
      <th>Column 2</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="row in rows" :key="row.id">
      <td :class="{ 'negative': row.column1 < 0 }" contenteditable @keydown.enter="handleInput($event,row, 'column1')">
        <!--<td :class="{ 'negative': row.column1 < 0 }" contenteditable @keyup.enter="handleInput($event,row, 'column1')">-->
 
        {{ row.column1 }}
      </td>
      <!--<td :class="{ 'negative': row.column2 < 0 }" contenteditable @keyup.enter="handleInput($event,row, 'column2')">-->

      <td :class="{ 'negative': row.column2 < 0 }" contenteditable @keydown.enter="handleInput($event,row, 'column2')">
        {{ row.column2 }}   
      </td>
    </tr>
  </tbody>
</table>
  </template>
  
  <script>
  export default {
    data() {
      return {
        rows: [
      { id: 1, column1: 5, column2: 10 },
      { id: 2, column1: -2, column2: 15 },
      { id: 3, column1: 8, column2: -7 }
    ],
       
      };
    },
    methods: {
    handleInput(e,row, column) {
      row[column] = parseFloat(e.target.innerText);
      e.preventDefault();
      console.log(e)
    }
  },
  };
  </script>
  
  <style>
  .red {
    background-color: red;
  }

  .negative {
  background-color: red;
  color: white;
}
  
  .green {
    background-color: green;
  }
  </style>