<template>
    
    <h1 v-if="!erreurRequete">{{ nomCourse }} hello</h1>
    <p v-if="erreurRequete">{{ messageErreur }}</p>
</template>

<script>
export default {
  el: '#gagnant',
  data() {
    return {
      legagnant: [],
      erreurRequete: false,
      messageErreur: ''
    };
  },
  computed: {
    nomCourse() {
      return this.legagnant.length > 0 ? this.legagnant[0].nomCourse : '';
    }
  },
  methods: {
    async getgagnant() {
        try {
        const response = await fetch('/courses/getgagnant');
        const data = await response.json();
        this.legagnant = data;
        this.erreurRequete = false;
        this.messageErreur = '';
      } catch (error) {
        console.log(error);
        this.erreurRequete = true;
        this.messageErreur = 'Une erreur s\'est produite lors de la récupération des données. Veuillez réessayer plus tard.';
      }
    }
    ,
},
async mounted() {
    while (true) {
      await this.getgagnant();
      await new Promise((resolve) => setTimeout(resolve, 10000));
    }
  },
}
</script>

<style>

</style>