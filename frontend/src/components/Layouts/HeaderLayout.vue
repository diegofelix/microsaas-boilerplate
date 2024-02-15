<template>
  <nav class="bg-gray-800 p-4 text-white">
    <div class="container mx-auto flex justify-between">
      <a href="#" class="text-xl font-bold">Battleroad</a>
      <div class="flex space-x-4">
        <router-link to="/" class="hover:text-gray-300">Home</router-link>
        <router-link to="/championships" class="hover:text-gray-300">Campeonatos</router-link>
        <a href="#" >Jogadores</a>
        <a href="#" class="hover:text-gray-300">Ranking</a>
      </div>
    </div>
  </nav>
</template>
