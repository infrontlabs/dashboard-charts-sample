<template>
  <div>
    <div class="container">
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'app',
  computed: {
    ...mapGetters({
      siteName: 'getSitename',
    })
  },
  created() {
    console.log('App loaded.')
  }
}
</script>
