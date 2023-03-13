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
        <tr v-for="leproprietaire in lesproprietaires" :key="entity.id">
          <td>{{ leproprietaire.id }}</td>
          <td>{{ leproprietaire.nomproprietaire }}</td>
          <!-- Ajoutez ici les autres cellules de la ligne -->
        </tr>
      </tbody>
    </table>
  </template>
  
  <script>
  export default {
    el: '#tab-app',
    data() {
      return {
        lesproprietaires: [],
      };
    },
  
    mounted() {
      fetch('/api/apivue')
        .then(response => response.json())
        .then(data => {
          this.lesproprietaires = data;
        });
    },
  };
  </script>
  