<template>
  <div>
    <Header />
    <transition name="slide-fade" mode="out-in">
      <router-view :key="$route.fullPath" />
    </transition>
    <Feedback />
    <Footer ref="footer" />
  </div>
</template>
<script>
import Header from '@/components/Header'
import Feedback from '@/components/Feedback'
import Footer from '@/components/Footer'

export default {
  components: {
    Header,
    Feedback,
    Footer
  }
}
</script>
<style scoped>
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .6s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-active {
  opacity: 0;
  padding-left: 10px;
}
</style>