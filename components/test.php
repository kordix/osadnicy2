<script type="text/x-template" id="dupa">
    <p>{{test}} </p>
</script>


<script>
    Vue.component('test', {
        template: '#dupa',
        data() {
            return {
                test: 'siemano'
            }
        }
    })
</script>