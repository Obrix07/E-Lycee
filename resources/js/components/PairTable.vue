<template>
    <div>
      <table class="table-auto">
        <thead>
            <tr>
            <th>Name</th>
            <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="pair in pairs" :key="pair.id" @click="editPair(pair)">
              <td>{{ pair.name }}</td>
              <td>{{ pair.value }}</td>
              <td>
                <button @click="deletePair(pair.id)">Supprimer</button>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
  </template>

<script>
export default {
  data() {
    return {
      pairs: [],
    };
  },
  mounted() {
    this.fetchPairs();
  },
  methods: {
    fetchPairs() {
      axios
        .get('/api/pair')
        .then((response) => {
          this.pairs = response.data;
        })
        .catch((error) => {
          console.error('Une erreur s\'est produite lors de la récupération des paires de devises', error);
        });
    },
    editPair(pair) {
      window.location.href = `/pairs/${pair.id}/edit`;
    },
    deletePair(pairId) {
      axios
        .delete(`/api/pair/${pairId}`)
        .then((response) => {
          console.log('Paire de devises supprimée avec succès', response.data);
          this.fetchPairs();
        })
        .catch((error) => {
          console.error('Une erreur s\'est produite lors de la suppression de la paire de devises', error);
        });
    },
  },
};
</script>
