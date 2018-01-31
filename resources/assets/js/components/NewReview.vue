<template>
    <modal>
        <span slot="title">Adding New Review</span>
        <span slot="body">
            <form @submit.prevent="save">
                <p style="color: red" v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                    <ul>
                      <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </p>
                <div class="form-group">
                    <label for="fundraiser_name">Fundraiser Name</label>
                    <input type="text" class="form-control" v-model="form.fundraiser_name" id="fundraiser_name">
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <star-rating id="rating" :inline="true" :star-size="15" :show-rating="false" v-model="form.rating"></star-rating>
                </div>
                <div class="form-group">
                    <label for="review">Review</label>
                    <textarea class="form-control" id="review" rows="5" v-model="form.review"></textarea>
                </div>
                <div class="form-group">
                    <label for="reviewer_name">Reviewer Name</label>
                    <input type="text" class="form-control" v-model="form.reviewer_name" id="reviewer_name">
                </div>
                <div class="form-group">
                    <label for="reviewer_email">Reviewer Email</label>
                    <input type="email" autocomplete="email" class="form-control" v-model="form.reviewer_email" id="reviewer_email">
                </div>
            </form>
        </span>
        <span slot="footer">
            <button class="btn btn-primary" @click="save($event)">Save</button>
        </span>
    </modal>
</template>

<script>
    import Modal from './Modal.vue';
    import StarRating from 'vue-star-rating';

    export default {
        name: "new-review",
        data() {
            return {
                form:{
                    fundraiser_name: '',
                    rating: 0,
                    review: '',
                    reviewer_name: '',
                    reviewer_email: ''
                },
                errors:[]
            }
        },
        methods:{
            save(e){
                let me = this;
                this.errors = [];
                this.validateForm();
                if(this.errors.length > 0){
                    return true;
                }

                window.axios.post('/api/review', this.form, {
                    headers:{'Content-Type': 'application/json'}
                }).then(response => {
                    window.location.href = '/';
                }).catch(error => {
                    if(error.response.data && error.response.data.errors){
                        let errors = error.response.data.errors;
                        Object.keys(errors).forEach(key => {
                            me.errors.push(errors[key][0]);
                        });
                    }
                });

                e.preventDefault();
            },
            validateForm(){
                if(!this.form.fundraiser_name){
                    this.errors.push("Fundraiser Name is required.");
                }
                if(!this.form.rating){
                    this.errors.push("Please select at least one star for rating.");
                }
                if(!this.form.review){
                    this.errors.push("Review is required.")
                }
                if(!this.form.reviewer_name){
                    this.errors.push("Reviewer Name is required.");
                }
                if(!this.form.reviewer_email){
                    this.errors.push("Reviewer Email is required.");
                } else if(!this.validateEmail(this.form.reviewer_email)){
                    this.errors.push("Invalid email address provided.")
                }
            },
            validateEmail(email){
                let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                return re.test(email);
            }
        },
        components: { Modal, StarRating }
    }
</script>

<style scoped>

</style>