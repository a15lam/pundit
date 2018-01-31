<template>
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <span style="font-size: medium">{{ fdName }}</span>
                        <span class="right"><star-rating :inline = "true" :star-size = "15" :show-rating = "false" :read-only = "true" v-model = "rating"></star-rating></span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <slot></slot>
                        </div>
                        <div style="text-align: right">
                            <i>Posted on {{ rvDate }} by <b>{{ rvName }} ( {{ rvEmail }} )</b></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import StarRating from 'vue-star-rating';
    export default {
        props: [
            'fdName',
            'rating',
            'rvName',
            'rvEmail',
            'rvDate'
        ],
        data() {
            return {}
        },
        mounted() {
            console.log('Ready!')
        },
        components: { StarRating }
    }
</script>

<style scoped>

</style>
