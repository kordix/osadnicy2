let app = new Vue({
    data:{
        dane:{},
        wylogujshow:false,
        costs: {
            woodUpgrade: [150, 100, 100],
            ironUpgrade: [150, 100, 100],
            stoneUpgrade: [100, 100, 100],
        },
    },
    el:'#app',
    methods:{

        loadData(){
            location.reload();
        },
        resHack(){
            // this.$store.commit('resHack');
            this.$root.dane.wood = 500;
            this.$root.dane.stone = 500;
            this.$root.dane.iron = 500;


        },
   
    }
})