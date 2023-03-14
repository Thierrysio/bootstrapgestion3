<template>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <!-- Ajoutez ici les autres en-têtes de colonne -->
        </tr>
      </thead>
      <tbody>
        <tr v-for="leproprietaire in lesproprietaires" :key="leproprietaire.id" v-bind:class="{ 'bg-green': leproprietaire.id > 5, 'bg-blue': leproprietaire.id > 10 }">
            <td v-bind:class="{ 'bg-green': leproprietaire.id > 5, 'bg-blue': leproprietaire.id > 10 }" >
{{ leproprietaire.id }}</td>

<td v-bind:class="{ 'bg-green': leproprietaire.nomproprietaire}"  contenteditable @keydown.enter="handleInput($event,leproprietaire, 'nomproprietaire')">
{{ leproprietaire.nomproprietaire }}</td>
          <!-- Ajoutez ici les autre          <td>{{ leproprietaire.nomproprietaire }}</td>
s cellules de la ligne -->
        </tr>
      </tbody>
    </table>
  </template>
  
  <script>
  export default {
    el: '#table-maj',
    data() {
      return {
        lesproprietaires: [],
      };
    },
    methods: {
      miseajour() {
        fetch('/api/apivue')
          .then(response => response.json())
          .then(data => {
            this.lesproprietaires = data;
          });
      },
      handleInput(e,row, column) {
    
      e.preventDefault();
      fetch("/api/maj/"+row.id+"/" + e.target.innerText , {"method": "GET"})

          .then(response => response.json())
          .then(result => this.hello = result);
      }
    },
    
    
    created() {
      setInterval(() => {
        this.miseajour();
      }, 10000); // Exécute la méthode toutes les 10 secondes
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

.bg-green {
    background-color: green;
  }
  
  .bg-blue {
    background-color: blue;
  }
</style>
  