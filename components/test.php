<script type="text/x-template" id="dupa">
    <p>{{test2}} </p>
</script>


<script>
    Vue.component('test', {
        template: '#dupa',
        data() {
            return {
                test2: 'siemano'
            }
        }
    })
</script>