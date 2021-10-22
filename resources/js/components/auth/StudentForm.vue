<template>
    <v-main class="main">
        <v-layout row wrap justify-center class="mt-15">
            <v-flex xs11 md4 lg6 xl4>
                <div id="form">
                    <p class="cyan--text accent-3 text-center text-md-h4 text-sm-h5 text-h5" style="font-family: 'Rubik'!important">Student Benefit Program</p>
                    <!-- <p>Kindly fill up the form below📱<br>*The verification process may take up to 24 Hours.<br>
                     The name and photo associated with your Google account will be recorded when you upload files and submit this form.</p> -->
                    <v-alert type="info" indeterminate border="left" v-if="loading">Processing ...</v-alert>

                    <v-form v-model="valid" ref="form">
                        <errors :success="success" :failure="failure" :message="message"></errors>

                      <v-text-field label="Name" v-model="name" outlined></v-text-field>
                      <v-text-field label="NRIC/Passport Number" v-model="nric" outlined></v-text-field>
                      <v-text-field label="Email Address" v-model="email" outlined></v-text-field>
                      <v-text-field label="Educational Institution (School,College,University)" v-model="inst" outlined></v-text-field>
                      <v-text-field label="Student ID No." v-model="stu_id_no" outlined></v-text-field>
                      <!-- <v-file-input label="Kindly upload your Student ID (Maximum file size 10MB)" accept="image/*" v-model="stu_id_file"></v-file-input> -->
                      <v-btn color="cyan accent-3" elevation="0" class="white--text" large @click="validate">Register</v-btn>

                    </v-form>
                </div>
            </v-flex>
        </v-layout>
    </v-main>
</template>

<script>
import axios from 'axios'
import Errors from '../partials/Errors.vue'

export default {
    props: ['domain'],
    components: { Errors },
    name: "StudentForm",
    data() {
        return {
            // rules: {
            //     required: value => !!value || 'Required',
            //     password_confirmation: value => this.password == value || 'Passwords must be matched',
            //     email: value => {
            //         const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            //         return pattern.test(value) || 'Invalid e-mail.'
            //     },
            //     username: value => {
            //         const pattern = /^[a-zA-Z0-9]+$/
            //         return pattern.test(value) || 'Invalid username, usernames should not contain chars like - , $ '
            //     },
            //     min: value => value.length >= 8 || 'The password must be at least 8 characters.'
            // },
            valid: true,
            name: '',
            nric: '',
            email: '',
            inst: '',
            stu_id_no: '',
            stu_id_file: ''
            // token: document.head.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    methods: {
        validate() {
            this.$refs.form.validate()
            // Check if the form is valid
            this.loading = true
            if (this.valid) {
                // Register the student
                let student = {
                    name: this.name,
                    nric: this.nric,
                    email: this.email,
                    inst: this.inst,
                    stu_id_no: this.stu_id_no,
                    stu_id_file: this.stu_id_file
                    // _token: this.token
                }
                axios.post('/student-register', student)
                .then(res => {
                    this.loading = true 
                    this.success = true
                    this.message = "Successfully registered."
                    this.failure = false
                    setTimeout(() => {
                        window.location.href = '/upgrade'+'?type=student'
                        // window.location.href = '/home'
                        // <a href="{{ route('upgrade', ['type' => 'student']) }}" class="btn btn-danger btn-lg">GO PRO</a>
                        // <a href="{{ route('upgrade', ['type' => 'student']) }}"></a>
                    }, 1000)
                })
                .catch(err => {
                    this.loading = false
                    this.failure = true
                    // Show the error message
                    console.log(err.response)
                    // this.message = err.response.data.errors['email'] != null ? err.response.data.errors['email'][0] : err.response.data.errors['username'][0]
                    this.success = false
                })
            }
        }
    }
}
</script>

<style scoped>
    .main {
        background-image: url(https://images.unsplash.com/photo-1485627941502-d2e6429a8af0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1350&q=80);
        background-size: cover;
    }
</style>