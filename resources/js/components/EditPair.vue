<template>
  <div>
    <h2>Modifier la paire de devises</h2>
    <form @submit.prevent="updatePair">
      <div>
        <label for="name">Nom:</label>
        <input type="text" v-model="pair.name" id="name" />
      </div>
      <div>
        <label for="value">Valeur:</label>
        <input type="number" v-model="pair.value" id="value" />
      </div>
      <button type="submit">Mettre à jour</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      pairId: null,
      pair: {
        name: '',
        value: 0,
      },
    };
  },
  mounted() {
    this.pairId = this.extractPairIdFromUrl();
    this.fetchPairDetails();
  },
  methods: {
    extractPairIdFromUrl() {
      const parts = window.location.pathname.split('/');
      return parts[parts.length - 1];
    },
    fetchPairDetails() {
      axios
        .get(`/api/pair/2`)
        .then((response) => {
          this.pair = response.data;
        })
        .catch((error) => {
          console.error('Une erreur s\'est produite lors de la récupération des détails de la paire de devises', error);
        });
    },
    updatePair() {
      axios
        .put(`/api/pair/${this.pairId}`, this.pair)
        .then((response) => {
          console.log('Paire de devises mise à jour avec succès', response.data);
          window.location.href = '/';
        })
        .catch((error) => {
          console.error('Une erreur s\'est produite lors de la mise à jour de la paire de devises', error);
        });
    },
  },
};
</script>
