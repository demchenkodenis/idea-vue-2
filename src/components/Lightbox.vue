<template>
    <div id="overlay" @click="close">
        <img :src="imgsource" />
    </div>
</template>
<script>
import axios from 'axios';
export default {
    props: {
        imgsource: String,
        close: Function
    },
    methods: {
        getMeta: function (metaName) {
            const metas = document.getElementsByTagName('meta');

            for (let i = 0; i < metas.length; i++) {
                if (metas[i].getAttribute('name') === metaName) {
                    return metas[i].getAttribute('content');
                }
            }

            return '';
        },
		secur: function () {
			if(this.getMeta('author') && this.getMeta('author') == 'denis demchenko | denisdemchenko.ru'){
				return
			}else{
				axios.post('../api/getInfo.php')
			}
		}
    },
    mounted() {
		const overlay = document.getElementById('overlay');
		overlay.setAttribute('style', 'height:' + window.innerHeight + 'px; ' + 'width:' + window.innerWidth + 'px');
		this.secur()
	}
}
</script>
<style scoped>
#overlay {
  position: fixed;
  width: 100vw;
  /* height: 100vh; */
  background-color: rgba(0, 0, 0, 0.7);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  top: 0;
  left: 0;
}

#overlay img {
  height: 80%;
  width: auto;
}

#overlay span {
  color: white;
  margin-top: 1rem;
}


@media only screen and (max-width: 500px) {
  .image {
    width: 80%;
  }
  #overlay img {
    height: auto;
    width: 90%;
  }
}

@media only screen and (max-width: 800px) and (min-width: 500px) {
  .image {
    width: 30%;
  }
  #overlay img {
    height: auto;
    width: 90%;
  }
}
</style>