<template>
  <div id="a-players">
    <h1>SUPERHEROES HANGMAN</h1>
    <form name="myForm" id="randomTeams" @submit.prevent="startGame">
      <div id="input-player-list" v-for="index in playerNumber" :key="index">
        <input
          :id="'player' + index"
          type="text"
          :name="'player' + index"
          v-model="form.players[index - 1]"
        />
        <br />
      </div>
      <input
        type="button"
        id="addPlayer"
        @click="createInputField"
        value="Add Player"
      />
      <input
        type="button"
        id="removePlayer"
        @click="removeInputField"
        value="Remove Player"
      />
      <input
        type="button"
        id="startGame"
        @click="startGame"
        value="start Game"
      />
    </form>
  </div>
  <!--End of a-players-->
</template>

<script>
export default {
  data() {
    return {
      form: {
        players: [],
      },
      playerNumber: 1,
    };
  },
  methods: {
    removeInputField() {
      this.playerNumber--;
      this.form.players.splice(-1, 1);
    },
    createInputField() {
      this.playerNumber++;
    },
    startGame() {
      this.$inertia.post("/game", this.form);
    },
  },
};
</script>

<style scoped>
</style>