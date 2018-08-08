<template>
    <div>
        <alert
            v-for="(alert, index) in alerts"
            :key="index"
            :alert="alert"
            @closed="remove(alert)"></alert>
    </div>
</template>
<script>
    import Alert from './Alert'

    export default {
        props: ['init-alerts'],

        components: { Alert },

        data () {
            return {
                alerts: this.initAlerts
            }
        },

        mounted () {
            window.Events.$on('alert', (alert) => {
                alert.uid = '_' + Math.random().toString(36).substr(2, 9)
                this.alerts.push(alert)
            })
        },

        methods: {
            remove (alert) {
                this.alerts.splice(this.alerts.indexOf(alert), 1);
            }
        }
    }
</script>