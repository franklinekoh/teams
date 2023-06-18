<script>
  import { defineComponent } from 'vue'
  import ListTeams from './components/ListTeams.vue'
  import CreateTeam from './components/CreateTeam.vue'
  import ViewTeam from './components/ViewTeam.vue'

    export default defineComponent({
      name: 'App',
      components: {
        ListTeams,
        CreateTeam,
        ViewTeam
      },
      emits: ['closeTeamVisible', 'closeCreateTeamVisible'],
      data: () => ({
        currentPage: 1,
        isTeamVisible: false,
        isCreateTeamVisible: false,

      }),
      watch: {

      },
      methods: {
        showTeam() {
        this.isTeamVisible = true
        },
        closeTeam() {
          this.isTeamVisible = false
        },
        showCreateTeam() {
          this.isCreateTeamVisible = true
        },
        closeCreateTeam() {
          this.isCreateTeamVisible = false
        },
        goBack(){
          this.closeCreateTeam()
          this.closeTeam()
        }
      },
      mount () {

      }
    })
</script>

<template>
  <div id="body-wrap">
    <!-- Header -->
    <div class="main-nav">
      <div class="header">
        <a class="logostyle">Teams App</a>
      </div>
    </div>
    <!-- List teams -->
    <div class="team-lists mt-4 p-8">
        <CreateTeam v-if="isCreateTeamVisible" @goBack="goBack"/>
        <ViewTeam v-else-if="isTeamVisible" @goBack="goBack"/>
        <ListTeams @showCreateTeam="showCreateTeam" @showTeam="showTeam" v-else/>
        
    </div>
  </div>
</template>

<style>
  
</style>
