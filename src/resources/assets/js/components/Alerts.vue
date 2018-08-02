<template>
    <div>
        <alert v-for="(alert, index) in alerts" :key="index" :alert="alert"></alert>
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
            window.Events.$on('flash', (alert) => {
                this.alerts.push(alert)
            })
        }
    }
</script>